<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\CategoryModel;
use App\Models\CommentModel;
use App\Models\TagModel;
use App\Models\PostTagModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Post extends BaseController
{
    public function index(): string
    {
        $post = new PostModel();
        $categoryModel = new CategoryModel();
        $tagModel = new TagModel();

        $keyword = $this->request->getGet('keyword');
        $category = $this->request->getGet('category');
        $tag = $this->request->getGet('tag');

        if ($keyword) {
            $post->groupStart()
                 ->like('title', $keyword)
                 ->orLike('content', $keyword)
                 ->groupEnd();
        }

        if ($category) {
            $post->where('categories.slug', $category);
        }

        if ($tag) {
            $tagData = $tagModel->where('slug', $tag)->first();
            if ($tagData) {
                $postTagModel = new PostTagModel();
                $postIds = array_column($postTagModel->where('tag_id', $tagData['id'])->findAll(), 'post_id');
                if (!empty($postIds)) {
                    $post->whereIn('posts.id', $postIds);
                } else {
                    $post->where('posts.id', 0);
                }
            }
        }

        $data['posts'] = $post->select('posts.*, categories.name as category_name, categories.slug as category_slug')
                             ->join('categories', 'categories.id = posts.category_id', 'left')
                             ->where('status', 'published')
                             ->paginate(6, 'post');
        $data['pager'] = $post->pager;
        $data['categories'] = $categoryModel->findAll();
        $data['selected_category'] = $category;
        $data['title'] = 'Daftar Blog';
        return view('post', $data);
    }

    public function viewPost($slug): string
    {
        $post = new PostModel();
        $commentModel = new CommentModel();
        $tagModel = new TagModel();
        $postTagModel = new PostTagModel();

        $data['post'] = $post->where([
            'slug' => $slug,
            'status' => 'published'
        ])->first();

        if (!$data['post']) {
            throw PageNotFoundException::forPageNotFound();
        }

        $tagIds = array_column($postTagModel->where('post_id', $data['post']['id'])->findAll(), 'tag_id');
        $data['tags'] = !empty($tagIds) ? $tagModel->whereIn('id', $tagIds)->findAll() : [];

        $data['comments'] = $commentModel->where([
            'post_id' => $data['post']['id'],
            'status' => 'approved'
        ])->orderBy('created_at', 'DESC')->findAll();

        $data['title'] = $data['post']['title'];
        return view('post_detail', $data);
    }

    public function comment($postId)
    {
        $rules = [
            'name'  => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'body'  => 'required|min_length[5]|max_length[5000]',
        ];

        if ($this->validate($rules)) {
            $commentModel = new CommentModel();
            $commentModel->insert([
                'post_id' => $postId,
                'name'    => $this->request->getPost('name'),
                'email'   => $this->request->getPost('email'),
                'body'    => $this->request->getPost('body'),
                'status'  => 'approved',
            ]);

            return redirect()->to('post/' . $this->request->getPost('post_slug'))->with('success', 'Komentar berhasil ditambahkan.');
        }

        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
}

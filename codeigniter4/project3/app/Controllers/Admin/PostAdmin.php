<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\CategoryModel;
use App\Models\TagModel;
use App\Models\PostTagModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostAdmin extends BaseController
{
    public function index()
    {
        $postModel = new PostModel();
        $data['posts'] = $postModel->select('posts.*, categories.name as category_name')
                                   ->join('categories', 'categories.id = posts.category_id', 'left')
                                   ->orderBy('posts.id', 'DESC')
                                   ->findAll();
        $data['title'] = 'Admin - List Post';
        return view('admin/admin_post_list', $data);
    }

    public function preview($id)
    {
        $postModel = new PostModel();
        $tagModel = new TagModel();
        $postTagModel = new PostTagModel();

        $data['post'] = $postModel->select('posts.*, categories.name as category_name')
                                  ->join('categories', 'categories.id = posts.category_id', 'left')
                                  ->where('posts.id', $id)
                                  ->first();

        if (!$data['post']) {
            throw PageNotFoundException::forPageNotFound();
        }

        $tagIds = array_column($postTagModel->where('post_id', $id)->findAll(), 'tag_id');
        $data['tags'] = !empty($tagIds) ? $tagModel->whereIn('id', $tagIds)->findAll() : [];

        $data['title'] = $data['post']['title'];
        return view('post_detail', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $tagModel = new TagModel();
        $data['categories'] = $categoryModel->findAll();
        $data['tags'] = $tagModel->findAll();

        $rules = [
            'title' => 'required|min_length[5]',
            'content' => 'required',
            'category_id' => 'required',
            'post_image' => 'uploaded[post_image]|max_size[post_image,2048]|is_image[post_image]|mime_in[post_image,image/jpg,image/jpeg,image/png,image/webp]'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $postModel = new PostModel();
            $postTagModel = new PostTagModel();
            
            $img = $this->request->getFile('post_image');
            $imgName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/post', $imgName);

            $postId = $postModel->insert([
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status'),
                "category_id" => $this->request->getPost('category_id'),
                "post_image" => $imgName,
                "slug" => url_title($this->request->getPost('title'), '-', TRUE),
                "author" => user()->username
            ]);

            $selectedTags = $this->request->getPost('tags');
            if (!empty($selectedTags)) {
                foreach ($selectedTags as $tagId) {
                    $postTagModel->insert([
                        'post_id' => $postId,
                        'tag_id' => $tagId,
                    ]);
                }
            }

            return redirect()->to('admin/post')->with('success', 'Data Berhasil Disimpan');
        }

        $data['validation'] = $this->validator;
        $data['title'] = 'Admin - Create Post';
        return view('admin/admin_post_create', $data);
    }

    public function edit($id)
    {
        $postModel = new PostModel();
        $categoryModel = new CategoryModel();
        $tagModel = new TagModel();
        $postTagModel = new PostTagModel();
        
        $data['post'] = $postModel->where('id', $id)->first();
        $data['categories'] = $categoryModel->findAll();
        $data['tags'] = $tagModel->findAll();
        $data['post_tags'] = array_column($postTagModel->where('post_id', $id)->findAll(), 'tag_id');
        
        if (!$data['post']) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'title' => 'required|min_length[5]',
            'content' => 'required',
            'category_id' => 'required',
            'post_image' => 'max_size[post_image,2048]|is_image[post_image]|mime_in[post_image,image/jpg,image/jpeg,image/png,image/webp]'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $updateData = [
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "category_id" => $this->request->getPost('category_id'),
                "status" => $this->request->getPost('status'),
                "slug" => url_title($this->request->getPost('title'), '-', TRUE),
            ];

            $img = $this->request->getFile('post_image');
            if ($img && $img->isValid() && !$img->hasMoved()) {
                if (!empty($data['post']['post_image']) && file_exists(ROOTPATH . 'public/uploads/post/' . $data['post']['post_image'])) {
                    unlink(ROOTPATH . 'public/uploads/post/' . $data['post']['post_image']);
                }
                
                $imgName = $img->getRandomName();
                $img->move(ROOTPATH . 'public/uploads/post', $imgName);
                $updateData['post_image'] = $imgName;
            }

            $postModel->update($id, $updateData);

            // Sync tags
            $postTagModel->where('post_id', $id)->delete();
            $selectedTags = $this->request->getPost('tags');
            if (!empty($selectedTags)) {
                foreach ($selectedTags as $tagId) {
                    $postTagModel->insert([
                        'post_id' => $id,
                        'tag_id' => $tagId,
                    ]);
                }
            }

            return redirect()->to('admin/post')->with('success', 'Data Berhasil Diperbarui');
        }

        $data['validation'] = $this->validator;
        $data['title'] = 'Admin - Edit Post';
        return view('admin/admin_post_update', $data);
    }

    public function delete($id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id);
        
        if ($post) {
            if (!empty($post['post_image']) && file_exists(ROOTPATH . 'public/uploads/post/' . $post['post_image'])) {
                unlink(ROOTPATH . 'public/uploads/post/' . $post['post_image']);
            }
            $postModel->delete($id);
        }
        
        return redirect()->to('admin/post')->with('success', 'Data Berhasil Dihapus');
    }
}

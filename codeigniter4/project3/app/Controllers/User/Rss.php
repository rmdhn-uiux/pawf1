<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PostModel;

class Rss extends BaseController
{
    public function index()
    {
        $postModel = new PostModel();
        $posts = $postModel->select('posts.*, categories.name as category_name')
                          ->join('categories', 'categories.id = posts.category_id', 'left')
                          ->where('status', 'published')
                          ->orderBy('id', 'DESC')
                          ->limit(10)
                          ->findAll();

        $data = [
            'posts' => $posts,
            'feed_title' => 'MyBlog - TechnoDaily',
            'feed_description' => 'Artikel terbaru dari MyBlog TechnoDaily',
            'feed_link' => base_url(),
            'feed_language' => 'id',
        ];

        $this->response->setContentType('application/rss+xml');
        return view('rss', $data);
    }
}

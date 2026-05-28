<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\CategoryModel;

class Sitemap extends BaseController
{
    public function index()
    {
        $postModel = new PostModel();
        $categoryModel = new CategoryModel();

        $posts = $postModel->select('slug, created_at')
                          ->where('status', 'published')
                          ->orderBy('id', 'DESC')
                          ->findAll();

        $categories = $categoryModel->findAll();

        $data = [
            'posts' => $posts,
            'categories' => $categories,
        ];

        $this->response->setContentType('application/xml');
        return view('sitemap', $data);
    }
}

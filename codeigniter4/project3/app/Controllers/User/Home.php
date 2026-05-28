<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\SubscriberModel;

class Home extends BaseController
{
    public function index()
    {
        if (logged_in()) {
            return redirect()->to('admin/post');
        }

        $postModel = new PostModel();
        
        $data['latest_posts'] = $postModel->select('posts.*, categories.name as category_name')
                                          ->join('categories', 'categories.id = posts.category_id', 'left')
                                          ->where('status', 'published')
                                          ->orderBy('id', 'DESC')
                                          ->limit(3)
                                          ->findAll();
        
        $data['title'] = 'Home';
        
        return view('home', $data);
    }

    public function subscribe()
    {
        $rules = [
            'email' => 'required|valid_email|is_unique[subscribers.email]',
        ];

        if ($this->validate($rules)) {
            $subscriberModel = new SubscriberModel();
            $subscriberModel->insert([
                'email' => $this->request->getPost('email'),
            ]);

            return redirect()->to('/')->with('success', 'Terima kasih! Anda berhasil berlangganan newsletter kami.');
        }

        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
}

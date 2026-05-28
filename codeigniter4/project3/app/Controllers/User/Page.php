<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ContactModel;

class Page extends BaseController
{
    public function about()
    {
        return view('about', ['title' => 'About Us']);
    }

    public function contact()
    {
        return view('contact', ['title' => 'Contact Us']);
    }

    public function send()
    {
        $rules = [
            'name'    => 'required|min_length[3]|max_length[100]|alpha_numeric_space',
            'email'   => 'required|valid_email',
            'subject' => 'required|min_length[3]|max_length[255]',
            'message' => 'required|min_length[10]',
        ];

        if ($this->validate($rules)) {
            $contactModel = new ContactModel();
            $contactModel->insert([
                'name'    => $this->request->getPost('name'),
                'email'   => $this->request->getPost('email'),
                'subject' => $this->request->getPost('subject'),
                'message' => $this->request->getPost('message'),
            ]);

            return redirect()->to('contact')->with('success', 'Pesan berhasil dikirim. Kami akan menghubungi Anda segera.');
        }

        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
}

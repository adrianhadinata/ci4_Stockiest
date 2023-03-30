<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login Page',
            'logo' => '/images/logo.png'
        ];
        return view('welcome_message', $data);
    }

    public function check()
    {
        return redirect()->to('/dashboard');
    }

    public function delete()
    {
        return redirect()->to('/');
    }
}

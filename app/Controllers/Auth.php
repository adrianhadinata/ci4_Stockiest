<?php

namespace App\Controllers;

use App\Models\M_userModel;

class Auth extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->M_userModel = new M_userModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'title' => 'Login Page',
            'logo' => '/images/you-logo-here.png'
        ];
        return view('welcome_message', $data);
    }

    public function check()
    {
        if (!$this->validate([ // Fungsi Validasi Inputan
            'username' => 'required',
            'password' => 'required'
        ])) {
            return redirect()->to('/')->withInput();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');


        $validUser = $this->M_userModel->getUsername($username);

        if ($validUser) {
            if (password_verify($password, $validUser[0]["password_hash"])) {
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('message', 'password error');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('message', 'Username error');
            return redirect()->to('/');
        }
    }

    public function delete()
    {
        return redirect()->to('/');
    }
}

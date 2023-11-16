<?php

namespace App\Controllers;

use Myth\Auth\Models\GroupModel;
use Myth\Auth\Password;

class Users extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->groupModel = New GroupModel();
        $this->builder = $this->db->table('users');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        // $users = new \Myth\Auth\Models\UserModel();

        $this->builder->select('users.id as userid, username, email, fullname, name,');
        $this->builder->join('auth_groups_users', 'users.id = auth_groups_users.user_id');
        $this->builder->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id');

        $query = $this->builder->get();

        $data = [
            'title' => 'User List',
            'users' => $query->getResult(),
        ];
    
        return view('users/userList', $data);
    }

    public function detail($id = 0)
    {
        $this->builder->select('users.id as userid, username, email, fullname, userimage, name,');
        $this->builder->join('auth_groups_users', 'users.id = auth_groups_users.user_id');
        $this->builder->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id');
        $this->builder->where('users.id', $id);

        $query = $this->builder->get();
        $groups = $this->groupModel->findAll();

        $data = [
            'title' => 'User Detail',
            'user' => $query->getRow(),
            'groups' =>  $groups,
        ];

        if(empty($data['user'])) {
            return redirect()->to('/user');
        }
    
        return view('users/userDetail', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profil Saya',
        ];

        return view('users/userProfile', $data);
    }

    public function createUser()
    {
        $data = [
            'title' => 'Add new user'
        ];

        return view('users/userCreate', $data);
    }

    public function update($id)
    {
        $this->builder->select('users.id as userid, auth_groups.id as roleid, username, email, userimage');
        $this->builder->join('auth_groups_users', 'users.id = auth_groups_users.user_id');
        $this->builder->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id');
        $this->builder->where('users.id', $id);

        $user = $this->builder->get()->getRow();
        $rules = config('Validation')->registrationRules ?? [];

        if ($user->username !== $_POST['username']) {
            $rules['username'] = 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]';
        }

        if ($user->email !== $_POST['email']) {
            $rules['email'] = 'required|valid_email|is_unique[users.email]';
        }

        if (! $this->validate($rules) && count($rules) !== 0) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validate passwords since they can only be validated properly here
        if($this->request->getPost('password')) {
            $rules['password'] = 'required|strong_password';
            $rules['pass_confirm'] = 'required|matches[password]';
        }

        if($this->request->getPost('fullname')) {
            $rules['fullname'] = 'min_length[3]|max_length[30]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($_FILES['userimage']['size'] !== 0) {
            $rules['userimage'] = [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userimage]',
                    'is_image[userimage]',
                    'mime_in[userimage,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userimage,5000]',
                ],
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $img = $this->request->getFile('userimage');

            if (! $img->hasMoved()) {          
                $filepath = ROOTPATH .'public/images/uploads/userimage';
                $newName = $img->getRandomName();
                $img->move($filepath, $newName);
                $_POST['userimage'] = $newName;
            }

            if ($user->userimage !== 'no-image.png') {
                unlink(ROOTPATH .'public/images/uploads/userimage/' . $user->userimage);
            }
        } else {
            $_POST['userimage'] = $user->userimage;
        }

        $updatedData = [
            'fullname'   => $_POST['fullname'],
            'email'  => $_POST['email'],
            'username' => $_POST['username'],
            'userimage' => $_POST['userimage'],
            'password_hash' => Password::hash($_POST['password'])
        ];
        
        $this->builder->set($updatedData);
        $this->builder->where('id', $id);
        $this->builder->update();

        if ($user->roleid !== $_POST['role']) {
            $this->groupModel->removeUserFromGroup($user->userid, $user->roleid);
            $this->groupModel->addUserToGroup($user->userid, $_POST['role']);
        }

        session()->setFlashdata('message', 'Data Successfully Updated');
        return redirect()->to('/admin' . '/' . $id);
    }

    public function changePasswordUser()
    {
        $auth = service('authentication');
        $userId = $auth->id();

        $this->builder->select('users.id, users.username, password_hash');
        $this->builder->where('users.id', $userId);

        $user = $this->builder->get()->getRow();

        $isValid = Password::verify($_POST['oldPw'], $user->password_hash);
        
        if(! $isValid) {
            return redirect()->route('profile')->with('error', 'Password Invalid!');
        }

        $rules = [
            'newPw'     => 'required|strong_password',
            'rnewPw' => 'required|matches[newPw]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $newPw = Password::hash($_POST['newPw']);

        $this->builder->set('password_hash', $newPw);
        $this->builder->where('id', $userId);
        $this->builder->update();

        // Success!
        return redirect()->route('profile')->with('message', 'Password changed!');
    }
}
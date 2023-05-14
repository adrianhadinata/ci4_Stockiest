<?php

namespace App\Models;

use CodeIgniter\Model;

class M_userModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['email', 'username', 'password_hash'];

    public function getUsername($username)
    {
        $data = "SELECT * FROM users WHERE users.username = '$username'";
        $query = $this->db->query($data);
        return $query->getResultArray();
    }
}

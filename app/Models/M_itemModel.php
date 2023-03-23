<?php

namespace App\Models;

use CodeIgniter\Model;

class M_itemModel extends Model
{
    protected $table = 'm_item';

    public function getItem($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }
}

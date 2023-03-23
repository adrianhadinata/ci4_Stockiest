<?php

namespace App\Controllers;

use App\Models\M_itemModel;

class Pages extends BaseController
{
    protected $M_itemModel;

    public function __construct()
    {
        $this->M_itemModel = new M_itemModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('pages/kontak', $data);
    }

    public function about()
    {

        $data = [
            'title' => 'Item List',
            'items' => $this->M_itemModel->getItem()
        ];;
        return view('pages/about', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Item',
            'items' => $this->M_itemModel->getItem($id)
        ];

        return view('pages/item', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add new item'
        ];

        return view('pages/create', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\M_itemModel;

class Pages extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->M_itemModel = new M_itemModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'warehouse' => '/images/4664-logistic-warehouse-json-animation.gif'
        ];

        if (in_groups("staff")) {
            return view('pages/dashboard/staff', $data);
        } else {
            return view('pages/dashboard/admin', $data);
        }    
    }

    public function about()
    {
        $data = [
            'title' => 'Item',
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

        if (empty($data['items'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Not Found');
        }

        return view('pages/item', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add new item'
        ];

        return view('pages/create', $data);
    }

    public function save()
    {
        dd($_POST);
        if (!$this->validate([ // Fungsi Validasi Inputan
            'item' => 'required|is_unique[m_item.item]'
        ])) {
            return redirect()->to('/item/create')->withInput();
        }

        $this->M_itemModel->save([
            'item' => $this->request->getVar('item'),
            'date_created' => date('Y-m-d H:i:s'),
            'date_modified' => date('Y-m-d H:i:s')
        ]);

        session()->setFlashdata('message', 'Data Successfully Saved');
        return redirect()->to('/about');
    }

    public function delete($id)
    {
        $this->M_itemModel->delete($id);
        session()->setFlashdata('message', 'Data Successfully Deleted');
        return redirect()->to('/about');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit item',
            'item' => $this->M_itemModel->getItem($id)
        ];

        return view('pages/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'item' => [
                'rules' => 'required|is_unique[m_item.item]',
                'errors' => [
                    'required' => "{field} name can't be empty",
                    'is_unique' => "{field} new name can't same as old name"
                ]
            ]
        ])) {
            return redirect()->to('/item/edit/' . $id)->withInput();
        }

        $this->M_itemModel->save([
            'id' => $id,
            'item' => $this->request->getVar('item'),
            'date_modified' => date('Y-m-d H:i:s')
        ]);

        session()->setFlashdata('message', 'Data Successfully Updated');
        return redirect()->to('/about');
    }
}

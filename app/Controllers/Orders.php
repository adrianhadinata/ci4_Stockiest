<?php

namespace App\Controllers;

use App\Models\M_transactionModel;
use App\Models\M_itemModel;

class Orders extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->M_transactionModel = new M_transactionModel();
        $this->M_itemModel = new M_itemModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index() // a.k.a PO
    {
        $flag = '1';
        $data = [
            'title' => 'Purchase Order',
            'transactions' => $this->M_transactionModel->getTransactions($flag)
        ];
        return view('orders/purchase_orders', $data);;
    }

    public function createPo()
    {
        $data = [
            'title' => 'Add New Purchase Order',
            'items' => $this->M_itemModel->getItem()
        ];

        return view('orders/create_po', $data);
    }

    public function savePo()
    {
        if (!$this->validate([ // Fungsi Validasi Inputan
            'item' => 'required',
            'remarks' => 'required',
            'amount' => 'required|integer'
        ])) {
            return redirect()->to('/po/create')->withInput();
        }

        $this->M_transactionModel->save([
            'id_item' => $this->request->getVar('item'),
            'remarks' => $this->request->getVar('remarks'),
            'flag' => '1',
            'amount' => $this->request->getVar('amount'),
            'date_created' => date('Y-m-d H:i:s'),
            'date_modified' => date('Y-m-d H:i:s')
        ]);

        session()->setFlashdata('message', 'Data Successfully Saved');
        return redirect()->to('/po');
    }

    public function detailPo($id)
    {
        $flag = '1';
        $data = [
            'title' => 'Detail Purchase Order',
            'items' => $this->M_transactionModel->getTransactions($flag, $id)
        ];

        if (empty($data['items'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Not Found');
        }

        return view('orders/detail_po', $data);
    }

    public function deletePo($id)
    {
        $this->M_transactionModel->delete($id);
        session()->setFlashdata('message', 'Data Successfully Deleted');
        return redirect()->to('/po');
    }

    public function editPo($id)
    {
        $flag = '1';
        $data = [
            'title' => 'Edit Purchase Order',
            'item' => $this->M_transactionModel->getTransactions($flag, $id)
        ];

        return view('orders/edit_po', $data);
    }

    public function updatePo($id)
    {
        if (!$this->validate([
            'amount' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => "{field} amount can't be empty"
                ]
            ],
            'remarks' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} name can't be empty"
                ]
            ],
        ])) {
            return redirect()->to('/po/edit/' . $id)->withInput();
        }

        $this->M_transactionModel->save([
            'id' => $id,
            'date_modified' => date('Y-m-d H:i:s'),
            'remarks' => $this->request->getVar('remarks'),
            'flag' => '1',
            'amount' => $this->request->getVar('amount'),
        ]);

        session()->setFlashdata('message', 'Data Successfully Updated');
        return redirect()->to('/po');
    }

    public function deliv_order()
    {
        $flag = '2';
        $data = [
            'title' => 'Mutation Stock',
            'transactions' => $this->M_transactionModel->getTransactions($flag)
        ];
        return view('orders/delivery_orders', $data);;
    }

    public function createDo()
    {
        $data = [
            'title' => 'Add New Mutation Stock',
            'items' => $this->M_itemModel->getItem()
        ];

        return view('orders/create_do', $data);
    }

    public function saveDo()
    {
        if (!$this->validate([ // Fungsi Validasi Inputan
            'item' => 'required',
            'remarks' => 'required',
            'amount' => 'required|integer'
        ])) {
            return redirect()->to('/do/create')->withInput();
        }

        $this->M_transactionModel->save([
            'id_item' => $this->request->getVar('item'),
            'remarks' => $this->request->getVar('remarks'),
            'flag' => '2',
            'amount' => $this->request->getVar('amount'),
            'date_created' => date('Y-m-d H:i:s'),
            'date_modified' => date('Y-m-d H:i:s')
        ]);

        session()->setFlashdata('message', 'Data Successfully Saved');
        return redirect()->to('/do');
    }

    public function detailDo($id)
    {
        $flag = '2';
        $data = [
            'title' => 'Detail Purchase Order',
            'items' => $this->M_transactionModel->getTransactions($flag, $id)
        ];

        if (empty($data['items'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Not Found');
        }

        return view('orders/detail_do', $data);
    }

    public function deleteDo($id)
    {
        $this->M_transactionModel->delete($id);
        session()->setFlashdata('message', 'Data Successfully Deleted');
        return redirect()->to('/do');
    }

    public function editDo($id)
    {
        $flag = '2';
        $data = [
            'title' => 'Edit Mutation Stock',
            'item' => $this->M_transactionModel->getTransactions($flag, $id)
        ];

        return view('orders/edit_do', $data);
    }

    public function updateDo($id)
    {
        if (!$this->validate([
            'amount' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => "{field} amount can't be empty"
                ]
            ],
            'remarks' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} remarks can't be empty"
                ]
            ],
        ])) {
            return redirect()->to('/do/edit/' . $id)->withInput();
        }

        $this->M_transactionModel->save([
            'id' => $id,
            'date_modified' => date('Y-m-d H:i:s'),
            'remarks' => $this->request->getVar('remarks'),
            'flag' => '2',
            'amount' => $this->request->getVar('amount'),
        ]);

        session()->setFlashdata('message', 'Data Successfully Updated');
        return redirect()->to('/do');
    }
}

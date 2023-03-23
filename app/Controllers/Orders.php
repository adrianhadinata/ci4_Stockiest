<?php

namespace App\Controllers;


class Orders extends BaseController
{
    public function index() // a.k.a PO
    {
        $data['title'] = 'Purchase Order';
        return view('orders/purchase_orders', $data);;
    }

    public function deliv_order()
    {
        $data['title'] = 'Delivery Order';
        return view('orders/delivery_orders', $data);;
    }
}

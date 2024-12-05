<?php

class DetailOrder extends Controller
{
    public function index($id)
    {
        $db = Database::getInstance();

        $userid = $db->read("SELECT user_id FROM orders WHERE order_id = :id", ['id' => $id])[0]->user_id;

        $user = $db->read("SELECT * FROM users WHERE id = :id", ['id' => $userid]);

        $orders = $db->read("SELECT * FROM orders JOIN products on products.id = orders.product_id WHERE order_id = :id", ['id' => $id]);

        $data = array();

        $data['user'] = $user[0];

        $data['orders'] = $orders;

        $this->view("admin/detailOrder",$data);
    }
}

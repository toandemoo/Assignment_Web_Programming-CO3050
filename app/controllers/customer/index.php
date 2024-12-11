<?php

class Index extends Controller
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $db = Database::getInstance();

        $rows = $db->read("SELECT * FROM products");
        $categories = $db->read("SELECT * FROM categories");

        $data['rows'] = $rows;
        $data['categories'] = $categories;
        
        $this->view("customer/index", $data);
    }
}

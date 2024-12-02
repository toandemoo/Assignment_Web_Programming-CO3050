<?php

class Index extends Controller
{
    public function index()
    {
        $db = Database::getInstance();

        $rows = $db->read("SELECT * FROM products");
        $categories = $db->read("SELECT * FROM categories");

        $data['rows'] = $rows;
        $data['categories'] = $categories;
        
        $this->view("customer/index", $data);
    }
}

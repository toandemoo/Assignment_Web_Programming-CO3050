<?php

class Allproduct extends Controller
{
    public function index()
    {
        $db = Database::getInstance();

        $rows = $db->read("SELECT * FROM products");

        $data['rows'] = $rows;

        $this->view("all_product",$data);
    }

    
}
<?php

class Detail_product extends Controller
{
    public function index($id)
    {
        $id = (int)$id;

        $db = Database::getInstance();

        $row = $db->read("SELECT * FROM products WHERE id = :id",['id'=>$id]);

        $data['row'] = $row[0];
        $this->view("detail_product", $data);

    }

   
}
<?php

class Index extends Controller
{
    public function index()
    {
        $db = Database::getInstance();

        $rows = $db->read("SELECT * FROM product");

        $data['rows'] = $rows;
        $this->view("index", $data);
    }
}


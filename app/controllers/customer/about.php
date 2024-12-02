<?php

class About extends Controller
{
    public function index()
    {
        // $this->view("about");
        $db = Database::getInstance();

        $categories = $db->read("SELECT * FROM categories");
        $data['categories'] = $categories;
        $this->view("/customer/about", $data);

    }
}
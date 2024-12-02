<?php

class Contact extends Controller
{
    public function index()
    {
        // $this->view("contact");
        $db = Database::getInstance();
        $categories = $db->read("SELECT * FROM categories");
        $data['categories'] = $categories;
        $this->view("/customer/contact", $data);
    }
}
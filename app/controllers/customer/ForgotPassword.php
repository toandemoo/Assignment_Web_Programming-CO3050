<?php

class ForgotPassword extends Controller
{
    public function index()
    {
        $db = Database::getInstance();
        $categories = $db->read("SELECT * FROM categories");
        $data['categories'] = $categories;
        $this->view("/customer/ForgotPassword", $data);
    }
}
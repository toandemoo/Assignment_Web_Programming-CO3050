<?php

class Signup extends Controller
{
    public function index()
    {
        $db = Database::getInstance();
        $categories = $db->read("SELECT * FROM categories");
        $data['categories'] = $categories;
        if ($_SERVER['REQUEST_METHOD']=="POST")
        {
            $account = $this->load_model(model: "account");
            $account->signup($_POST);
        }
        $this->view("/customer/sign_up", $data);
    }

   
}

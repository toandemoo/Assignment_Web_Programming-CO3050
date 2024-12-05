<?php

class Login extends Controller
{
    public function index()
    {
        $db = Database::getInstance();
        $categories = $db->read("SELECT * FROM categories");
        $data['categories'] = $categories;
        $this->view("/customer/sign_in", $data);
    }

    public function signin(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $account = $this->load_model("account");
            $account->login($_POST);
        }else{
            // Hiển thị view login nếu không phải POST
            $db = Database::getInstance();
            $categories = $db->read("SELECT * FROM categories");
            $data['categories'] = $categories;
            $this->view("/customer/sign_in", $data);
        }
    }
}

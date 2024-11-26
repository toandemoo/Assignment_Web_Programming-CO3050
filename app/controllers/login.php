<?php

class Login extends Controller
{
    public function index()
    {
        $this->view("sign_in");
    }

    public function signin(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $account = $this->load_model("account");
            $account->login($_POST);
        }else{
            // Hiển thị view login nếu không phải POST
            $this->view("sign_in");
        }

        
    }
}

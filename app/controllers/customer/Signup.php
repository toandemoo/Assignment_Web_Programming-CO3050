<?php

class Signup extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD']=="POST")
        {
            $account = $this->load_model(model: "account");
            $account->signup($_POST);
        }
        $this->view("/customer/sign_up");
    }

   
}

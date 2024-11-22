<?php

class Signup extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD']=="POST")
        {
            $account = $this->load_model("account");
            $account->signup($_POST);
        }
        $this->view("sign_up");
    }

   
}

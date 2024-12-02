<?php

class Logout extends Controller
{
    public function index()
    {
         $account = $this->load_model("account");
         $account->logout();
    }
}

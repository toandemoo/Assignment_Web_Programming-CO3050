<?php

class ForgotPassword extends Controller
{
    public function index()
    {
        $this->view("/customer/ForgotPassword");
    }
}
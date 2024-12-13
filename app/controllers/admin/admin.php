<?php

class Admin extends Controller
{
    public function index()
    {
        // Kiểm tra session đã được khởi tạo chưa, nếu chưa thì khởi tạo session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!$_SESSION['email']) {
            header("Location: ". ROOT. "Login");
            die;
        }
        $this->view("admin/index");
    }
}

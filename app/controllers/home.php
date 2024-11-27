<?php

class Home extends Controller
{
    public function index()
    {
        // Kiểm tra session đã được khởi tạo chưa, nếu chưa thì khởi tạo session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Kết nối đến database
        $db = Database::getInstance();

        // Thực hiện truy vấn lấy tất cả sản phẩm
        $rows = $db->read("SELECT * FROM products");

        // Chuẩn bị dữ liệu để truyền vào view
        $data['rows'] = $rows;
        $data['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : null;

        // Gọi view và truyền dữ liệu vào
        $this->view("home", $data);
    }
}

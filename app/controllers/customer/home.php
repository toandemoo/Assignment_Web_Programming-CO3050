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

        $userid = $db->read("SELECT id FROM users WHERE email = :email", ['email' => $_SESSION['email']])[0]->id;
        $product = $db->read("SELECT COUNT(id) AS total FROM cart WHERE user_id = :id", ['id' => $userid])[0]->total;
        $data['product'] = $product;
        $_SESSION['product'] = $product;


        $userid = $db->read("SELECT id FROM users WHERE email = :email", ['email' => $_SESSION['email']])[0]->id;
        $product = $db->read("SELECT COUNT(DISTINCT order_id) AS total FROM orders WHERE user_id = :id", ['id' => $userid])[0]->total;
        $data['order'] = $product;
        $_SESSION['order'] = $product;



        // Thực hiện truy vấn lấy tất cả sản phẩm
        $rows = $db->read("SELECT * FROM products");
        $categories = $db->read("SELECT * FROM categories");
        

        // Chuẩn bị dữ liệu để truyền vào view
        $data['rows'] = $rows;
        $data['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : null;
        $data['categories'] = $categories;
        
        // Gọi view và truyền dữ liệu vào
        $this->view("/customer/home", $data);
    }
}

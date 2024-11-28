<?php

class Cart extends Controller
{
    public function index()
    {
        // Kiểm tra session đã được khởi tạo chưa, nếu chưa thì khởi tạo session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $data = array();
        $data['email'] = $_SESSION['email'];        

        $db = Database::getInstance();

        // SQL query để kiểm tra tài khoản
        $sql = "SELECT id FROM users WHERE email = :email";

        // Chuẩn bị dữ liệu truyền vào
        $params = [
            'email' => $data['email'],
        ];

        // Gọi hàm `read` để thực thi câu lệnh
        $result = $db->read($sql, $params);

        // Kiểm tra xem kết quả truy vấn có dữ liệu hay không
        if ($result && is_array($result) && count($result) > 0) {
            // Lấy dòng đầu tiên của kết quả
            $user = is_array($result) ? $result[0] : $result;

            // Truy vấn lấy sản phẩm trong giỏ hàng
            $cartItems = $db->read("SELECT * FROM cart WHERE user_id = :user_id", ['user_id' => $user->id]);

            // Lấy danh sách product ids từ giỏ hàng
            $productIds = array_column($cartItems, 'product_id');

            // Truy vấn để lấy thông tin sản phẩm dựa trên product ids
            $product = [];
            if (!empty($productIds)) {
                $placeholders = implode(',', array_fill(0, count($productIds), '?'));
                $sqlProduct = "SELECT * FROM product WHERE id IN ($placeholders)";
                $product = $db->read($sqlProduct, $productIds);
            }
        } else {
            $cartItems = [];
            $product = [];
        }
        
        // Chuẩn bị dữ liệu để truyền vào view
        $data = [
            'cartItems' => $cartItems,
            'product' => $product
        ];

        // Gọi view và truyền dữ liệu vào
        $this->view("cart", $data);
    }
}
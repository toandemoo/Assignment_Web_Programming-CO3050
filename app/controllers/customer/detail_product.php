<?php

class Detail_product extends Controller
{
    public function index($id)
    {
        $id = (int)$id;

        $db = Database::getInstance();

        $row = $db->read("SELECT * FROM products WHERE id = :id",['id'=>$id]);
        $categories = $db->read("SELECT * FROM categories");

        $data['row'] = $row[0];
        $data['categories'] = $categories;

        $this->view("/customer/detail_product", $data);

    }


    public function AddToCart($id)
    {
        // // Kiểm tra phương thức HTTP
        // if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        //     die("Invalid request method");
        // }
        $db = Database::getInstance();
        
        // Lấy thông tin sản phẩm và người dùng
        $idproduct = (int)$id;    

        // Lấy thông tin người dùng từ session email
        $user = $db->read("SELECT id FROM users WHERE email = :email", ['email' => $_SESSION['email']]);
        // if (!$user || empty($user)) {
        //     die("User not found");
        // }

        // Lấy id người dùng
        $userId = $user[0]->id;

        // $avaibleProduct = $db->read("SELECT * FROM cart WHERE user_id = :userid and product_id = :productid", ['userid' => $userId,'productid' =>$idproduct]);

        // if (is_array($avaibleProduct)&&count($avaibleProduct) > 0){
        //     header("Location: " . ROOT . "detail_product/$idproduct");
        //     exit; // Ngừng thực thi sau khi chuyển hướng
        // }

        $data = array();
        $data['size'] = trim($_POST['size']);
        $data['color'] = trim($_POST['color']);
        $data['quantity'] = trim($_POST['quantity']);

        // Thêm sản phẩm vào giỏ hàng
        $cartData = [
            // 'id' => '102',
            'soluong' => $data['quantity'],
            'user_id' => $userId,
            'product_id' => $idproduct,
            'size' => $data['size'], // Kích thước mặc định
            'status' => 'active'
        ];  

        $db->write(
            "INSERT INTO cart (soluong, user_id, product_id, size, status) 
            VALUES (:soluong, :user_id, :product_id, :size, :status)",
            $cartData
        );

        $userid = $db->read("SELECT id FROM users WHERE email = :email", ['email' => $_SESSION['email']])[0]->id;
        $product = $db->read("SELECT COUNT(DISTINCT id) AS total FROM cart WHERE user_id = :id", ['id' => $userid])[0]->total;
        $data['product'] = $product;
        $_SESSION['product'] = $product;

       // Chuyển hướng lại trang chi tiết sản phẩm
        header("Location: " . ROOT . "detail_product/$idproduct");
        exit; // Ngừng thực thi sau khi chuyển hướng
    }


   
}
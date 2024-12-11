<?php

class Detail_product extends Controller
{
    public function index($id)
    {
        $id = (int)$id;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Lấy trang hiện tại, mặc định là trang 1
        $comments_per_page = 5; // Số bình luận mỗi trang
        $offset = ($page - 1) * $comments_per_page; // Tính offset cho SQL

        $db = Database::getInstance();

        // Lấy sản phẩm
        $row = $db->read("SELECT * FROM products WHERE id = :id", ['id' => $id]);

        // Lấy danh sách danh mục
        $categories = $db->read("SELECT * FROM categories");

        // Lấy sản phẩm liên quan
        $relateProduct = $db->read(
            "SELECT * FROM products WHERE pkind = :kind AND id <> :id",
            ['kind' => $row[0]->pkind, 'id' => $id]
        );

        // Đếm tổng số bình luận
        $total_comments = $db->read(
            "SELECT COUNT(*) as total FROM comment WHERE product_id = :id",
            ['id' => $id]
        )[0]->total;

        // Lấy bình luận cho trang hiện tại
        $comment = $db->read(
            "SELECT comment.*, users.name 
            FROM comment 
            JOIN users ON users.id = comment.user_id 
            WHERE product_id = :id 
            LIMIT $comments_per_page OFFSET $offset",
            ['id' => $id]
        );

        // Tính tổng số trang
        $total_pages = ceil($total_comments / $comments_per_page);


        $countRatingFivestar = $db->read("SELECT COUNT(id) AS totalRating FROM comment WHERE product_id = :id and rating = '5' GROUP BY product_id", ['id' => $id]);
        $countRatingFourstar = $db->read("SELECT COUNT(id) AS totalRating FROM comment WHERE product_id = :id and rating = '4' GROUP BY product_id", ['id' => $id]);
        $countRatingThreestar = $db->read("SELECT COUNT(id) AS totalRating FROM comment WHERE product_id = :id and rating = '3' GROUP BY product_id", ['id' => $id]);
        $countRatingTwostar = $db->read("SELECT COUNT(id) AS totalRating FROM comment WHERE product_id = :id and rating = '2' GROUP BY product_id", ['id' => $id]);
        $countRatingOnestar = $db->read("SELECT COUNT(id) AS totalRating FROM comment WHERE product_id = :id and rating = '1' GROUP BY product_id", ['id' => $id]);
        $totalRating = $db->read("SELECT COUNT(id) AS totalRating FROM comment WHERE product_id = :id", ['id' => $id]);

        $countRatingFivestar = $countRatingFivestar ? $countRatingFivestar[0]->totalRating : 0;
        $countRatingFourstar = $countRatingFourstar ? $countRatingFourstar[0]->totalRating : 0;
        $countRatingThreestar = $countRatingThreestar ? $countRatingThreestar[0]->totalRating : 0;
        $countRatingTwostar = $countRatingTwostar ? $countRatingTwostar[0]->totalRating : 0;
        $countRatingOnestar = $countRatingOnestar ? $countRatingOnestar[0]->totalRating : 0;
        $totalRating = $totalRating ? $totalRating[0]->totalRating : 0;
        $averageRating = ($countRatingFivestar*5 + $countRatingFourstar*4 + $countRatingThreestar*3 + $countRatingTwostar*2 + $countRatingOnestar*1) / 5.0;

        if($totalRating != 0){
            $percent5star = $countRatingFivestar / $totalRating * 100;
            $percent4star = $countRatingFourstar / $totalRating * 100;
            $percent3star = $countRatingThreestar / $totalRating * 100;
            $percent2star = $countRatingTwostar / $totalRating * 100;
            $percent1star = $countRatingOnestar / $totalRating * 100;
        }else{
            $percent5star = 0;
            $percent4star = 0;
            $percent3star = 0;
            $percent2star = 0;
            $percent1star = 0;
        }
        

        // Chuẩn bị dữ liệu cho view
        $data['row'] = $row[0];
        $data['categories'] = $categories;
        $data['relateProduct'] = $relateProduct;
        $data['comment'] = $comment;
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $page;


        $data['countRatingFivestar'] = $countRatingFivestar;
        $data['countRatingFourstar'] = $countRatingFourstar;
        $data['countRatingThreestar'] = $countRatingThreestar;
        $data['countRatingTwostar'] = $countRatingTwostar;
        $data['countRatingOnestar'] = $countRatingOnestar;
        $data['averageRating'] = $averageRating;
        $data['totalRating'] = $totalRating;
        $data['percent5star'] = $percent5star;
        $data['percent4star'] = $percent4star;
        $data['percent3star'] = $percent3star;
        $data['percent2star'] = $percent2star;
        $data['percent1star'] = $percent1star;

        // Hiển thị view
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

    public function review($id){
        $data = array();
        $db = Database::getInstance();

        // Lấy thông tin sản phẩm và người dùng
        $idproduct = (int)$id; 

         // Lấy và xử lý dữ liệu từ form
        $data['name'] = trim($_POST['username']);
        $data['email'] = trim($_POST['email']);
        $data['comment'] = trim($_POST['comment']);
        $data['rating'] = trim($_POST['rating']);

        $userid = $db->read("SELECT id FROM users WHERE email = :email",['email'=>$data['email']])[0]->id;

        $sql = "INSERT INTO comment(user_id,comment,product_id,rating) VALUES (:user_id, :comment, :product_id, :rating);";

        $param= [
            'user_id' => $userid,
            'comment' => $data['comment'],
            'product_id' => $id,
            'rating' => $data['rating']
        ];

        $db->write($sql, $param);

        
        header("Location: " . ROOT . "detail_product/$idproduct");
        exit; // Ngừng thực thi sau khi chuyển hướng
    }
}
<?php

class Products extends Controller
{
    public function index()
    {
        $db = Database::getInstance();

        // Thiết lập số sản phẩm mỗi trang
        $items_per_page = 10;

        // Lấy trang hiện tại từ URL, mặc định là trang 1
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Tính toán OFFSET
        $offset = ($page - 1) * $items_per_page;

        // Lấy các sản phẩm từ cơ sở dữ liệu, chỉ lấy $items_per_page sản phẩm
        $rows = $db->read("SELECT * FROM products LIMIT $items_per_page OFFSET $offset");

        // Lấy tổng số sản phẩm để tính tổng số trang
        $total_items = $db->read("SELECT COUNT(*) AS total FROM products")[0]->total;

        // Tính tổng số trang
        $total_pages = ceil($total_items / $items_per_page);

        // Truyền dữ liệu vào view
        $data['rows'] = $rows;
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $page;

        $this->view("admin/products", $data);
    }

    public function AddProduct()
    {   
        $db = Database::getInstance();

        $data_tmp = array();

        $data_tmp['productName'] = trim($_POST['productName']);
        $data_tmp['productCategory'] = trim($_POST['productCategory']);
        $data_tmp['productSex'] = trim($_POST['productSex']);
        $data_tmp['productPrice'] = trim($_POST['productPrice']);
        $data_tmp['productImg'] = trim($_POST['productImg']);
        $data_tmp['productDescription'] = trim($_POST['productDescription']);

        $query = "INSERT INTO products(ptitle,pprice,pkind,pimg, pgender,pdescription) VALUES (:productName,:productPrice,:productCategory,:productImg,:productSex,:productDescription)";

        $db->write($query, $data_tmp);

        // Chuyển hướng lại trang sản phẩm
        header("Location: " . ROOT . "Products");
        exit;
    }

    public function DeleteProduct($id){
        $db = Database::getInstance();

        $db->write("DELETE FROM products WHERE id = :id", ['id' => $id]);

        // Chuyển hướng lại trang sản phẩm
        header("Location:" . ROOT . "Products");
        exit;
    }
}


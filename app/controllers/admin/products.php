<?php

class Products extends Controller
{
    public function index()
    {
        $db = Database::getInstance();


        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';  // Mặc định sắp xếp theo ID
        $order = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'DESC' : 'ASC';  // Mặc định sắp xếp tăng dần

        // Thiết lập số sản phẩm mỗi trang
        $items_per_page = 10;

        // Lấy trang hiện tại từ URL, mặc định là trang 1
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Tính toán OFFSET
        $offset = ($page - 1) * $items_per_page;


        // Lấy các sản phẩm từ cơ sở dữ liệu, chỉ lấy $items_per_page sản phẩm
        $rows = $db->read("SELECT * FROM products ORDER BY $sort $order LIMIT $items_per_page OFFSET $offset");

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



    public function Search()
    {
        $query = $_GET['search'] ?? '';

        $db = Database::getInstance();


        // Thiết lập số sản phẩm mỗi trang
        $items_per_page = 10;

        // Lấy trang hiện tại từ URL, mặc định là trang 1
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Tính toán OFFSET
        $offset = ($page - 1) * $items_per_page;

        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';  // Mặc định sắp xếp theo ID
        $order = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'DESC' : 'ASC';  // Mặc định sắp xếp tăng dần


        $rows = $db->read("SELECT * FROM products WHERE ptitle LIKE :query OR pkind LIKE :query ORDER BY $sort $order LIMIT $items_per_page OFFSET $offset", ['query'=>$query]);


        // Lấy tổng số sản phẩm để tính tổng số trang
        $total_items = $db->read("SELECT COUNT(*) AS total FROM products WHERE ptitle LIKE :query OR pkind LIKE :query", ['query'=>$query])[0]->total;

        // Tính tổng số trang
        $total_pages = ceil($total_items / $items_per_page);

        // Truyền dữ liệu vào view
        $data['rows'] = $rows;
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $page;

        $this->view("admin/products", $data);
    }

    public function UpdateProduct($id)
    {   
        $db = Database::getInstance();

        $data_tmp = array();

        $data_tmp['productName'] = trim($_POST['productName']);
        $data_tmp['productCategory'] = trim($_POST['productCategory']);
        $data_tmp['productSex'] = trim($_POST['productSex']);
        $data_tmp['productPrice'] = trim($_POST['productPrice']);
        $data_tmp['productImg'] = trim($_POST['productImg']);
        $data_tmp['productDescription'] = trim($_POST['productDescription']);
        $data_tmp['id'] = $id;

        $query = "UPDATE products 
        SET ptitle = :productName, pprice = :productPrice, pkind = :productCategory, 
            pimg = :productImg, pgender = :productSex, pdescription = :productDescription 
        WHERE id = :id";

        $db->write($query, $data_tmp);

        // Chuyển hướng lại trang sản phẩm
        header("Location: " . ROOT . "Products");
        exit;
    }

}


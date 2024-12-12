<?php

class Comments extends Controller
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
        $rows = $db->read(
        "SELECT 
        comment.product_id AS id,
        products.ptitle AS product_title,
        products.pimg AS product_image,
        COUNT(comment.id) AS total_comments,
        ROUND(AVG(CAST(comment.rating AS DECIMAL)), 2) AS average_rating
        FROM 
            comment
        JOIN 
            products 
        ON 
            products.id = comment.product_id
        GROUP BY 
            comment.product_id
        LIMIT $items_per_page OFFSET $offset
        ");

        // Lấy tổng số sản phẩm để tính tổng số trang
        $total_items = $db->read(
        "SELECT 
        COUNT(comment.product_id) AS total
        FROM 
            comment
        JOIN 
            products 
        ON 
            products.id = comment.product_id
        GROUP BY 
            comment.product_id
        ")[0]->total;

        // Tính tổng số trang
        $total_pages = ceil($total_items / $items_per_page);

        // Truyền dữ liệu vào view
        $data['rows'] = $rows;
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $page;

        $this->view("admin/comments", $data);
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

    public function detail($id){

        $db = Database::getInstance();

        $data = array();

        $product = $db->read("SELECT * FROM products WHERE id = :id", ['id' => $id]);

        $comment = $db->read("SELECT comment.id, users.name, comment.rating, comment.comment FROM comment JOIN users ON comment.user_id = users.id WHERE product_id = :id", ['id' => $id]);

        $data['product'] = $product[0];

        $data['comment'] = $comment;

        $this->view("admin/detailComment",$data);
    }


    public function delete($id){


        $id = (int)$id;

        $db = Database::getInstance();

        $comment = trim($_POST['productid']);

        $productid = $db->read("SELECT * FROM comment WHERE id = :id", ['id' => $id])[0]->product_id;

        $db->write("DELETE FROM comment WHERE id = :id", ['id' => $id]);

        header("Location:" . ROOT . "Comments/detail/$productid");
        exit;

    }

}


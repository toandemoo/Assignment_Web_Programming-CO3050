<?php

class Orders extends Controller
{
    public function index()
    {
        $db = Database::getInstance();

        // Số lượng đơn hàng trên mỗi trang
        $items_per_page = 10;
        
        // Lấy trang hiện tại từ URL, nếu không có thì mặc định là trang 1
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        // Tính toán offset dựa trên trang hiện tại
        $offset = ($current_page - 1) * $items_per_page;

        // Câu truy vấn SQL với LIMIT và OFFSET
        $res = $db->read("SELECT DISTINCT order_id, users.name, orders.created_at, status, payment_method FROM orders JOIN users on users.id = orders.user_id LIMIT $items_per_page OFFSET $offset");

        // Lấy tổng số đơn hàng để tính số trang
        $total_orders = $db->read("SELECT COUNT(*) AS total FROM orders")[0]->total;
        $total_pages = ceil($total_orders / $items_per_page);  // Tính số trang

        // tổng đơn hàng đang chờ chuẩn bị
        $pending = $db->read("SELECT COUNT(DISTINCT order_id) AS total FROM orders WHERE status = 'pending'")[0]->total;

        // tổng đơn hàng đã giao thàng công
        $success = $db->read("SELECT COUNT(DISTINCT order_id) AS total FROM orders WHERE status = 'success'")[0]->total;

        // tổng đơn hàng đã hủy
        $canceled = $db->read("SELECT COUNT(DISTINCT order_id) AS total FROM orders WHERE status = 'canceled'")[0]->total;

        // tổng đơn hàng đã trả lại
        $refunded = $db->read("SELECT COUNT(DISTINCT order_id) AS total FROM orders WHERE status = 'Refunded'")[0]->total;

        // Truyền dữ liệu vào view
        $data = array();
        $data['rows'] = $res;
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $current_page;
        $data['pending'] = $pending;
        $data['success'] = $success;
        $data['canceled'] = $canceled;
        $data['refunded'] = $refunded;

        $this->view("admin/orders", $data);
    }

    public function Search()
    {
        $query = $_GET['search'] ?? '';

        $db = Database::getInstance();

        // Số lượng đơn hàng trên mỗi trang
        $items_per_page = 10;
        
        // Lấy trang hiện tại từ URL, nếu không có thì mặc định là trang 1
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        // Tính toán offset dựa trên trang hiện tại
        $offset = ($current_page - 1) * $items_per_page;

        // Câu truy vấn SQL với LIMIT và OFFSET
        $queryCondition = $query ? "name LIKE '" . $query . "'" : "1=1";

        $res = $db->read(
            "SELECT DISTINCT order_id, users.name, orders.created_at, status, payment_method 
            FROM orders JOIN users on users.id = orders.user_id 
            WHERE $queryCondition
            LIMIT $items_per_page OFFSET $offset");

        // Lấy tổng số đơn hàng để tính số trang
        $total_orders = $db->read("SELECT COUNT(*) AS total FROM orders")[0]->total;
        $total_pages = ceil($total_orders / $items_per_page);  // Tính số trang

        // tổng đơn hàng đang chờ chuẩn bị
        $pending = $db->read("SELECT COUNT(DISTINCT order_id) AS total FROM orders WHERE status = 'chờ'")[0]->total;

        // tổng đơn hàng đã giao thàng công
        $success = $db->read("SELECT COUNT(DISTINCT order_id) AS total FROM orders WHERE status = 'success'")[0]->total;

        // tổng đơn hàng đã hủy
        $canceled = $db->read("SELECT COUNT(DISTINCT order_id) AS total FROM orders WHERE status = 'canceled'")[0]->total;

        // tổng đơn hàng đã trả lại
        $refunded = $db->read("SELECT COUNT(DISTINCT order_id) AS total FROM orders WHERE status = 'Refunded'")[0]->total;

        // Truyền dữ liệu vào view
        $data = array();
        $data['rows'] = $res;
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $current_page;
        $data['pending'] = $pending;
        $data['success'] = $success;
        $data['canceled'] = $canceled;
        $data['refunded'] = $refunded;

        $this->view("admin/orders", $data);
    }

}

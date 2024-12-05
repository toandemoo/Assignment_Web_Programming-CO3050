<?php

class Customers extends Controller
{
    public function index()
    {
        $db = Database::getInstance();

        // Lấy tổng số bản ghi
        $total_items = $db->read("SELECT COUNT(*) AS total FROM users")[0]->total;

        // Cấu hình phân trang
        $items_per_page = 10; // Số bản ghi mỗi trang
        $total_pages = ceil($total_items / $items_per_page); // Tổng số trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1
        $offset = ($current_page - 1) * $items_per_page; // Tính toán offset cho LIMIT

        // Truy vấn với LIMIT và OFFSET
        // $res = $db->read("SELECT * FROM users WHERE role='user' and id in (SELECT DISTINCT user_id FROM orders) LIMIT $items_per_page OFFSET $offset");
        $res = $db->read("SELECT users.id, name, COUNT(order_id) AS totalOrders FROM users JOIN orders on users.id = orders.user_id WHERE role='user' GROUP BY id, name LIMIT $items_per_page OFFSET $offset");
        $data = array();
        $data['rows'] = $res;
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $current_page;

        $this->view("admin/customers", $data);
    }
}


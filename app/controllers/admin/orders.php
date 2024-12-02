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
        $res = $db->read("SELECT * FROM orders LIMIT $items_per_page OFFSET $offset");

        // Lấy tổng số đơn hàng để tính số trang
        $total_orders = $db->read("SELECT COUNT(*) AS total FROM orders")[0]->total;
        $total_pages = ceil($total_orders / $items_per_page);  // Tính số trang

        // Truyền dữ liệu vào view
        $data = array();
        $data['rows'] = $res;
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $current_page;

        $this->view("admin/orders", $data);
    }

}

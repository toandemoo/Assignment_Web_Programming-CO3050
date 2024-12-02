<?php

class Allproduct extends Controller
{
    public function index($pkind)
    {
        $db = Database::getInstance();
    
        // Lấy giá trị 'page' và 'show' từ URL, với giá trị mặc định
        $productsPerPage = isset($_GET['show']) ? $_GET['show'] : 10;  // Số sản phẩm mỗi trang
        $page = isset($_GET['page']) ? $_GET['page'] : 1;  // Trang hiện tại
    
        // Tính toán OFFSET (vị trí bắt đầu cho trang hiện tại)
        $offset = ($page - 1) * $productsPerPage;
        
        // Nếu có $pkind thì lấy sản phẩm theo loại, nếu không lấy tất cả sản phẩm
        if ($pkind) {
            $rows = $db->read("SELECT * FROM products WHERE pkind = :pkind LIMIT $productsPerPage OFFSET $offset", [
                'pkind' => $pkind
            ]);

            $totalProducts = $db->read("SELECT COUNT(*) AS total FROM products WHERE pkind = :pkind", [
                'pkind' => $pkind
            ])[0]->total;

        } else {
            $rows = $db->read("SELECT * FROM products LIMIT $productsPerPage OFFSET $offset");
            $totalProducts = $db->read("SELECT COUNT(*) AS total FROM products")[0]->total;

        }
    
        // Lấy danh sách các danh mục với tổng số sản phẩm trong mỗi danh mục
        $categories = $db->read("
            SELECT 
                c.id AS id,
                c.name AS name,
                COUNT(p.id) AS total
            FROM 
                categories c
            LEFT JOIN 
                products p 
            ON 
                c.name = p.pkind
            GROUP BY 
                c.name, c.id;
        ");
    
        // Lấy tổng số sản phẩm để tính số trang
        $totalPages = ceil($totalProducts / $productsPerPage);
    
        // Truyền dữ liệu vào view
        $data['rows'] = $rows;
        $data['categories'] = $categories;
        $data['totalPages'] = $totalPages;
        $data['currentPage'] = $page;
        $data['productsPerPage'] = $productsPerPage;
    
        $this->view("/customer/all_product", $data);
    }
    

    
}
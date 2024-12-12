<?php

class Search extends Controller
{
   public function index()
  {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $data = array();
          $search = trim($_POST['search']); // Lấy dữ liệu từ biểu mẫu
  
          if (!empty($search)) {
              $data['ptitle'] = '%' . $search . '%'; // Sử dụng ký tự đại diện cho tìm kiếm gần đúng
  
              $db = Database::getInstance();
              $productsPerPage = isset($_GET['show']) ? $_GET['show'] : 10;  // Số sản phẩm mỗi trang
              $page = isset($_GET['page']) ? $_GET['page'] : 1;  // Trang hiện tại
    
              // Tính toán OFFSET (vị trí bắt đầu cho trang hiện tại)
              $offset = ($page - 1) * $productsPerPage;


              $sql = "SELECT * FROM products WHERE LOWER(ptitle) LIKE LOWER(:ptitle) LIMIT $productsPerPage OFFSET $offset";
              $result = $db->read($sql, $data);
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
                      c.name,c.id;
              ");
              $totalProducts = $db->read("SELECT COUNT(*) AS total FROM products WHERE LOWER(ptitle) LIKE LOWER(:ptitle)",$data)[0]->total;
              $data['categories'] = $categories;
              $totalPages = ceil($totalProducts / $productsPerPage);
          
              // Truyền dữ liệu vào view
              $data['categories'] = $categories;
              $data['totalPages'] = $totalPages;
              $data['currentPage'] = $page;
              $data['productsPerPage'] = $productsPerPage;
              
  
              // Gán kết quả vào $data
              $data['rows'] = $result ? $result : []; // Nếu không có kết quả, gán mảng rỗng
          } else {
              $data['rows'] = []; // Không tìm kiếm nếu đầu vào rỗng
          }

          $topselling = $db->read("SELECT DISTINCT products.ptitle, products.pprice, products.pimg, COUNT(orders.product_id) AS count FROM products JOIN orders on products.id = orders.product_id GROUP BY orders.product_id, products.ptitle, products.pprice , products.pimg  ORDER BY count DESC LIMIT 5");
          $data['topselling'] = $topselling;
  
          // Gửi dữ liệu đến view
          $this->view("/customer/all_product", $data);
      } else {
          // Nếu không phải phương thức POST, hiển thị danh sách trống
          $data = ['rows' => []];
          $this->view("/customer/all_product", $data);
      }
  }
}

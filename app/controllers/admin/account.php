<?php

class Account extends Controller
{
   public function index()
   {
      $db = Database::getInstance();

      // Lấy tổng số bản ghi
      $total_items = $db->read("SELECT COUNT(*) AS total FROM users WHERE role='admin'")[0]->total;

      // Cấu hình phân trang
      $items_per_page = 10; // Số bản ghi mỗi trang
      $total_pages = ceil($total_items / $items_per_page); // Tổng số trang
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1
      $offset = ($current_page - 1) * $items_per_page; // Tính toán offset cho LIMIT

      // Truy vấn với LIMIT và OFFSET
      $res = $db->read("SELECT * FROM users WHERE role='admin' or role='employee' LIMIT $items_per_page OFFSET $offset");

      $data = array();
      $data['rows'] = $res;
      $data['total_pages'] = $total_pages;
      $data['current_page'] = $current_page;

      $this->view("admin/manager", $data);
   }

   public function addAccount()
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $data = array();
         $db = Database::getInstance();

         // Lấy và xử lý dữ liệu từ form
         $data['name'] = trim($_POST['fullName']);
         $data['email'] = trim($_POST['email']);
         // $data['password'] = password_hash(trim($_POST['password']), PASSWORD_BCRYPT); // Mã hóa mật khẩu
         $data['password'] = trim($_POST['password']); // Mã hóa mật khẩu
         $data['phone'] = trim($_POST['phoneNumber']);
         $data['birthday'] = trim($_POST['birth']);
         $data['gender'] = trim($_POST['gender']);
         $data['role'] = trim($_POST['role']);

         // Thực hiện chèn dữ liệu vào bảng users
         $query = "INSERT INTO users(name, email, password, gender, phone, birthday, role) VALUES (:name, :email, :password, :gender, :phone, :birthday, :role)";
         $result = $db->write($query, $data);

         if ($result) {
            // Lưu thông báo thành công vào session
            $_SESSION['success_message'] = "Tài khoản admin đã được tạo thành công.";
         } else {
            // Lưu thông báo lỗi vào session
            $_SESSION['error_message'] = "Đã xảy ra lỗi khi tạo tài khoản. Vui lòng thử lại.";
         }

         // Chuyển hướng về trang form
         header("Location: " . ROOT . "account");
         exit;
      }

      // Hiển thị view
      $this->view("admin/createAccount");
   }

   public function updateAccount($id)
   {
      // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $data = array();
         $db = Database::getInstance();

         // Lấy và xử lý dữ liệu từ form
         $data['name'] = trim($_POST['fullName']);
         $data['email'] = trim($_POST['email']);
         // $data['password'] = password_hash(trim($_POST['password']), PASSWORD_BCRYPT); // Mã hóa mật khẩu
         $data['password'] = trim($_POST['password']); // Mã hóa mật khẩu
         $data['phone'] = trim($_POST['phoneNumber']);
         $data['birthday'] = trim($_POST['birth']);
         $data['gender'] = trim($_POST['gender']);
         // $data['role'] = "admin";
         $data['id'] = $id;

         // Thực hiện chèn dữ liệu vào bảng users
         $query = "UPDATE users SET name=:name, email=:email, password=:password, phone=:phone, gender=:gender, birthday=:birthday WHERE  id=:id";
         $result = $db->write($query, $data);

         // if ($result) {
         //    // Lưu thông báo thành công vào session
         //    $_SESSION['success_message'] = "Tài khoản admin đã được tạo thành công.";
         // } else {
         //    // Lưu thông báo lỗi vào session
         //    $_SESSION['error_message'] = "Đã xảy ra lỗi khi tạo tài khoản. Vui lòng thử lại.";
         // }

         // Chuyển hướng về trang form
         header("Location: " . ROOT . "account");
         exit;
   }

   public function DeleteAccount($id){
        $db = Database::getInstance();

        $db->write("DELETE FROM users WHERE id = :id", ['id' => $id]);

        // Chuyển hướng lại trang sản phẩm
        header("Location:" . ROOT . "account");
        exit;
    }
}

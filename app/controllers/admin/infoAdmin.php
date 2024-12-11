<?php

class InfoAdmin extends Controller
{
    public function index()
    {
        $db = Database::getInstance();

        $user = $db->read("SELECT * FROM users WHERE email = :email", ['email' => $_SESSION['email']]);

        if ($user && is_array($user) && count($user) > 0) {
            // Lấy dòng đầu tiên của kết quả
            $user = is_array($user) ? $user[0] : $user;
        } else {
            // Nếu không có kết quả, xử lý lỗi hoặc thông báo
            echo "Không tìm thấy tài khoản với email: " . htmlspecialchars($user['email']);
        }

        $data = array();

        $data['user'] = $user;

        $this->view("admin/infoAdmin", $data);
    }

    public function updateAccount($id)
   {
      // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $data = array();
         $db = Database::getInstance();

         // Lấy và xử lý dữ liệu từ form
         $data['name'] = trim($_POST['name']);
         $data['email'] = trim($_POST['email']);
        //  $data['password'] = password_hash(trim($_POST['password']), PASSWORD_BCRYPT); // Mã hóa mật khẩu
         $data['password'] = trim($_POST['password']); // Mã hóa mật khẩu
         $data['phone'] = trim($_POST['phone']);
         $data['birthday'] = trim($_POST['birthday']);
         $data['gender'] = trim($_POST['gender']);
         // $data['role'] = "admin";
         // $data['role'] = "address";
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
         header("Location: " . ROOT . "infoAdmin");
         exit;
   }

}

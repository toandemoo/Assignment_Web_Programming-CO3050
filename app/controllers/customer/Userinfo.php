<?php

class Userinfo extends Controller
{
    public function index()
    {
        
        $data = array();
        $data['email'] = $_SESSION['email'];        

        $db = Database::getInstance();

        // SQL query để kiểm tra tài khoản
        $sql = "SELECT * FROM users WHERE email = :email";

        // Chuẩn bị dữ liệu truyền vào
        $params = [
          'email' => $data['email'],
        ];

        // Gọi hàm `read` để thực thi câu lệnh
        $result = $db->read($sql, $params);

        // Kiểm tra xem kết quả truy vấn có dữ liệu hay không
        if ($result && is_array($result) && count($result) > 0) {
            // Lấy dòng đầu tiên của kết quả
            $user = is_array($result) ? $result[0] : $result;

            // Lưu thông tin người dùng vào session
            $_SESSION['id'] = $user->id;
            $_SESSION['fullName'] = $user->name;
            $_SESSION['email'] = $user->email;
            $_SESSION['password'] = $user->password;
            $_SESSION['phoneNumber'] = $user->phone;
            $_SESSION['birth'] = $user->birthday;
            $_SESSION['gender'] = $user->gender;
        } else {
            // Nếu không có kết quả, xử lý lỗi hoặc thông báo
            echo "Không tìm thấy tài khoản với email: " . htmlspecialchars($data['email']);
        }

        // $this->view("userinfo"); // Lấy bản ghi đầu tiên
        $categories = $db->read("SELECT * FROM categories");
        $data['categories'] = $categories;

        $this->view("/customer/userinfo", $data);
    }

    // Hàm mã hóa
    function encryptData($data) {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        return base64_encode(openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv));
    }

    // Hàm giải mã
    function decryptData($encryptedData) {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        return openssl_decrypt(base64_decode($encryptedData), 'AES-256-CBC', $key, 0, $iv);
    }
    
    public function UpdateInfo()
    {
        $data = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $data['newfullName'] = trim($_POST['fullName']);
          $data['newemail'] = trim($_POST['email']);
          $data['newphoneNumber'] = trim($_POST['phoneNumber']);
          $data['newbirth'] = trim($_POST['birth']);
          $data['newpassword'] = trim($_POST['password']);
          $data['newgender'] = trim($_POST['gender']);
        } else {
          echo "Tên người dùng không hợp lệ.";
          return;
        }

        $db = Database::getInstance();

        // SQL query để kiểm tra tài khoản
        $sql = "UPDATE users SET name=:newfullName, email=:newemail, password=:newpassword, gender=:newgender, phone=:newphoneNumber, birthday=:newbirth WHERE email = :currentEmail";

        // Chuẩn bị dữ liệu truyền vào
        $params = [
          'currentEmail' => $_SESSION['email'],
          'newfullName' =>  $data['newfullName'],
          'newemail' =>  $data['newemail'],
          'newpassword' => $data['newpassword'],
          'newphoneNumber' =>  $data['newphoneNumber'],
          'newbirth' =>  $data['newbirth'],
          'newgender' =>  $data['newgender'],
        ];

        // Gọi hàm `read` để thực thi câu lệnh
        $result = $db->write($sql, $params);

        $_SESSION['fullName'] = $data['newfullName'];
        $_SESSION['email'] = $data['newemail'];
        $_SESSION['password'] = $data['newpassword'];
        $_SESSION['phoneNumber'] = $data['newphoneNumber'];
        $_SESSION['birth'] = $data['newbirth'];
        $_SESSION['gender'] = $data['newgender'];
        
        if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
          setcookie('email', $this->encryptData($data['newemail']), time() + (86400 * 30), "/"); // 30 ngày
          setcookie('password', $this->encryptData($data['newpassword']), time() + (86400 * 30), "/"); // 30 ngày
        }

        header("Location: " . ROOT . "userinfo");
    }
}

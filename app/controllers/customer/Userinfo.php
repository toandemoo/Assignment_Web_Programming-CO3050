<?php

class Userinfo extends Controller
{
    public function index()
    {
        $data = array();
        $data['email'] = $_SESSION['email'];        

        $db = Database::getInstance();



        $userid = $db->read("SELECT id FROM users WHERE email = :email", ['email' => $_SESSION['email']])[0]->id;
        $product = $db->read("SELECT COUNT(id) AS total FROM cart WHERE user_id = :id", ['id' => $userid])[0]->total;
        $data['product'] = $product;
        $_SESSION['product'] = $product;


        $userid = $db->read("SELECT id FROM users WHERE email = :email", ['email' => $_SESSION['email']])[0]->id;
        $product = $db->read("SELECT COUNT(DISTINCT order_id) AS total FROM orders WHERE user_id = :id", ['id' => $userid])[0]->total;
        $data['order'] = $product;
        $_SESSION['order'] = $product;


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
            $_SESSION['address'] = $user->address;
            $_SESSION['avatar'] = $user->img;
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
          $data['newaddress'] = trim($_POST['address']);
          // $data['newavatar'] = trim($_POST['avatar']);
        } else {
          echo "Tên người dùng không hợp lệ.";
          return;
        }

        $db = Database::getInstance();

        // SQL query để kiểm tra tài khoản
        $sql = "UPDATE users SET name=:newfullName, email=:newemail, password=:newpassword, gender=:newgender, phone=:newphoneNumber, birthday=:newbirth, address=:newaddress WHERE email = :currentEmail";

        // Chuẩn bị dữ liệu truyền vào
        $params = [
          'currentEmail' => $_SESSION['email'],
          'newfullName' =>  $data['newfullName'],
          'newemail' =>  $data['newemail'],
          'newpassword' => $data['newpassword'],
          'newphoneNumber' =>  $data['newphoneNumber'],
          'newbirth' =>  $data['newbirth'],
          'newgender' =>  $data['newgender'],
          'newaddress' => $data['newaddress'],
          // 'newavatar' => $data['newavatar']
        ];

        // Gọi hàm `read` để thực thi câu lệnh
        $result = $db->write($sql, $params);

        $_SESSION['fullName'] = $data['newfullName'];
        $_SESSION['email'] = $data['newemail'];
        $_SESSION['password'] = $data['newpassword'];
        $_SESSION['phoneNumber'] = $data['newphoneNumber'];
        $_SESSION['birth'] = $data['newbirth'];
        $_SESSION['gender'] = $data['newgender'];
        $_SESSION['address'] = $data['newaddress'];
        $_SESSION['avatar'] = $data['newavatar'];
        
        if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
          setcookie('email', $this->encryptData($data['newemail']), time() + (86400 * 30), "/"); // 30 ngày
          setcookie('password', $this->encryptData($data['newpassword']), time() + (86400 * 30), "/"); // 30 ngày
        }

        header("Location: " . ROOT . "userinfo");
    }


    public function UpdateAvatar(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            // Đường dẫn thư mục lưu file
            $targetDir = "c:/xampp/htdocs/Assignment_Web_Programming-CO3050/public/uploads/";

            // Tạo thư mục nếu chưa tồn tại
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Tạo tên file duy nhất
            $fileName = $_FILES['avatar']['name'];
            $targetFilePath = $targetDir . $fileName;

            // Kiểm tra định dạng file
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($fileType, $validExtensions)) {
                // Di chuyển file tải lên
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFilePath)) {
                    // Lấy thông tin file
                    $fileSize = $_FILES['avatar']['size'];
                    $filePath = "http://localhost/Assignment_Web_Programming-CO3050/public/uploads/" . $fileName;

                    $db = Database::getInstance();

                    $sql = "UPDATE users SET img=:newavatar WHERE email = :currentEmail";

                    $params = [
                      'currentEmail' => $_SESSION['email'],
                      'newavatar' => $filePath
                    ];
                    $db->write($sql, $params);

                } else {
                    echo "Lỗi: Không thể di chuyển file.";
                }
            } else {
                echo "Chỉ chấp nhận file ảnh (JPG, JPEG, PNG, GIF).";
            }
        } else {
            echo "Lỗi tải file: " . $_FILES['avatar']['error'];
        }
      } else {
          echo "Yêu cầu không hợp lệ.";
      }

      header("Location: " . ROOT . "userinfo");

    }
}

<?php

class Account
{
    private $error = "";

    public function encryptData($data) {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        return base64_encode(openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv));
    }

    // Hàm giải mã
    public function decryptData($encryptedData) {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        return openssl_decrypt(base64_decode($encryptedData), 'AES-256-CBC', $key, 0, $iv);
    }
    
    public function signup($POST)
    {   
        $data = array();
        $db = Database::getInstance();

        $data['name'] = trim($POST['fullName']);
        $data['email'] = trim($POST['email']);
        $data['password'] = trim($POST['password']);
        $data['phone'] = trim($POST['phoneNumber']);
        $data['birthday'] = trim($POST['birth']);
        $data['gender'] = trim($POST['gender']);
        $data['role'] = "user";


        // if (empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email']))
        // {
        //     $this->error .= "Please enter a valid email <br>";
        // }

        // if (empty($data['username']) || !preg_match("/^[a-zA-Z]+$/", $data['username']))
        // {
        //     $this->error .= "Please enter a valid name <br>";
        // }

        // if (strlen($data['password']) < 2)
        // {
        //     $this->error .= "Please must be atleast 4 characters long <br>";
        // }

        $sql = "SELECT * FROM users WHERE email = :email";
        $arr['email'] = $data['email'];
        $check = $db->read($sql,$arr);
        if (is_array($check))
        {
            $this->error .= "email is already in use <br>";
        }

        if ($this->error == "")
        {
            $query = "INSERT INTO users(name,email,password,gender, phone, birthday, role) VALUES (:name,:email,:password,:gender,:phone,:birthday,:role)";
            $result = $db->write($query, $data);

            if ($result)
            {
                setcookie('email', $this->encryptData($data['email']), time() + (86400 * 30), "/"); // 30 ngày
                setcookie('password', $this->encryptData($data['password']), time() + (86400 * 30), "/"); // 30 ngày
                header("Location: ". ROOT. "login");
                die;
            }
        }

        $_SESSION['error'] = $this->error;

    }

    public function login($POST)
    {
        $data = array();
        $db = Database::getInstance();

        // Kiểm tra cookie nếu người dùng đã chọn "Remember Me"
        if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
           
            $data['email'] = $this->decryptData($_COOKIE['email']);
            $data['password'] = $this->decryptData($_COOKIE['password']);

            // SQL query để kiểm tra tài khoản
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1";

            // Chuẩn bị dữ liệu truyền vào
            $params = [
                'email' => $data['email'],
                'password' => $data['password'], // Nên mã hóa mật khẩu (hash) thay vì lưu plaintext
            ];

            // Gọi hàm `read` để thực thi câu lệnh
            $result = $db->read($sql, $params);

            if (is_array($result) && count($result) > 0) {
                $_SESSION['email'] = $data['email'];;
                header("Location: " . ROOT . "home");
                exit();
            }
        } 
        else 
        {
            $data['email'] = trim($_POST['email']);
            $data['password'] = trim($_POST['password']);
            $remember = isset($_POST['remember']) ?? null;

            if ($this->error == "") {
                
                // SQL query để kiểm tra tài khoản
                $sql = "SELECT * FROM users WHERE email = :email AND password = :password";

                // Chuẩn bị dữ liệu truyền vào
                $params = [
                    'email' => $data['email'],
                    'password' => $data['password'], // Nên mã hóa mật khẩu (hash) thay vì lưu plaintext
                ];

                // Gọi hàm `read` để thực thi câu lệnh
                $result = $db->read($sql, $params);

                // Nếu tìm thấy tài khoản
                if (is_array($result) && count($result) > 0) {
                    $_SESSION['email'] = $data['email']; // Gán thông tin người dùng vào session
                    $_SESSION['password'] = $data['password']; // Gán thông tin người dùng vào session
                    
                    // Lưu cookie nếu chọn "Remember Me"
                    if ($remember) {
                        setcookie('email', $this->encryptData($data['email']), time() + (86400 * 30), "/"); // 30 ngày
                        setcookie('password', $this->encryptData($data['password']), time() + (86400 * 30), "/"); // 30 ngày
                    }
                    header("Location: " . ROOT . "home");
                    die;
                }
                // Nếu không tìm thấy tài khoản, báo lỗi
                $this->error = "Wrong email or password <br>";
                $_SESSION['error'] = $this->error;
                header("Location: " . ROOT . "login");
                die;
            }
        }

    }

    public function logout(){
        session_start();

        // // Xóa cookie bằng cách thiết lập thời gian hết hạn về quá khứ
        // setcookie("username", "", time() - 3600, "/"); // Cookie sẽ hết hạn sau 1 giờ
        // setcookie("password", "", time() - 3600, "/"); // Cookie sẽ hết hạn sau 1 giờ

        // Hủy tất cả dữ liệu trong session
        session_unset();

        // Hủy session
        session_destroy();

        // Chuyển hướng về trang đăng nhập hoặc trang chủ
        header("Location: ". ROOT. "login");
        exit();
    }
}



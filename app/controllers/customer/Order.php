<?php
class Order extends Controller
{
    public function index()
    {
        // Kiểm tra session đã được khởi tạo chưa, nếu chưa thì khởi tạo session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Kiểm tra nếu người dùng đã đăng nhập (email có trong session)
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];

            // Kết nối đến database
            $db = Database::getInstance();

            // Lấy user_id từ bảng users dựa trên email
            $userQuery = "SELECT id FROM users WHERE email = ?";
            $user = $db->read($userQuery, [$email]);

            if (!empty($user)) {
                // Lấy user_id
                $userId = $user[0]->id;

                // Truy vấn lấy tất cả đơn hàng của user từ bảng orders, bao gồm cả product_id
                $orderQuery = "SELECT order_id, product_id, totalAmount, payment_method, created_at, 
                                      recipient_name, recipient_phone, province, district, notes, shipping_type, quantity
                               FROM orders
                               WHERE user_id = ?
                               ORDER BY created_at DESC";
                $orders = $db->read($orderQuery, [$userId]);

                // Duyệt qua tất cả các đơn hàng và truy vấn thông tin sản phẩm từ bảng products
                $orderData = [];
                foreach ($orders as $order) {
                    $productQuery = "SELECT * FROM products WHERE id = ?";
                    $product = $db->read($productQuery, [$order->product_id]);

                    if (!empty($product)) {
                        // Gán thông tin sản phẩm vào mỗi đơn hàng
                        $order->product = $product[0];
                    }

                    // Tạo cấu trúc dữ liệu cho đơn hàng
                    $orderData[] = $order;
                }

                // Chuẩn bị dữ liệu để truyền vào view
                $data['orders'] = $orderData;
                $data['email'] = $email;

                // Gọi view và truyền dữ liệu vào
                $this->view("customer/order", $data);
            } else {
                // Nếu không tìm thấy người dùng trong cơ sở dữ liệu, thông báo lỗi hoặc chuyển hướng
                echo "User not found.";
                exit;
            }
        } else {
            // Nếu không có email trong session, chuyển hướng đến trang đăng nhập
            $this->view("customer/login");
            exit();
        }
    }
}

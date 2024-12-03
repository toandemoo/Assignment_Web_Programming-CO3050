<?php
class Payment extends Controller
{
    function generateUniqueOrderId() {
        // Lấy timestamp (thời gian hiện tại tính bằng mili giây)
        $timestamp = round(microtime(true) * 1000);
        
        // Tạo một số ngẫu nhiên
        $randomNumber = rand(100000, 999999);
        
        // Tạo Order ID duy nhất
        $uniqueOrderId = "ORDER" . $timestamp . $randomNumber;
        
        return $uniqueOrderId;
    }
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['order_id'])) {
            $_SESSION['order_id'] = $this->generateUniqueOrderId();
        }
        // Lấy tab hiện tại và hình thức giao hàng
        $currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'info';
        $shippingType = isset($_GET['shippingType']) ? $_GET['shippingType'] : 'pickup';

        // Đọc dữ liệu địa chỉ từ JSON
        $jsonFilePath = '../app/views/customer/Shared/vietnamAddress.json';
        $json = file_get_contents($jsonFilePath);
        $locations = json_decode($json, true);

        // Khởi tạo dữ liệu tỉnh và quận/huyện
        $districts = [];
        $selectedProvinceId = null;
        $selectedProductDetails = []; 
        $totalAmount = 0;

        // Nếu có POST, xử lý dữ liệu tỉnh thành và sản phẩm
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy tỉnh thành được chọn
            $selectedProvinceId = $_POST['province'] ?? null;

            // Lấy danh sách quận/huyện nếu tỉnh thành được chọn
            if ($selectedProvinceId) {
                foreach ($locations as $province) {
                    if ($province['Id'] == $selectedProvinceId) {
                        $districts = $province['Districts'] ?? [];
                        break;
                    }
                }
            }

            // Lấy danh sách sản phẩm được chọn
            $selectedProducts = $_POST['selected_products'] ?? [];
            $quantities = $_POST['quantities'] ?? [];

            // Nếu có sản phẩm được chọn, xử lý chúng
            if (!empty($selectedProducts)) {
                $db = Database::getInstance();
                $placeholders = implode(',', array_fill(0, count($selectedProducts), '?'));
                $sql = "SELECT * FROM products WHERE id IN ($placeholders)";
                $products = $db->read($sql, $selectedProducts);

                foreach ($products as $product) {
                    $quantity = $quantities[$product->id] ?? 1;
                    $subTotal = $product->pprice * $quantity;
                    $totalAmount += $subTotal;

                    $selectedProductDetails[] = [
                        'id' => $product->id,
                        'name' => $product->ptitle,
                        'image' => $product->pimg,
                        'quantity' => $quantity,
                        'price' => $product->pprice,
                        'subTotal' => $subTotal,
                    ];
                }
                $_SESSION['totalAmount'] = $totalAmount;
            }

            if (isset($_POST['paymentMethod'])) {
                $paymentMethod = $_POST['paymentMethod']; 
                $orderId = $_SESSION['order_id'];
                $selectedProducts = $_SESSION['selectedProducts'] ?? [];
                $userEmail = $_SESSION['email'] ?? null;
            
                if (!$userEmail) {
                    echo "User email not found in session.";
                    exit;
                }
            
                // Kết nối cơ sở dữ liệu
                $db = Database::getInstance();
            
                // Lấy `user_id` từ bảng `user` dựa trên email
                $sql = "SELECT id FROM users WHERE email = ?";
                $user = $db->read($sql, [$userEmail]);
            
                if (empty($user)) {
                    echo "User not found in database.";
                    exit;
                }
                $userId = $user[0]->id;
            
                // Thêm dữ liệu vào bảng `orders`
                foreach ($selectedProducts as $product) {
                    $sql = "INSERT INTO orders (order_id, product_id, user_id, totalAmount, payment_method, created_at)
                            VALUES (?, ?, ?, ?, ?, NOW())";
            
                    $db->write($sql, [
                        $orderId,        // order_id
                        $product['id'],  // product_id
                        $userId,         // user_id lấy từ bảng users
                        $product['subTotal'], // totalAmount
                        $paymentMethod,  // payment_method
                    ]);
                }
            
                // Xóa các sản phẩm đã chọn khỏi bảng `cart`
                $productIds = array_column($selectedProducts, 'id'); // Lấy danh sách ID sản phẩm đã chọn
                if (!empty($productIds)) {
                    $placeholders = implode(',', array_fill(0, count($productIds), '?'));
                    $sql = "DELETE FROM cart WHERE product_id IN ($placeholders) AND user_id = ?";
                    $db->write($sql, array_merge($productIds, [$userId]));
                }
            
                // Gửi thông báo hoặc chuyển hướng
                $this->view("/customer/Cart");
                exit;
            }
            
        } else {
            // Nếu không có POST, kiểm tra xem có dữ liệu sản phẩm trong session không
            if (isset($_SESSION['selectedProducts'])) {
                $selectedProductDetails = $_SESSION['selectedProducts'];
                $totalAmount = $_SESSION['totalAmount'] ?? 0; // Lấy tổng tiền từ session
            }
        }
        // Lưu thông tin sản phẩm đã chọn vào session để giữ lại khi tải lại trang
        $_SESSION['selectedProducts'] = $selectedProductDetails;

        // Truyền dữ liệu vào view
        $this->view("/customer/payment", [
            'currentTab' => $currentTab,
            'shippingType' => $shippingType,
            'locations' => $locations,
            'districts' => $districts,
            'selectedProvinceId' => $selectedProvinceId,
            'selectedProducts' => $selectedProductDetails,
            'totalAmount' => $totalAmount,
        ]);
    }
}
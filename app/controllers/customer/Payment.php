<?php
class Payment extends Controller
{
    function generateUniqueOrderId() {
        // Lấy timestamp (thời gian hiện tại tính bằng mili giây)
        $timestamp = round(microtime(true) * 1000);
        
        // Lấy ID tự tăng từ cơ sở dữ liệu hoặc tạo một số ngẫu nhiên dài
        $randomNumber = rand(100000, 999999);
        // Tạo Order ID duy nhất bằng cách kết hợp timestamp và số ngẫu nhiên
        $uniqueOrderId = "ORDER" . $timestamp . $randomNumber;
    
        // Bạn cũng có thể lưu lại ID này vào cơ sở dữ liệu để kiểm tra trùng lặp
        return $uniqueOrderId;
    }

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $db = Database::getInstance();
        
        $_SESSION['order_id'] = $this->generateUniqueOrderId();

        // Lấy thông tin người dùng từ session (email)
        $userEmail = $_SESSION['email'] ?? null;
        
        if ($userEmail) {
            // Truy vấn lấy thông tin người dùng từ bảng `users`
            $sql = "SELECT id, name, phone, email FROM users WHERE email = ?";
            $user = $db->read($sql, [$userEmail]);

            if (!empty($user)) {
                // Lưu thông tin người dùng vào session
                $_SESSION['user_id'] = $user[0]->id;
                $_SESSION['user_name'] = $user[0]->name;
                $_SESSION['user_phone'] = $user[0]->phone;
                $_SESSION['user_email'] = $user[0]->email;
            } else {
                echo "User not found in database.";
                exit;
            }
        } else {
            echo "User email not found in session.";
            exit;
        }

        // Lấy tab hiện tại và hình thức giao hàng
        $currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'info';
        $shippingType = isset($_GET['shippingType']) ? $_GET['shippingType'] : 'pickup';
        if($shippingType && $shippingType != 'pickup'){
            $_SESSION['shippingType'] = $shippingType;
        }
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

            $selectedProducts = $_POST['selected_products'] ?? [];
            $quantities = $_POST['quantities'] ?? [];
            
            // Kiểm tra nếu có sản phẩm được chọn
            if (!empty($selectedProducts)) {
                // Khởi tạo mảng chứa chi tiết sản phẩm và tổng số tiền
                $totalAmount = 0;
                $selectedProductDetails = [];
            
                // Duyệt qua mảng sản phẩm đã chọn
                foreach ($selectedProducts as $productId) {
                    // Truy vấn thông tin sản phẩm theo từng ID
                    $sql = "SELECT * FROM products WHERE id = ?";
                    $product = $db->read($sql, [$productId]);
            
                    if (!empty($product)) {
                        // Lấy số lượng từ mảng $_POST['quantities'], nếu không có thì mặc định là 1
                        $quantity = $quantities[$productId] ?? 1;
            
                        // Tính tổng tiền cho từng sản phẩm
                        $subTotal = $product[0]->pprice * $quantity;
                        $totalAmount += $subTotal;
            
                        // Thêm chi tiết sản phẩm vào mảng selectedProductDetails
                        $selectedProductDetails[] = [
                            'id' => $product[0]->id,
                            'name' => $product[0]->ptitle,
                            'image' => $product[0]->pimg,
                            'quantity' => $quantity,
                            'price' => $product[0]->pprice,
                            'subTotal' => $subTotal,
                        ];
                    }
                }
            
                // Lưu tổng tiền vào session
                $_SESSION['totalAmount'] = $totalAmount;
            
                // Cập nhật lại thông tin sản phẩm đã chọn trong session
                $_SESSION['selectedProducts'] = $selectedProductDetails;
            }
            

            // Lưu thông tin người nhận và địa chỉ vào session
            if (isset($_POST['pickupLocation'])) {
                $pickupLocation = $_POST['pickupLocation'];
                $_SESSION['pickupLocation'] = $pickupLocation;
            }

            if (isset($_POST['recipientName'])) {
                $_SESSION['recipientName'] = $_POST['recipientName'];
            }

            if (isset($_POST['recipientPhone'])) {
                $_SESSION['recipientPhone'] = $_POST['recipientPhone'];
            }

            if (isset($_POST['province'])) {
                $_SESSION['province'] = $_POST['province'];
            }

            if (isset($_POST['district'])) {
                $_SESSION['district'] = $_POST['district'];
            }

            if (isset($_POST['notes'])) {
                $_SESSION['notes'] = $_POST['notes'];
            }
            if (isset($_POST['paymentMethod'])) {
                $paymentMethod = $_POST['paymentMethod'];
                $orderId = $_SESSION['order_id'];
                $selectedProducts = $_SESSION['selectedProducts'] ?? [];
                $userId = $_SESSION['user_id'];
                $userName = $_SESSION['user_name'];
                $userPhone = $_SESSION['user_phone'];   
                $userEmail = $_SESSION['user_email'];

                // Lấy thông tin người nhận (nếu không có thì lấy từ user hiện tại)
                if($_SESSION['shippingType'] === 'delivery'){
                    $recipientName = $_SESSION['recipientName'];
                    $recipientPhone = $_SESSION['recipientPhone'];
                    $provinceId = $_SESSION['province'];
                    $districtId = $_SESSION['district'];
                    $provinceName = null;
                    $districtName = null;
                    foreach ($locations as $province) {
                        if ($province['Id'] == $provinceId) {
                            $provinceName = $province['Name'];
                            foreach ($province['Districts'] as $district) {
                                if ($district['Id'] == $districtId) {
                                    $districtName = $district['Name'];
                                    break;
                                }
                            }
                            break;
                        }
                    }
                
                    $province = $provinceName;
                    $district = $districtName;
                }else{
                    $recipientName = $userName;
                    $recipientPhone = $userPhone;
                    if($_SESSION['pickupLocation'] =='store1'){
                        $province = 'TP.HCM';
                        $district = '123 Đường Nguyễn Văn Cừ, Quận 5';
                    }
                    else if($_SESSION['pickupLocation'] == 'store2'){
                        $province = 'TP.HCM';
                        $district = '125 Đường Phạm Văn Đồng, Quận 9';
                    }
                    else{
                        $province = null;
                        $district = null;
                    }
                    $notes = null;
                }
                // Thêm dữ liệu vào bảng `orders`
                foreach ($selectedProducts as $product) {
                    $sql = "INSERT INTO orders (order_id, product_id, user_id, totalAmount, payment_method, created_at, recipient_name, recipient_phone, province, district, notes, shipping_type, quantity)
                            VALUES (?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?)";
                
                    $db->write($sql, [
                        $orderId,
                        $product['id'],
                        $userId,
                        $product['subTotal'],
                        $paymentMethod,
                        $recipientName,
                        $recipientPhone,
                        $province,
                        $district,
                        $notes,
                        $shippingType,
                        $product['quantity']
                    ]);
                }

                // Xóa các sản phẩm đã chọn khỏi bảng `cart`
                $productIds = array_column($selectedProducts, 'id');
                if (!empty($productIds)) {
                    $placeholders = implode(',', array_fill(0, count($productIds), '?'));
                    $sql = "DELETE FROM cart WHERE product_id IN ($placeholders) AND user_id = ?";
                    $db->write($sql, array_merge($productIds, [$userId]));
                }

                header('Location: /assignment/public/Cart');
                exit();
            }
            
        } else {
            // Nếu không có POST, kiểm tra xem có dữ liệu sản phẩm trong session không
            if (isset($_SESSION['selectedProducts'])) {
                $selectedProductDetails = $_SESSION['selectedProducts'];
                $totalAmount = $_SESSION['totalAmount'] ?? 0;
            }
        }

        // Truyền dữ liệu vào view
        $this->view("/customer/payment", [
            'currentTab' => $currentTab,
            'shippingType' => $shippingType,
            'locations' => $locations,
            'districts' => $districts,
            'selectedProvinceId' => $selectedProvinceId,
            'selectedProducts' => $_SESSION['selectedProducts'],
            'totalAmount' => $_SESSION['totalAmount'],
        ]);
    }
}
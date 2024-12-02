<?php
class Payment extends Controller
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Lấy tab hiện tại và hình thức giao hàng
        $currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'info';
        $shippingType = isset($_GET['shippingType']) ? $_GET['shippingType'] : 'pickup';

        // Đọc dữ liệu địa chỉ từ JSON
        $jsonFilePath = 'C:/xampp/htdocs/main/app/views/customer/Shared/vietnamAddress.json';
        $json = file_get_contents($jsonFilePath);
        $locations = json_decode($json, true);

        // Khởi tạo dữ liệu tỉnh và quận/huyện
        $districts = [];
        $selectedProvinceId = null;

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
            $totalAmount = 0;
            $selectedProductDetails = [];

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
        }

        // Truyền dữ liệu vào view
        $this->view("/customer/payment", [
            'currentTab' => $currentTab,
            'shippingType' => $shippingType,
            'locations' => $locations,
            'districts' => $districts,
            'selectedProvinceId' => $selectedProvinceId,
            'selectedProducts' => $selectedProductDetails ?? [],
            'totalAmount' => $totalAmount ?? 0,
        ]);
    }
}
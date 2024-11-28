<?php
    $servername = "127.0.0.1";
    $username = "connect";
    $password = "1234543";
    $database = "ltw_241";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công";
?>
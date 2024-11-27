<?php

class Allproduct extends Controller
{
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!isset($_POST['search']) || empty(trim($_POST['search']))) {
                echo 'Vui lòng nhập từ khóa tìm kiếm';
                return;
            }
            $data = array();
            $data['ptitle'] = trim($_POST['search']);

            $db = Database::getInstance();
            $sql = "SELECT * FROM products WHERE ptitle = :ptitle";
            $result = $db->read($sql, $data);

            $data['rows'] = $result;

            $this->view("all_product", $data);
        }

        $db = Database::getInstance();

        $rows = $db->read("SELECT * FROM products");

        $data['rows'] = $rows;

        $this->view("all_product",$data);
    }
}
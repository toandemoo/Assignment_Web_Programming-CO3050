<?php

class Search extends Controller
{
    public function index()
    {
      // $_SERVER["REQUEST_METHOD"] == "POST"
      $data = array();
      $data['ptitle'] = trim($_POST['search']);

      $db = Database::getInstance();
      $sql = "SELECT * FROM products WHERE ptitle = :ptitle";
      $result = $db->read($sql, $data);

      $data['rows'] = $result;

      $this->view("all_product", $data);
    }
}
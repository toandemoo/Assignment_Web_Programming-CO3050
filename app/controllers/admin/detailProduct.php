<?php

class DetailProduct extends Controller
{
    public function index($id)
    {
        $db = Database::getInstance();

        $product = $db->read("SELECT * FROM products WHERE id = :id", ['id' => $id])[0];

        $available = $db->read("SELECT * FROM available WHERE product_id = :id", ['id' => $id]);

        $data = array();

        $data['product'] = $product;
        $data['available'] = $available;

        $this->view("admin/detailProduct",$data);
    }



    public function addSize($id)
    {   
        $db = Database::getInstance();

        $data_tmp = array();

        $data_tmp['size'] = trim($_POST['size']);
        $data_tmp['quantity'] = trim($_POST['quantity']);
        $data_tmp['product_id'] = $id;
        

        $query = "INSERT INTO available(product_id,size,quantity) VALUES (:product_id,:size,:quantity)";

        $db->write($query, $data_tmp);

        // Chuyển hướng lại trang sản phẩm
        header("Location: " . ROOT . "DetailProduct/" . $id);
        exit;   
    }

    public function deleteSize($id){
        $db = Database::getInstance();

        echo $id; 
        
        $data_tmp = array();

        $data_tmp['id'] = trim($_POST['idsize']);

        echo $data_tmp['id'];

        $db->read("DELETE FROM available WHERE id =:id", ['id' => $data_tmp['id']]);

        // Chuyển hướng lại trang sản phẩm
        header("Location: " . ROOT . "DetailProduct/" . $id);
        exit;
    }


    public function updateSize($id){
        $db = Database::getInstance();

        $data_tmp = array();

        $data_tmp['size'] = trim($_POST['size']);
        $data_tmp['quantity'] = trim($_POST['quantity']);
        $data_tmp['product_id'] = $id;
        

        $query = "UPDATE available SET size=:size, quantity=:quantity WHERE product_id =:product_id";

        $db->write($query, $data_tmp);

        // Chuyển hướng lại trang sản phẩm
        header("Location: " . ROOT . "DetailProduct/" . $id);
        exit; 
    }
}

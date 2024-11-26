<?php

class Controller
{
    public function view($path, $data = [])
    {
        if (file_exists("../app/views/" . $path . ".php")) {
            extract($data); 
            require "../app/views/" . $path . ".php";
        }
        else {
            require "../app/views/404.php";
        }
    }

    public function load_model($model)
    {
        if (file_exists("../app/models/".$model. ".php"))
        {
            require "../app/models/" .$model. ".php";
            return $a = new $model();
        }
        return false;
    }

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
}
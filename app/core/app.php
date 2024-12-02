<?php

class App 
{
    protected $controller = "Index";
    protected $method = "index"; 
    protected $params;

    public function __construct()
    {
        $url = $this->splitURL();

        // Xử lý controller cho folder 'customer' hoặc 'admin'
        if (isset($url[0])) {
            $controllerPath = null;
            
            if (file_exists("../app/controllers/customer/" . strtolower($url[0]) . ".php")) {
                $controllerPath = "../app/controllers/customer/" . strtolower($url[0]) . ".php";
            } elseif (file_exists("../app/controllers/admin/" . strtolower($url[0]) . ".php")) {
                $controllerPath = "../app/controllers/admin/" . strtolower($url[0]) . ".php";
            }

            if ($controllerPath) {
                $this->controller = ucfirst(strtolower($url[0])); // Lấy tên controller
                require $controllerPath;
                unset($url[0]);
            } else {
                // Controller mặc định
                require "../app/controllers/customer/index.php";
            }
        }


        // Khởi tạo controller
        $this->controller = new $this->controller;

        // Xử lý method
        if (isset($url[1])) {
            $url[1] = strtolower($url[1]);
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Xử lý params
        $this->params = (count($url) > 0) ? array_values($url) : [""];

        // Gọi controller/method
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function splitURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : 'index';
        return explode('/', trim($url, "/"));
    }
}

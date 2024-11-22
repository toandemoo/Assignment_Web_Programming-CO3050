<?php

class Controller
{
    public function view($path, $data = [])
    {
        if (file_exists("../app/views/" . $path . ".php")) {
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
}
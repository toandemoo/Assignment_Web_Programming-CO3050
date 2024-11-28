<?php

class database
{

    public static $conn;

    public function __construct()
    {
        try{
            $string = "mysql:host=".SERVERNAME.";dbname=".DBNAME;
            self::$conn = new PDO($string, USERNAME, PASSWORD);
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$conn)
        {
            return self::$conn;
        }

        return $instance = new self();
    }

    public function read($query, $data = array())
    {
        $stm = self::$conn->prepare($query);
        $result = $stm->execute($data);

        if ($result)
        {
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            if (is_array($data) && count($data) > 0)
            {
                return $data;
            }
        }
        return false;
        
    }

    public function write($query, $data = array())
    {
        $stm = self::$conn->prepare($query);
        $result = $stm->execute($data);

        if ($result)
        {
           return true;
        }
        return false;
    }

}



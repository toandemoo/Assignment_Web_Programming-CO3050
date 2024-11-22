<?php

class Account
{
    private $error = "";
    public function signup($POST)
    {   
        $data = array();
        $db = Database::getInstance();

        $data['username'] = trim($POST['username']);
        $data['email'] = trim($POST['email']);
        $data['password'] = trim($POST['password']);
        $data['phonenumber'] = trim($POST['phonenumber']);
        $password2 = trim($POST['password2']);


        if (empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email']))
        {
            $this->error .= "Please enter a valid email <br>";
        }

        if (empty($data['username']) || !preg_match("/^[a-zA-Z]+$/", $data['username']))
        {
            $this->error .= "Please enter a valid name <br>";
        }

        if ($data['password'] != $password2)
        {
            $this->error .= "Passwords do not match <br>";
        }

        if (strlen($data['password']) < 4)
        {
            $this->error .= "Please must be atleast 4 characters long <br>";
        }

        $sql = "SELECT * FROM account WHERE email = :email LIMIT 1";
        $arr['email'] = $data['email'];
        $check = $db->read($sql,$arr);
        if (is_array($check))
        {
            $this->error .= "Email is already in use <br>";
        }

        if ($this->error == "")
        {
            $data['role'] = "user";
            $query = "INSERT INTO account (username,password,role,fullname,email,address,phonenumber) VALUES (:username,:password,:role,:fullname,:email,:address,:phonenumber)";
            $result = $bd->write($query, $data);

            if ($result)
            {
                header("Location: ". ROOT. "login");
                die;
            }
        }

        $_SESSION['error'] = $this->error;

    }


    public function login($POST)
    {
        $data = array();
        $db = Database::getInstance();

        $data['email'] = trim($POST['email']);
        $data['password'] = trim($POST['password']);


        if (empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email']))
        {
            $this->error .= "Please enter a valid email <br>";
        }

        
        if (strlen($data['password']) < 4)
        {
            $this->error .= "Please must be atleast 4 characters long <br>";
        }

        if ($this->error == "")
        {

            $sql = "SELECT * FROM account WHERE email = :email && password = :password LIMIT 1";
            $arr['email'] = $data['email'];
            $result = $db->read($sql,$data);
            if (is_array($result))
            {
                $_SESSION['user'];
                header("Location: ". ROOT. "home");
                die;
            }

            $this->error .= "Wrong email or password <br>";
        }
    }

    public function check_login($redirect = false)
    {
        if (isset($_SESSION['username']))
        {
            $arr['username'] = $_SESSION['username'];
            $query = "SELECT * FROM account WHERE id = :id LIMIT 1";
            $db = Database::getInstance();

            $result = $db->read($query, $arr);
            if (is_array($result))
            {
                return $result[0];
            }
        }

        if ($redirect) {
            header("Location: ".ROOT. "login");
            die;
        }
    }
}



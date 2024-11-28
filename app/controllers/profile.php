<?php

class Profile extends Controller
{
    public function index()
    {
        $account = $this->load_model('account');
        $user_data = $account->check_login(true);
        if (is_object($user_data))
        {
            $data['user_data'] = $user_data;
        }
        $this->view("User_info". $data);
    }

   
}

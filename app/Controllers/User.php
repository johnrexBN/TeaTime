<?php

namespace App\Controllers;
use App\Models\UsersModel;



class User extends BaseController{

    public function profile(){
        return view('User/profile');
    }

}
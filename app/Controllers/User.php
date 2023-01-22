<?php

namespace App\Controllers;
use App\Models\UsersModel;



class User extends BaseController{

    public function profile(){
        return view('User/profile');
    }

    public function editprofile(){
        return view('User/editprofile');
    }

    public function show(){
        return view('User/show');
    }
}
<?php

namespace App\Controllers;

class User extends BaseController{

    public function profile(){
        return view('user/profile');
    }

}
<?php
namespace App\Controllers;

use CodeIgniter\Debug\Toolbar\Collectors\Views;

class welcome extends BaseController{
    public function index(){
        return view('welcome_message');
    }
}

<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\MenuModel;
use CodeIgniter\Validation\Validation;
use App\Models\ProductModel;
use CodeIgniter\Files\File;
use App\Models\ReservationModel;
use App\Models\ContactModel;

class Guest extends BaseController
{
    public function guest_home()
    {
        return view('guest/homepage');
    }
}
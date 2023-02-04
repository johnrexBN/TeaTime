<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password','usertype','status', 'username','address','phone_number', 'created_at','updated_at'];
}
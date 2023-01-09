<?php 

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table      = 'reservation';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'email', 
        'phone',
        'subject',
        'tables',
        'message',
        'date',
        'time_send'
    ];
}
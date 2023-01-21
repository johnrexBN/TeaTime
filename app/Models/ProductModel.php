<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'description', 
        'price',
        'quantity',
        'category'
    ];

    public function stockCount($name)
    {
        $prod_model = new ProductModel();
        return $prod_model->where('name', $name)->findAll();
    }

    public function retrieve_mod()
    {
        $prod = new ProductModel();
        $data = [
            'products'=> $prod->findAll()
        ];

        return $data;
    }
}

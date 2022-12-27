<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\MenuModel;
use CodeIgniter\Validation\Validation;
use App\Models\ProductModel;
use CodeIgniter\Files\File;

class home extends BaseController
{

    protected $helpers = ['form'];

    public function try()
    {
        $quantity = $this->request->getVar('quantity');
        return $quantity;
    }

    public function homepage()
    {
        $prod = new ProductModel();
        $data = [
            'products' => $prod->findAll()
        ];
        return view('Homepage/homepage', $data);
    }
    public function contact()
    {
        return view('Homepage/contact');
    }
    public function about()
    {
        return view('Homepage/about');
    }
    public function book()
    {
        return view('Homepage/book');
    }
    public function cart()
    {
        $id = session()->get('id');
        $cart_model = new CartModel();

        $cart['cart'] = $cart_model->select('*')
        ->join('menu', 'cart.menuid = menu.id', 'right')
        ->where('cart.userid', $id)->get()->getResultArray();



        $cart['total'] = $cart_model->selectSum('total')
            ->where('userid', $id)->get()->getResultArray();
          
        
        return view('Homepage/cart', $cart);
       
    }
    public function checkout()
    {
        return view('Homepage/checkout');
    }
    public function shop()
    {
        $menu_model = new MenuModel();
        $menu = $menu_model->retrieve_mod();
        return view('Homepage/shop', $menu);
    }
    public function single_product($id)
    {
        $prod = new MenuModel();
        $stock = new ProductModel();
        $data['products'] = $prod->find($id);
        
        foreach($data as $prod) {

            $data['stocks'] = $stock->where('name', $prod['prod_name'])->first();
        }
       
         return view('Homepage/singleprods', $data);
    }
    public function userCart()
    {
    $id = $this->request->getPost('id');
      $new_model = new MenuModel();
      $prod = $new_model->find($id);
      $quantity =  $this->request->getPost('quantity');
      $discount = (((float)$prod['prices'] * (int)$prod['discount'])/100) * (int)$quantity;
      $price = (float)$prod['prices'] * (int)$quantity;

      $values = [
        'userid' => session()->get('id'),
        'menuid' => (int)$this->request->getVar('id'),
        'quantity' => $quantity,
        'total' => $price - $discount
      ];
      
      $cart_model = new CartModel();
      //var_dump($values);
      $cart = $cart_model->insert($values);
      
      return redirect('cart');
    }
}

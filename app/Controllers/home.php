<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\MenuModel;
use CodeIgniter\Validation\Validation;
use App\Models\ProductModel;
use CodeIgniter\Files\File;
use App\Models\ReservationModel;
use App\Models\ContactModel;

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
    public function save_contact()
    {
        $contactmodel = new ContactModel();
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');


        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' =>$subject,
            'message' => $message
        ];

        $result = $contactmodel->insert($data);
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
    public function save_reservation()
    {
        $bookmodel = new ReservationModel();
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $subject = $this->request->getPost('subject');
        $tables = $this->request->getPost('tables');
        $message = $this->request->getPost('message');
        $date = $this->request->getPost('date');
        

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' =>$subject,
            'tables' => $tables,
            'message' => $message,
            'date' => $date,
            
        ];
        $result = $bookmodel->insert($data);
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

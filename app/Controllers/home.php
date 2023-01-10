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
    $userid= session()->get('loggedUser');
      $new_model = new MenuModel();
      $new_cart = new CartModel();
      $prod = $new_model->find($id);
      $quantity =  $this->request->getPost('quantity');
      $discount = (((float)$prod['prices'] * (int)$prod['discount'])/100) * (int)$quantity;
      $price = (float)$prod['prices'] * (int)$quantity;

    $resultExist = $new_cart->where('userid', $userid)->where('menuid', $id)->find();
    $productInfo = $new_model->find($id);

      $values = [
        'userid' => $userid,
        'menuid' => (int)$id,
        'order_count' => $quantity,
        'total' => $price - $discount
      ];

      if(count($resultExist) == 0 && $productInfo['stocks'] != 0){
        $new_cart->insert($values);
      }
      elseif(count($resultExist) > 0 && $productInfo['stocks'] != 0){
        $new_cart->set('order_count', $resultExist[0]['order_count'] + $quantity)->set('total', $resultExist[0]['total'] + $price)->where('userid', $userid)->where('menuid', $id)->update();
      }
      else{
        echo 'out of stock';
      }
      
      //$cart_model = new CartModel();
      //var_dump($values);
      //$cart = $cart_model->insert($values);
      
      return redirect('cart');
    }
    public function delete_cart($id = null)
    {
        $cart = new CartModel();
        $cart->where('userid', session()->get('loggedUser'))->where('menuid', $id)->delete();
        return redirect()->route('cart');
    }
}

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
        $prod = new MenuModel();
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
            'subject' => $subject,
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
            'subject' => $subject,
            'tables' => $tables,
            'message' => $message,
            'date' => $date,

        ];
        $result = $bookmodel->insert($data);
        return view('Homepage/book');
    }
    public function cart()
    {
        $checkout = new \App\Models\CheckoutModel();
        
        $id = session()->get('id');
        $checkout->where('userid', $id)->delete();
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
        $id = session()->get('id');

        $cart_id = $this->request->getPost('id[]');
        // var_dump($cart_id);

        if (isset($cart_id)) {
            $checkout_model = new \App\Models\CheckoutModel();

            for ($i = 0; $i < count($cart_id); $i++) {
                $checkout_model->insert(array('menuid' => $cart_id[$i], 'userid' => $id));
            }


            $cart["cart"] = $checkout_model->select('*')
                ->join('menu', 'checkout.menuid = menu.id', 'right')
                ->join('cart', 'checkout.menuid = cart.menuid', 'right')
                ->where('checkout.userid', $id)->get()->getResultArray();
            
            $cart['total'] = $checkout_model->selectSum('total')
            ->join('cart', 'checkout.menuid = cart.menuid', 'right')
            ->where('checkout.userid', $id)->get()->getResultArray();

                // var_dump($cart['cart']);
            return view('Homepage/checkout', $cart);
        } else {
            return redirect()->route('cart');
        }


        // $items = $this->request->getPost('item[]');
        // $id = session()->get('id');
        // $cart_model = new CartModel();

        // $cart['cart'] = $cart_model->select('*')
        // ->join('menu', 'cart.menuid = menu.id', 'right')
        // ->where('cart.userid', $id)->get()->getResultArray();

        // $cart['total'] = $cart_model->selectSum('total')
        //     ->where('userid', $id)->get()->getResultArray();

        // return view('Homepage/checkout', $cart);
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

        $data['products'] = $prod->find($id);

        return view('Homepage/singleprods', $data);
    }
    public function userCart()
    {

        $id = $this->request->getPost('id');
        $userid = session()->get('loggedUser');
        $prod_model = new MenuModel();
        $prod = $prod_model->where('id', $id)->first();
        $new_cart = new CartModel();
        $quantity =  $this->request->getPost('quantity');
        $discount = (((float)$prod['prices'] * (int)$prod['discount']) / 100) * (int)$quantity;
        $price = (float)$prod['prices'] * (int)$quantity;
        $resultExist = $new_cart->where('userid', $userid)->where('menuid', $id)->find();


        $values = [
            'userid' => $userid,
            'menuid' => (int)$id,
            'order_count' => $quantity,
            'total' => $price - $discount
        ];

        if (count($resultExist) == 0 && $prod['stocks'] != 0) {
            $new_cart->insert($values);
        } elseif (count($resultExist) > 0 && $prod['stocks'] != 0) {
            $new_cart->set('order_count', $resultExist[0]['order_count'] + $quantity)->set('total', $resultExist[0]['total'] + $price)->where('userid', $userid)->where('menuid', $id)->update();
        } else {
            echo 'out of stock';
        }

        return redirect('cart');
    }
    public function delete_cart($id = null)
    {
        $cart = new CartModel();
        $cart->where('userid', session()->get('loggedUser'))->where('menuid', $id)->delete();
        return redirect()->route('cart');
    }
}

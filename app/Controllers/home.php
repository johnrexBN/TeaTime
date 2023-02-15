<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\MenuModel;
use CodeIgniter\Validation\Validation;
use CodeIgniter\Files\File;
use App\Models\ReservationModel;
use App\Models\ContactModel;
use App\Controller\BaseBuilder;
use CodeIgniter\HTTP\RequestInterface;

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
        session()->setFlashdata('contactus', 'contact');
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
            'status' => 'Pending',

        ];
        $result = $bookmodel->insert($data);
        session()->setFlashdata('reservation', 'book');
        return view('Homepage/book');
    }
    public function cart()
    {
        $checkout = new \App\Models\CheckoutModel();

        $id = session()->get('id');
        $checkout->where('userid', $id)->delete();
        $cart_model = new CartModel();
        $placeOrder = new  \App\Models\PlaceOrderModel();



        $order['info'] = $placeOrder->select('cartid')->where('userid', session()->get('loggedUser'))->get()->getResultArray();
        $orderData = [];
        for ($i = 0; $i < count($order['info']); $i++) {
            array_push($orderData, $order['info'][$i]['cartid']);
        }
        //    var_dump($orderData);
        if(!$orderData) {
            $orderData = ['0', '0'];
        }
        // var_dump($orderData);
        $cart['cart'] = $cart_model->select('*')
            ->join('menu', 'cart.menuid = menu.id', 'right')
            ->where('cart.userid', $id)->whereNotIn('cart.id', $orderData)->get()->getResultArray();

        $cart['total'] = $cart_model->selectSum('total')
            ->where('userid', $id)->whereNotIn('cart.id', $orderData)->get()->getResultArray();

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
        $data['related'] = $prod->findAll($id);

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
        
        $placeOrder = new  \App\Models\PlaceOrderModel();

        $order['info'] = $placeOrder->select('cartid')->where('userid', session()->get('loggedUser'))->get()->getResultArray();
       
        $orderData = [];
        $resultExist = [];
        
        for ($i = 0; $i < count($order['info']); $i++) {
            array_push($orderData, $order['info'][$i]['cartid']);
        }
        if($orderData) {
            $resultExist = $new_cart->where('userid', $userid)->where('menuid', $id)->whereNotIn('id', $orderData)->get()->getResultArray();
        }
        
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

    public function place_order()
    {
        $order_model = new \App\Models\PlaceOrderModel();
        $cart_model = new CartModel();
        $menuid = $this->request->getPost('menuid[]');
        $total = $this->request->getPost('total[]');
        $cartid = $this->request->getPost('cartid');
        $name = $this->request->getPost('name');
        $reference = $this->request->getPost('reference');
        $proof = $this->request->getFile('proof');
        // var_dump($menuid);
        if (!$proof->hasMoved()) {
            $proof->move(FCPATH . 'uploads');
        
         for ($i = 0; $i < count($menuid); $i++) {
             $data = [
                 'cartid' => $cartid,
                 'menuid' => $menuid[$i],
                 'userid' => session()->get('loggedUser'),
                 'total' => $total[$i],
                 'name' => $name,
                 'reference' => $reference,
                 'proof' => $proof->getClientName()
                    
                
         ];

         var_dump($cartid);
         if ($order_model->insert($data) == 0) {
        //     $cart_model->where('menuid',  $menuid[$i])->where('userid', session()->get('loggedUser'))->delete();

         }
    }
    return redirect()->route('order_status')->with('history', 'history');
    }
}
    public function search()
    {
        $query = $this->request->getVar('search');
        $search = new MenuModel();
        $searching = array('name' => $query, 'category' => $query, '');
        $result['products'] = $search->like('name', $query)->orLike('category', $query)->orLike('description', $query)->get()->getResultArray();
        return view('Homepage/shop', $result);
    }
    public function qrcode(){
      
    }
}

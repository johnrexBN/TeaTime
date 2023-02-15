<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\MenuModel;
use App\Models\ContactModel;
use App\Models\PlaceOrderModel;
use App\Models\ReservationModel;
use App\Models\CartModel;
class admin extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $menu_model = new MenuModel();
        $contact_model = new ContactModel();
        $book_model = new ReservationModel();
        $order_model = new PlaceOrderModel();
        $info = new UsersModel();
        $db = \Config\Database::connect();
        $query = $db->query('SELECT SUM(total) as total_sales FROM orders');
        $result = $query->getRow();
        
        $data = [
            'users'  => $info->selectCount('id', 'totaluser')->first(),
            'pending_order' => $order_model->where('state', 'pending')->get()->getNumRows(),
            'cancelled_order' => $order_model->where('state', 'Cancelled')->get()->getNumRows(),
            'approved_order' => $order_model->where('state', 'Approved')->get()->getNumRows(),
            'accept_book' => $book_model->where('status', 'accepted')->get()->getNumRows(),
            'pending_book' => $book_model->where('status', 'pending')->get()->getNumRows(),
            'contact_us' => $contact_model->selectCount('id', 'totaluser')->first(),
            'menu' => $menu_model->selectCount('id', 'totalmenu')->first(),
            'total_sales' => $result->total_sales,
            'foods' => $menu_model->where('category', 'Foods')->get()->getNumRows(),
            'milktea' => $menu_model->where('category', 'Milktea')->get()->getNumRows(),
            'adds' => $menu_model->where('category', 'Adds')->get()->getNumRows(),
        ];

        return view('admin/index', $data);
    }

    public function menu()
    {
        

        $prod = new MenuModel();
        $data = [
            'menu' => $prod->findAll()
        ];

        return view('admin/menu', $data);
    }
    public function addproducts()
    {
        return view('admin/addproducts');
    }
    public function addmenu()
    {
        return view('admin/addmenu');
    }


    public function updatemenu($id)
    {
        $prod = new MenuModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'prices' => $this->request->getPost('prices'),
            'stocks' => $this->request->getPost('stocks'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'discount' => $this->request->getPost('discount'),
        ];
        $prod->update($id, $data);
        $session = session();
        $session->setFlashdata('update_menu', 'update_menu');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function editmenu($id)
    {
        $menu = new MenuModel();
        $data['menu'] = $menu->find($id);
        return view('admin/editmenu', $data);
    }


    public function savemenu()
    {

        $validation = $this->validate([
            'menu' => [
                'label' => 'Image File',
                'rules' => 'uploaded[menu]'
                    . '|is_image[menu]'
                    . '|mime_in[menu,image/jpg,image/jpeg,image/gif,image/png,image/webp]'

            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Menu name is required.'
                ]
            ],

            'price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Menu price is required.',
                    'numeric' => 'needs  to be numeric.'
                ]
            ],

            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Product category is required.'
                ]
            ],

            'discount' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Menu category is required.',
                    'numeric' => 'needs  to be numeric.'
                ]
            ],

        ]);
        if (!$validation) {
            $msg = ['validation' => $this->validator];
            return view('admin/addmenu', $msg);
        } else {

            $name = $this->request->getVar('name');
            $price = $this->request->getVar('price');
            $category = $this->request->getVar('category');
            $discount = $this->request->getVar('discount');
            $img = $this->request->getFile('menu');
            $stocks = $this->request->getPost('stocks');
            $description = $this->request->getPost('description');

            if (!$img->hasMoved()) {
                $img->move(FCPATH . 'uploads');

                $prod = new MenuModel();
                $data = [
                    'name' => $name,
                    'prices' => $price,
                    'category' => $category,
                    'discount' => $discount,
                    'image' => $img->getClientName(),
                    'stocks' => $stocks,
                    'description' => $description


                ];
                $session = session();

                if ($prod->insert($data)) {
                    $session->setFlashdata('add_menu', 'add_menu');
                    return redirect()->to($_SERVER['HTTP_REFERER']);
                } else {
                    return redirect('menu');
                }
            }
        }
    }
    // public function calendar()
    // {
    //     return view('admin/calendar');
    // }
    public function inbox()
    {
        $inbox = new ReservationModel();
        $data = [
            'book' => $inbox->findAll()
        ];
        return view('admin/inbox', $data);
    }
    public function contactus()
    {
        $inbox = new ContactModel();
        $data = [
            'feeds' => $inbox->findAll()
        ];
        return view('admin/contact', $data);
    }
    public function orders()
    {

        $contact_model = new ContactModel();
        $book_model = new ReservationModel();
        $order_model = new PlaceOrderModel();
        
        $item = [
            'pending_order' => $order_model->where('state', 'pending')->get()->getNumRows(),
            'pending_book' => $book_model->where('status', 'pending')->get()->getNumRows(),
            'contact_us' => $contact_model->selectCount('id', 'totaluser')->first(),
            
        ];

        $order_model = new PlaceOrderModel();
        $data = [
            'placeorder' => $order_model->select('*, menu.name as menuname')
                ->join('menu', 'menu.id = orders.menuid', 'inner')
                ->join('user', 'user.id = orders.userid', 'inner')
                ->join('cart', 'cart.id = orders.cartid', 'inner')
                ->where('user.usertype', 'user')
                ->where('orders.state', 'pending')
                ->get()->getResultArray()
        ];
        // var_dump($data);
        return view('admin/orders', $data,$item);
    }
    public function accept($id, $userid, $cartid)
    {
        // $email = \Config\Services::email();
        $place_order = new PlaceOrderModel();
        $cart_model = new CartModel();
        $place_order->set('state', 'approved')->where('userid', $userid)
            ->where('menuid', $id)->update();
        $order_info = $cart_model->where('id', $cartid)->first();
        $menu_model = new MenuModel();
        $stocks = $menu_model->where('id', $id)->first();
        $res = $menu_model->set('stocks', $stocks['stocks'] - $order_info['order_count'])->where('id', $id)->update();
        if($stocks['stocks'] == 1){
            $menu_model->update($id, ['status' => 'out of stock']);
        }
        // $order_email = new PlaceOrderModel();
        // $new_email = [
        //     'user_email' => $order_email->select('*, user.email as emailcon')->first()
        //     ->join('user', 'user.id=orders.userid', 'inner')
        //     ->where('user.id', $userid)
        //     ->get()->getResultArray()
        // ];
      
        
                    // if (isset($new_email['emailcon'])) {
                    //  $html = <<<HTML
                    //      <div class="card-body">
                    //          <div class="mb-4">      
                    //              <p style="text-align: center;"><strong>Order Approved!</strong></p>
                    //              <p class="mb-2" style="text-align: center;">Your Order is approved by the admin!</p>
                    //          </div>
                    //      </div>
                    //  HTML;
         
                    //  $email->setFrom('johnrexmalik12@gmail.com', 'Tea Time Shop');
         
                    //  $email->setTo($new_email['emailcon']);
         
                    //  $email->setSubject('Order Approval');
                    //  $email->setMessage("{$html}");
                    // $email->send();
                      
                //  }
                 return   redirect()->route('orders'); 
        
    }
    public function decline_order($id,$userid,$cartid){
        $place_order = new PlaceOrderModel();
        $place_order->set('state', 'declined')->where('userid', $userid)->where('cartid', $cartid)
            ->where('menuid', $id)->update();
            return   redirect()->route('orders'); 
    }
    public function pick_up($id,$userid,$cartid){
        $place_order = new PlaceOrderModel();
        $place_order->set('state', 'Order Ready')->where('userid', $userid)->where('cartid', $cartid)
            ->where('menuid', $id)->update();
            return   redirect()->route('orders'); 
    }
    public function accept_book($id)
    {
        $email = \Config\Services::email();

        $reservation = new ReservationModel();
        $reservation->set('status', 'accepted')->where('id', $id)->update();
        $postEmail = $reservation->where('id', $id)->first();
        
            if (isset($postEmail)) {
                $html = <<<HTML
                    <div class="card-body">
                        <div class="mb-4">      
                            <p style="text-align: center;"><strong>Order Approved!</strong></p>
                            <p class="mb-2" style="text-align: center;">Your Order is approved by the admin!</p>
                        </div>
                    </div>
                HTML;
    
                $email->setFrom('johnrexmalik12@gmail.com', 'Tea Time Shop');
    
                $email->setTo($postEmail['email']);
    
                $email->setSubject('Booking Approval');
                $email->setMessage("{$html}");
                $email->send();
                return redirect()->route('inbox');     
            }
        

    }
    public function decline_book($id)
    {
        $email = \Config\Services::email();
        $reservation = new ReservationModel();
        $reservation->set('status', 'declined')->where('id', $id)->update();

        $postEmail = $reservation->where('id', $id)->first();
        
            if (isset($postEmail)) {
                $html = <<<HTML
                    <div class="card-body">
                        <div class="mb-4">      
                            <p style="text-align: center;"><strong>Order Dispproved!</strong></p>
                            <p class="mb-2" style="text-align: center;">Your Order is disapproved by the admin!</p>
                        </div>
                    </div>
                HTML;
    
                $email->setFrom('johnrexmalik12@gmail.com', 'Tea Time Shop');
    
                $email->setTo($postEmail['email']);
    
                $email->setSubject('Order Approval');
                $email->setMessage("{$html}");
                $email->send();
                return redirect()->route('inbox');     
            }
    }
    public function contact_accept($id)
    {
        $email = \Config\Services::email();

        $contact = new ContactModel();
        $contact->set('status', 'accepted')->where('id', $id)->update();
        $postEmail = $contact->where('id', $id)->first();
        
            if (isset($postEmail)) {
                $html = <<<HTML
                    <div class="card-body">
                        <div class="mb-4">      
                            <p style="text-align: center;"><strong>Thank You!</strong></p>
                            <p class="mb-2" style="text-align: center;">Your suggestions has been noted!</p>
                        </div>
                    </div>
                HTML;
    
                $email->setFrom('johnrexmalik12@gmail.com', 'Tea Time Shop');
    
                $email->setTo($postEmail['email']);
    
                $email->setSubject('Customer Service');
                $email->setMessage("{$html}");
                $email->send();
                return redirect()->route('contactus');     
            }
    }

    public function transactions(){
        $order_model = new PlaceOrderModel();
        $data = [
            'placeorder' => $order_model->select('*, menu.name as menuname')
                ->join('menu', 'menu.id = orders.menuid', 'inner')
                ->join('user', 'user.id = orders.userid', 'inner')
                ->join('cart', 'cart.id = orders.cartid', 'inner')
                ->where('user.usertype', 'user')
                ->where('orders.state', 'approved')
                ->orWhere('orders.state', 'declined')
                ->orWhere('orders.state', 'cancelled')
                ->orWhere('orders.state', 'Order Ready')
                ->get()->getResultArray()
        ];
        return view('Admin/history',$data);
    }
}

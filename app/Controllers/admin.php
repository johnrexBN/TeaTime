<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\MenuModel;
use App\Models\ContactModel;
use App\Models\PlaceOrderModel;
use App\Models\ReservationModel;

class admin extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $info = new UsersModel();
        $data['users'] = $info->selectCount('id', 'totaluser')->first();

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
            'prod_name' => $this->request->getPost('prod_name'),
            'price' => $this->request->getPost('price'),
            'category' => $this->request->getPost('category'),
            'discount' => $this->request->getPost('discount'),
        ];
        $prod->update($id, $data);
        $session = session();
        $session->setFlashdata('msg', 'Updated Successfully!');
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
                    'status' => "Available",
                    'stocks' => $stocks,
                    'description' => $description


                ];
                $session = session();

                if ($prod->insert($data)) {
                    $session->setFlashdata('msg', 'Successfully Addedd!');
                    return redirect()->to($_SERVER['HTTP_REFERER']);
                } else {
                    return redirect('menu');
                }
            }
        }
    }
    public function calendar()
    {
        return view('admin/calendar');
    }
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

        $order_model = new PlaceOrderModel();
        $data = [
            'placeorder' => $order_model->select('*')
                ->join('menu', 'menu.id = orders.menuid', 'right')
                ->join('user', 'user.id = orders.userid', 'right')
                ->where('user.usertype', 'user')
                ->get()->getResultArray()
        ];
        // var_dump($data);
        return view('admin/orders', $data);
    }
    public function accept($id, $userid)
    {
        $email = \Config\Services::email();
        $place_order = new PlaceOrderModel();
        $place_order->set('state', 'approved')->where('userid', $userid)
            ->where('menuid', $id)->update();
        $postEmail = $place_order->where('userid', $userid)->where('menuid', $id)->first();
        
            
                //     if (isset($postEmail)) {
                //      $html = <<<HTML
                //          <div class="card-body">
                //              <div class="mb-4">      
                //                  <p style="text-align: center;"><strong>Order Approved!</strong></p>
                //                  <p class="mb-2" style="text-align: center;">Your Order is approved by the admin!</p>
                //              </div>
                //          </div>
                //      HTML;
         
                //      $email->setFrom('johnrexmalik12@gmail.com', 'Tea Time Shop');
         
                //      $email->setTo($postEmail['email']);
         
                //      $email->setSubject('Order Approval');
                //      $email->setMessage("{$html}");
                //     $email->send();
                //      return redirect()->route('orders');     
                //  }
        
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
    
                $email->setSubject('Order Approval');
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
}

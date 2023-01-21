<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\MenuModel;

class admin extends BaseController
{

    protected $helpers = ['form'];

    public function index()
    {
        return view('admin/index');
    }
    public function products()
    {
        $prod = new ProductModel();
        $data = [
            'products' => $prod->findAll()
        ];

        return view('admin/products', $data);
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
        $prod_model = new ProductModel();
        $prod_name = [
           'prod_name' => $prod_model->findAll()
        ];
        return view('admin/addmenu', $prod_name);
    }
    public function saveproduct()
    {

        $validation = $this->validate([
            
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Product name is required.'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Product description is required.'
                ]
            ],
            'price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Product price is required.',
                    'numeric' => 'needs  to be numeric.'
                ]
            ],
            'quantity' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Product quantity is required.',
                    'numeric' => 'needs  to be numeric.'
                ]
            ],
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Product category is required.'
                ]
            ],


        ]);
        if (!$validation) {
            $msg = ['validation' => $this->validator];
            return view('admin/addproducts', $msg);
        } else {

            $name = $this->request->getVar('name');
            $description = $this->request->getVar('description');
            $quantity = $this->request->getVar('quantity');
            $price = $this->request->getVar('price');
            $category = $this->request->getVar('category');

                $prod = new ProductModel();
                $data = [
                    'name' => $name,
                    'description' => $description,
                    'quantity' => $quantity,
                    'price' => $price,
                    'category' => $category,
                   
                ];
                $session = session();

                if ($prod->insert($data)) {
                    $session->setFlashdata('msg', 'Successfully Addedd!');
                    return redirect()->to($_SERVER['HTTP_REFERER']);
                } else {
                    return redirect()->to($_SERVER['HTTP_REFERER'])->with('msg', 'Failed to save!');
                }
            
        }
    }


    public function edit($id)
    {
        $prod = new ProductModel();
        $data['products'] = $prod->find($id);
        return view('admin/edit', $data);
    }
    public function update($id)
    {
        $prod = new ProductModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
            'category' => $this->request->getPost('category')
        ];
        $prod->update($id, $data);
        $session = session();
        $session->setFlashdata('msg', 'Updated Successfully!');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
    public function delete($id = null)
    {
        $prod = new ProductModel();
        $prod->delete($id);
        return redirect()->to($_SERVER['HTTP_REFERER']);
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
            $prod_model = new ProductModel();
            $stocks = $prod_model->stockCount($name);
            $status = '';
            $prod_id = '';
            foreach ($stocks as $count) {
                if ($count['quantity'] == 0)
                    $status = 'out of stock';
                else
                    $status = 'Available';

                $prod_id = $count['id'];
            }

            if (!$img->hasMoved()) {
                $img->move(FCPATH . 'uploads');

                $prod = new MenuModel();
                $data = [
                    'name' => $name,
                    'prod_name'=> $this->request->getVar('prod_name'),
                    'prices' => $price,
                    'category' => $category,
                    'discount' => $discount,
                    'image' => $img->getClientName(),
                    'prod_id' => $prod_id,
                    'status' => $status

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
        return view('admin/inbox');
    }

}

<?php

namespace App\Controllers;

use App\Models\PlaceOrderModel;
use App\Models\UsersModel;



class User extends BaseController{

    public function profile(){
        $user_model = new UsersModel();
        $data['profile'] = $user_model->where('id', session()->get('loggedUser'))->first();
        // var_dump($data['profile']);
        return view('User/profile', $data);
    }

    public function update_profile($id)
    {
        $user = new UsersModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'address' => $this->request->getPost('address'),
            'phone_number' => $this->request->getPost('phone_number'),
        ];
        $user->update($id, $data);
        $session = session();
        $session->setFlashdata('profile', 'Updated Successfully!');
    
        return redirect()->route('profile');
    }

    public function editprofile(){
        return view('User/editprofile');
    }

    public function show(){
        return view('User/show');
    }
    public function order_status(){

        return view('User/order_status');
    }
    public function order_history(){
        $placeorder = new PlaceOrderModel();
        $data = [
            'placeorder' => $placeorder->select('*')
            ->join('menu', 'menu.id = orders.menuid', 'right')
            ->where('orders.userid', session()->get('loggedUser'))
            ->get()->getResultArray()
        ];
        
        return view('User/order_history', $data);
    }
}
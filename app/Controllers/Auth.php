<?php

namespace App\Controllers;

use CodeIgniter\Validation\Validation;
use App\Libraries\Hash;
use App\Models\ProductModel;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function login()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }
    public function save()
    {

        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Full name is required.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email is required!',
                    'valid_email' => 'Enter a valid email.',
                    'is_unique' => 'Email is already taken.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[15]',
                'errors' => [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have atleast 8 characters in length.',
                    'max_length' => 'Passwords must not have characters more than 15 in lenth.'
                ]
            ],
            'cpassword' => [
                'rules' => 'required|min_length[8]|max_length[15]|matches[password]',
                'errors' => [
                    'required' => 'Confirm Password is required!',
                    'min_length' => 'Confirm Password must have atleast 8 characters in length.',
                    'max_length' => 'Confirm Password must not have characters more than 15 in lenth.',
                    'matches' => 'Password do not match.'
                ]
            ]
        ]);

        if (!$validation) {
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'usertype' => 'user',

            ];
            $usersmodel = new \App\Models\UsersModel();
            $query = $usersmodel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong.');
            } else {
                return redirect()->to('login')->with('success', 'Register Successfully!');
            }
        }
    }

    public function check()
    {
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[user.email]',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'Enter valid email adress',
                    'is_not_unique' => 'This email is not registered in our service.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[15]',
                'errors' => [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have atleast 8 characters in length.',
                    'max_length' => 'Passwords must not have characters more than 15 in lenth.'
                ]
            ]
        ]);

        if (!$validation) {
            return view('auth/login', ['validation' => $this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $usersModel = new \App\Models\UsersModel();
            $user_info = $usersModel->where('email', $email)->first();
            $check_password = Hash::Check($password, $user_info['password']);

            if (!$check_password) {
                return redirect()->to($_SERVER['HTTP_REFERER'])->with('fail', 'Incorrect Password!');
            } else {
                $userid = $user_info['id'];
                $data = [
                    'id' => $user_info['id'],
                    'name' => $user_info['name'],
                    'password' => $user_info['password'],
                    'email' => $user_info['email'],
                    'usertype' => $user_info['usertype'],

                ];
                session()->set('loggedUser', $userid);
                session()->set($data);
                if ($user_info['usertype'] == 'user') {
                    $prod = new ProductModel();
                    $data = $prod->retrieve_mod();

                    return view('Homepage/homepage', $data);
                } else {
                    return redirect('index');
                }
            }
        }
    }
    public function dashboard()
    {
        return view('auth/dashboard');
    }
    public function fpass()
    {

        $email = \Config\Services::email();
        $postEmail = $this->request->getPost('email');
        if (isset($postEmail)) {
            $otp = rand(999999, 111111);
            $html = <<<HTML
                <div class="card-body">
                    <div class="mb-4">      
                        <h2 style="text-align: center; color: #9d7651;"><strong>OTP Verification Number</strong></h2>
                        <br>
                        <p class="mb-2" style="text-align: center;">The  OTP for your TEATime account password reset is</p>
                        <p style="text-align: center;"><strong>{$otp}</strong></p>
                        <p class="mb-2" style="text-align: center;"><strong>REMINDER:</strong>Do not share your One Time Password for everyone.</p>
                    </div>
                </div>
            HTML;

            $validation = $this->validate(
                [
                    'email' => [
                        'rules' => 'required|valid_email|is_not_unique[user.email]',
                        'errors' => [
                            'required' => 'Email is required.',
                            'valid_email' => 'Enter valid email adress',
                            'is_not_unique' => 'This email is not registered in our service.'
                        ]
                    ]
                ]
            );
            if (!$validation) {
                return view('auth/fpass', ['validation' => $this->validator]);
            } else {
                
                $email->setFrom('johnrexmalik12@gmail.com', 'Tea Time Shop');
              
                $email->setTo($postEmail);
               
                $email->setSubject('Otp Verification');
                $email->setMessage("{$html}");
               
    
                if ($email->send()) {
                   
                    $data = [
                        'email' => $postEmail,
                        'otp' => $otp,
                    ];
                    session()->set($data);
                    return redirect()->route('otp');
                }
            }
           
        } else {
            return view('auth/fpass');
        }
    }
    public function otp()
    {   
           
        $otp = $this->request->getPost('otp[]');  
        if(!isset($otp)){
            return view('auth/otp');
        }   
        $otp_new = join('', $otp);
        if($otp_new != session()->get('otp')){
            return redirect()->route('otp')->with('validation', 'You have entered an incorrect otp!');
        }
        else{
            return redirect()->route('reset');
        }
        
    }
    public function reset()
    {
        $confirm = $this->request->getPost('confirm_password');
        $password = $this->request->getPost('new_password');
        if(isset($confirm) && isset($password)){
            $validation = $this->validate([
                'new_password' => [
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'Password is required!',
                        'min_length' => 'Password must have atleast 8 characters in length.'
                    ]
                ],
                'confirm_password' => [
                    'rules' => 'required|min_length[8]|matches[new_password]',
                    'errors' => [
                        'required' => 'Password is required!',
                        'min_length' => 'Password must have atleast 8 characters in length.',
                        'matches' => 'Password do not match.'
                    ]
                ]
            ]);
            if(!$validation){
                return view('auth/reset', ['validation' => $this->validator]);
            }
            else{
                $userModel = new \App\Models\UsersModel();
                $data = [
                    'password' => Hash::make($password)
                ];

                if($userModel->set('password', Hash::make($password))->where('email', session()->get('email'))->update()){
                    return redirect()->route('login')->with('msg', 'password updated succesfuly');
                }
            }
        }
        else{
            return view('auth/reset');
        }
        
    }
    public function logout()
    {
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
        }
        return redirect()->to('login');
    }
}

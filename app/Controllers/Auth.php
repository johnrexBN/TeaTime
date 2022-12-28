<?php
namespace App\Controllers;
use CodeIgniter\Validation\Validation;
use App\Libraries\Hash;
use App\Models\ProductModel;
class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url','form']);
    }
    public function login()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }
    public function save(){

        $validation = $this -> validate([
            'name' =>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Full name is required.'
                ]
                ],
                'email'=>[
                    'rules'=>'required|valid_email|is_unique[user.email]',
                    'errors'=>[
                        'required'=> 'Email is required!',
                        'valid_email'=>'Enter a valid email.',
                        'is_unique'=>'Email is already taken.'
                    ]
                ],
                'password' =>[
                    'rules'=>'required|min_length[8]|max_length[15]',
                    'errors'=>[
                    'required'=>'Password is required!',
                    'min_length'=> 'Password must have atleast 8 characters in length.',
                    'max_length'=> 'Passwords must not have characters more than 15 in lenth.'
                    ]
                ],
                'cpassword'=>[
                    'rules'=>'required|min_length[8]|max_length[15]|matches[password]',
                    'errors'=>[
                        'required'=>'Confirm Password is required!',
                        'min_length'=> 'Confirm Password must have atleast 8 characters in length.',
                        'max_length'=> 'Confirm Password must not have characters more than 15 in lenth.',
                        'matches'=>'Password do not match.'
                    ]
                ]
        ]);

        if(!$validation){
            return view('auth/register',['validation'=>$this->validator]);
        }
        else{
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password),
                'usertype'=> 'user',
                'token' => $this->token(100)
            ];
            $usersmodel = new \App\Models\UsersModel();
            $query =$usersmodel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail', 'Something went wrong.');
            }
            else{
                return redirect()->to('login')->with('success', 'Register Successfully!');
            }
        }
    }

    public function check(){
        $validation = $this->validate([
            'email'=>[
                'rules'=>'required|valid_email|is_not_unique[user.email]',
                'errors'=>[
                    'required'=>'Email is required.',
                    'valid_email'=>'Enter valid email adress',
                    'is_not_unique'=>'This email is not registered in our service.'
                ]
                ],
                'password'=>[
                    'rules'=>'required|min_length[8]|max_length[15]',
                    'errors'=>[
                        'required'=>'Password is required!',
                        'min_length'=> 'Password must have atleast 8 characters in length.',
                        'max_length'=> 'Passwords must not have characters more than 15 in lenth.'
                    ]
                ]
        ]);

        if(!$validation){
            return view('auth/login',['validation'=>$this->validator]);
        }
        else{
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $usersModel = new \App\Models\UsersModel();
            $user_info = $usersModel->where('email', $email)->first();
            $check_password = Hash::Check($password, $user_info['password']);

            if(!$check_password){
                session()->setFlashdata('fail','Incorrect password!');
                return redirect()->to($_SERVER['HTTP_REFERER']);
            }
            else{
                $userid = $user_info['id'];
                $data = [
                    'id' => $user_info['id'],
                    'name' => $user_info['name'],
                    'password' => $user_info['password'],
                    'email' => $user_info['email'],
                    'usertype' => $user_info['usertype'],
                    'token' => $user_info['token']
                ];
                session()->set('loggedUser',$userid);
                session()->set($data);
                if($user_info['usertype'] == 'user'){
                    $prod = new ProductModel();
                    $data = $prod->retrieve_mod();

                    return view('Homepage/homepage', $data);
                }
                else{
                    return redirect('index');
                }      
            }
        }
        
    }
    public function dashboard(){
        return view('auth/dashboard');
    }
    public function token($lenght)
    {
       $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
       return substr(str_shuffle($str_result),0,$lenght);
    }
}
?>
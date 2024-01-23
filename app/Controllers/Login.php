<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        helper('form');

        return view('Auth/login');
    }

    public function auth()
    {

        if(! $this->validate([
            'username' => 'required',
            'password' => 'required',
        ])) {
            return redirect()->to('login');
        }

        $validUser = $this->validator->getValidated();

        //  dd($validUser);

        $user = model(UserModel::class)->where('username', $validUser['username'])->first();

    //    dd($user->username);

        if($user) {
            if(password_verify($validUser['password'], $user->password)) {
                //initialize sessions
                session()->set('user_id', $user->id);
                session()->set('username', $user->username);
                session()->set('name', $user->name);
                session()->set('department', $user->department);
                return redirect()->to('/');
                
            } {
                session()->setFlashdata("login_error", "Incorrect username or password");
                return redirect()->to('login');
            }
        } else {
            return redirect()->to("login")->with("login_error","Incorrect Username or Password");
        }
        
    }
}

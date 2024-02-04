<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        //
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}

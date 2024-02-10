<?php

namespace App\Controllers;



use App\Controllers\BaseController;

use CodeIgniter\HTTP\ResponseInterface;

class PrintController extends BaseController
{
    public function medicine()
    {
     
       
       
      return view('report/all_medicine');      
        
    }

}






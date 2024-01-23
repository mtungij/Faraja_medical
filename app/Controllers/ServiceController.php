<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServiceModel;
use CodeIgniter\HTTP\ResponseInterface;

class ServiceController extends BaseController
{
    public function index()
    {
        return view("setting/services");
    }

    public function store()
    { if( ! $this->validate([
        'name' => 'required',
        'price' => 'required',
        

    ])){
                   
        return redirect()->back()->withInput()->with('erros','please fill all field');     
}

 $validatedData = $this->validator->getValidated();

//  dd($validatedData); 

// $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
// $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);

 model(ServiceModel::class)->insert($validatedData );

   
   return redirect()->back()->with('success','data added successfully');
    }
}

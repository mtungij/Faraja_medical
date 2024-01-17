<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PaymentModel;

class Payment extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $setting =model(PaymentModel::class);
        $data = [
            'payment' =>  $setting->paginate(5),
            'pager' =>  $setting->pager,
        ];
       
        // dd($data);
        return view("setting/payment",$data);
    }


    public function store()
    {

        if( ! $this->validate([
            'name' => 'required',
            'number' => 'required',
        
    
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
    //  dd($validatedData); 
    
    // $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    // $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);
    
    
    
     model(PaymentModel::class)->insert($validatedData );
    
       
       return redirect()->back()->with('success','data added successfully');
    }
    }


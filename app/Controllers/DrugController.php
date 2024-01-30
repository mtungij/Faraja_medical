<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DrugModel;
use CodeIgniter\HTTP\ResponseInterface;

class DrugController extends BaseController
{
    public function index()
    {
    $drug =model(DrugModel::class)->findAll();
    return view ('drug/index.php',['drug'=> $drug]);
    }

    public function create()
    {
        if( !$this->validate([
            'name' => 'required',
            'unit'=> 'required',
            'quantity' => 'required',
             'buy_price' => 'required',
             'sell_price' => 'required',
             'stock_limit' => 'required',
             'user_id' =>'required',
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
    //  dd($validatedData); 
    
    // $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    // $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);
    
    
    
     model(DrugModel::class)->insert($validatedData );
    
       
       return redirect()->back()->with('success','data added successfully');
        


    
    }
}



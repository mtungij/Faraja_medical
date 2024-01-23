<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransferModel;
use CodeIgniter\HTTP\ResponseInterface;

class TransferController extends BaseController
{
    public function transfer()
    {
        if( ! $this->validate([
            'from' => 'required',
            'to' => 'required',
            'patient_id'=> 'required'
        
    
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
    //  dd($validatedData); 
    
    // $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    // $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);
    
    
    
     model(TransferModel::class)->insert($validatedData );
    
       
       return redirect()->back()->with('good','Patient Transfered successfully');
    }
}

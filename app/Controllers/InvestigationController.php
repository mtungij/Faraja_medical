<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvestigationModel;
use CodeIgniter\HTTP\ResponseInterface;

class InvestigationController extends BaseController
{
    public function store()
    {

        if( !$this->validate([
            'category_id' => 'required',
            'patient_id'=> 'required',
            'user_id'=> 'required',
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
     dd($validatedData); 
    
    // $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    // $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);
    
    
    
     model(InvestigationModel::class)->insert($validatedData );
    
       
       return redirect()->back()->with('success','data added successfully');
        


    }
}

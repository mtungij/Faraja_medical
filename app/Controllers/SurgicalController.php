<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SurgicalModel;
use CodeIgniter\HTTP\ResponseInterface;

class SurgicalController extends BaseController
{
    public function index()
    {
        $test = model(SurgicalModel::class)->findAll();
        return view ("setting/surgical",['test' => $test]);
    }


    public function create()

    {
     
        if( !$this->validate([
            'name' => 'required',
            'price' => 'required',
        
    
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();

    //    dd($validatedData); 
    
    
     $labtestExist = model(SurgicalModel::class)->where('name',$validatedData['name'])->first();
    
     if(!$labtestExist){
    
   
    
    // $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    // $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);
    
    
    
     model(SurgicalModel::class)->insert($validatedData );
    
       
       return redirect()->back()->with('success','Investigation added successfully');
    }
    
    else{
        return redirect()->back()->withInput()->with('errors','Investigation Name Already Exist');
    
    }
}

}

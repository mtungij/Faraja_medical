<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HudumaModel;
use CodeIgniter\HTTP\ResponseInterface;

class HudumaController extends BaseController
{
    public function index()
    {

      

        { if( ! $this->validate([
            'service_id' => 'required',
            'user_id' => 'required',
            'patient_id	'=> 'required',
            
    
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
     dd($validatedData); 
    
    // $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    // $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);
    
    
model(HudumaModel::class)->insert($validatedData );


return redirect()->to("nextpage/".$validatedData["patient_id"])->with("good","data saved successfully");
       
    }
}

}


 
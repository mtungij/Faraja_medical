<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PastmedicalModel;
use App\Models\PatientModel;
use CodeIgniter\HTTP\ResponseInterface;

class PastmedicalController extends BaseController
{
    public function index($id)
    {
        $patient = model(PatientModel::class)->find( $id );
        return view("patient/past_medical", ["patient"=> $patient ] );
    }

    public function store()
      {

          
        if( !$this->validate([
            'desc' => 'required',
            'patient_id' => 'required',
            'user_id'=> 'required',
        
    
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
    //  dd($validatedData); 

    // $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    // $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);
    
    
    
     model(PastmedicalModel::class)->insert($validatedData );
    

       return redirect()->to("nextpage/".$validatedData["patient_id"])->with("good","data saved successfully");
        


      }    
}
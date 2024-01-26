<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\VitalModel;
use CodeIgniter\HTTP\ResponseInterface;

class VitalController extends BaseController
{
    public function insert()
    {
        
        if( !$this->validate([
            'blood_pressure' => 'required',
            'resp_rate' => 'required',
            'pulse_rate'=> 'required',
            'oxygen_saturation'=> 'required',
            'weight'=> 'required',
            'height'=> 'required',
            'patient_id'=> 'required',
            'user_id'=> 'required',
        
    
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
     dd($validatedData); 

    // $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    // $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);
    
    
    
     model(VitalModel::class)->insert($validatedData );
    

       return redirect()->to("nextpage/".$validatedData["patient_id"])->with("good","data saved successfully");
    }

    public function preview($id)
    {
        $patients=model(PatientModel::class);
        $patient=$patients->find($id);
        return view("patient/vital_sign",["patient"=>$patient]);
    }
}

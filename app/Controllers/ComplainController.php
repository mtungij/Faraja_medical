<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\ComplainModel;
use CodeIgniter\HTTP\ResponseInterface;

class ComplainController extends BaseController
{
    public function index($id)
    {
        $patient = model(PatientModel::class)->find( $id );
        $complains = model(ComplainModel::class)->builder()->select('*')->join('users', 'main_complaints.user_id = users.id')->where('main_complaints.patient_id',$id)->orderBy('main_complaints.created_at','desc')->get()->getResult();
        return view("patient/complain", ["patient"=> $patient, 'complains'=>$complains]);
    }

    public function store()
    {
        $rules = [
            'desc' => 'required',
            'patient_id' => 'required',
            'user_id'=> 'required',
        ];  

        if( !$this->validate($rules)){
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
    //  dd($validatedData); 

    // $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    // $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);
    
    
    
     model(ComplainModel::class)->insert($validatedData );
    

       return redirect()->back()->with("success"," Chief Complain successfully recorded");
        
    }
}

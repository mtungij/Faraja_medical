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
        $pmhs = model(PastmedicalModel::class)->builder()
                       ->select("*")
                       ->join("users","users.id = past_medicals.user_id")
                       ->where("patient_id",$id)
                       ->get()
                       ->getResult();
                       
        return view("patient/past_medical", ["patient"=> $patient, 'pmhs' => $pmhs ] );
    }

    public function store()
      {
        if( !$this->validate([
            'desc' => 'required',
            'patient_id' => 'required',
            'user_id'=> 'required',
        ])){
                       
        return redirect()->back()->withInput()->with('errors','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
     model(PastmedicalModel::class)->insert($validatedData );

     return redirect()->back()->with("success","data saved successfully");

    }    
}

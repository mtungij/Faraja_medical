<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiagnosisModel;
use App\Models\PatientModel;
use CodeIgniter\HTTP\ResponseInterface;

class DiagnosisController extends BaseController
{
    public function index($id)
    {
        $patient = model(PatientModel::class)->find( $id );
        $diagnosises = model(DiagnosisModel::class)->builder()->select("*")
                            ->join('users', 'users.id = diagnoses.user_id')
                            ->where('patient_id', $id)
                            ->get()
                            ->getResult();

        return view("patient/diagnosis", ["patient"=> $patient, 'diagnosises' => $diagnosises ]);
    }

    public function store ()
    {
        if( !$this->validate([
            'desc' => 'required',
            'patient_id' => 'required',
            'user_id'=> 'required',
        ])){
        return redirect()->back()->withInput()->with('errors','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
     model(DiagnosisModel::class)->insert($validatedData );

    return redirect()->back()->with("success","data saved successfully");

    }
}

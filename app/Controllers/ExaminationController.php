<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ExaminationModel;
use App\Models\PatientModel;
use CodeIgniter\HTTP\ResponseInterface;

class ExaminationController extends BaseController
{
    public function index($id)
    {
        $patient = model(PatientModel::class)->find( $id );
        $examinations = model(ExaminationModel::class)->builder()
                         ->select('*')
                         ->join('users', 'users.id = examinations.user_id')
                         ->where('patient_id', $id)
                         ->get()
                         ->getResult();

        return view("patient/examination", ["patient"=> $patient , "examinations" => $examinations]);
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
    
     model(ExaminationModel::class)->insert($validatedData );

     return redirect()->back()->with("good","data saved successfully");

    }
}

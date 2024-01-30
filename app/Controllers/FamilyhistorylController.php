<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\FamilyModel;
use CodeIgniter\HTTP\ResponseInterface;

class FamilyhistorylController extends BaseController
{
    public function index($id)
    {
        $patient = model(PatientModel::class)->find( $id );
        $fshs = model(FamilyModel::class)->builder()
                         ->select('*')
                         ->join('users', 'users.id = family_histories.user_id')
                         ->where('patient_id', $id)
                         ->get()
                         ->getResult();

        return view("patient/family_history", ["patient"=> $patient , "fshs" => $fshs]);
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
    
     model(FamilyModel::class)->insert($validatedData );

     return redirect()->back()->with("success","data saved successfully");
    }
}

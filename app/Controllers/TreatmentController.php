<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\TreatmentModel;
use CodeIgniter\HTTP\ResponseInterface;

class TreatmentController extends BaseController
{
    public function index($id)
    {
        $treatments = model(TreatmentModel::class)->builder()
                                ->select("treatments.*, users.name")
                                ->join("users", 'users.id = treatments.user_id')
                                ->get()
                                ->getResult();
        $patient = model(PatientModel::class)->find($id);

        return view('patient/treatment', [
            'treatments' => $treatments,
            'patient' => $patient,
        ]);
    }

    public function store()
    {
        $desc = $this->request->getPost('desc');

        if( !$this->validate([
            'patient_id'=> 'required',
            'user_id'=> 'required',
            'desc'=> 'required',
        ])){
                       
           return redirect()->back()->withInput()->with('errors','please fill all field');     
        }
        
            $validatedData = $this->validator->getValidated();
            
            model(TreatmentModel::class)->insert([
                ...$validatedData, 
                'desc' => $desc, 
            ]);
            
            return redirect()->back()->with('success','data added successfully');
    }
}

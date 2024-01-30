<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvestigationModel;
use App\Models\LabtestModel;
use App\Models\PatientModel;
use CodeIgniter\HTTP\ResponseInterface;

class InvestigationController extends BaseController
{
    public function index($id)
    {
        $categories = model(LabtestModel::class)->findAll();
        $patient = model(PatientModel::class)->find($id);
        $investigations = model(InvestigationModel::class)->builder()
                                ->select("*")
                                ->join("users", 'users.id = investigatigations.user_id')
                                ->where('patient_id', $id)
                                ->get()
                                ->getResult();

        return view('patient/investigation', ['patient' => $patient, 'investigations' => $investigations, 'categories' => $categories]);
    }
    public function store()
    {

        if( !$this->validate([
            'category_id' => 'required',
            'patient_id'=> 'required',
            'user_id'=> 'required',
        ])){
                       
           return redirect()->back()->withInput()->with('erros','please fill all field');     
        }
        
            $validatedData = $this->validator->getValidated();
            
            model(InvestigationModel::class)->insert($validatedData );
            
            return redirect()->back()->with('success','data added successfully');

        }
}

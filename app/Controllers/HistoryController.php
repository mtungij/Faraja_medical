<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoryModel;
use App\Models\PatientModel;
use CodeIgniter\HTTP\ResponseInterface;

class HistoryController extends BaseController
{
    public function index($id)
    {
        
        $patient = model(PatientModel::class)->find( $id );
        $hpis = model(HistoryModel::class)->builder()->select("*")
                                           ->join('users', 'patient_histories.user_id = users.id')
                                           ->where('patient_id', $id)->orderBy('patient_histories.created_at', 'DESC')
                                           ->get()->getResult();

        dd($hpis);

        return view("patient/history_presenting", ["patient"=> $patient, "hpis"=> $hpis]);
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
    
     model(HistoryModel::class)->insert($validatedData );

     return redirect()->back()->with("success","data saved successfully");
    }
}

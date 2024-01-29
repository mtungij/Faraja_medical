<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\VitalModel;
use CodeIgniter\HTTP\ResponseInterface;

class VitalController extends BaseController
{
    public function index(int $id)
    {
        $patients=model(PatientModel::class);

        $patient=$patients->find($id);

        $vitals = model('VitalModel')->builder()->select('*')->join('users', 'vital_signs.user_id = users.id')->where('vital_signs.patient_id',$id)->orderBy('vital_signs.created_at','desc')->get()->getResult();
        return view("patient/vital_sign",["patient"=>$patient, 'vitals'=>$vitals]);
    }

    public function store()
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
            // dd($this->validator->getErrors());
            return redirect()->back()->withInput()->with('val_errors',$this->validator->getErrors());     
        }
        
        $validatedData = $this->validator->getValidated();

        // dd($validatedData);
        
        model(VitalModel::class)->insert($validatedData );

        return redirect()->back()->with("success","data saved successfully");
        }

}

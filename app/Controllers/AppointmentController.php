<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppointmentModel;
use App\Models\DrugModel;
use App\Models\PatientModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AppointmentController extends BaseController
{
    public function index($id)
    {
        $user =model(UserModel::class)->findAll();

        $patient = model(PatientModel::class)->find( $id );
        $descs =model(AppointmentModel::class)->builder()->select("appointments.*,u.name as name,r.name as receiver")
                            ->join('users u', 'u.id = appointments.user_id')
                            ->join('users r', 'r.id = appointments.receiver_id')
                            ->where('patient_id', $id)
                            ->get()
                            ->getResult();
        // dd($descs);
        $patient = model(PatientModel::class)->find( $id );
        return view('patient/appointments', ["patient"=> $patient,'user'=>$user,'descs'=>$descs]);
    }

    public function store ()
    {

        if( !$this->validate([
            'desc' => 'required',
            'receiver_id'=> 'required',
            'patient_id' => 'required',
            'user_id'=> 'required',
            'date'=> 'required',
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
     model(AppointmentModel::class)->insert($validatedData );

     return redirect()->back()->with("success","Appointment for patient successfully saved ");

    }


    public function todayappointment ()

    {
        $today =  date('Y-m-d');

        $appointments =model(AppointmentModel::class)->builder()->select("appointments.*,u.name as name,r.name as receiver ,p.first_name , p.middle_name , p.last_name ")
                            ->join('users u', 'u.id = appointments.user_id')
                            ->join('users r', 'r.id = appointments.receiver_id')
                            ->join('patients p', 'p.id = appointments.patient_id')
                            ->where("DATE(date)",$today)
                            ->get()
                            ->getResult();

                            // dd($appointments);
       
        return view('patient/today_appointment',['appointments' => $appointments]);

    }

    public function weeklyappointment ()

    {
        $today = date('Y-m-d');
        $startDate = date('Y-m-d', strtotime('last monday', strtotime($today)));

        $endDate = date('Y-m-d', strtotime('next sunday', strtotime($today)));

        $appointments =model(AppointmentModel::class)->builder()->select("appointments.*,u.name as name,r.name as receiver ,p.first_name , p.middle_name , p.last_name ")
                            ->join('users u', 'u.id = appointments.user_id')
                            ->join('users r', 'r.id = appointments.receiver_id')
                            ->join('patients p', 'p.id = appointments.patient_id')
                            ->where('date >=', $startDate)
                            ->where('date <=', $endDate)
                            ->get()
                            ->getResult();
       
        return view('patient/weekly_appointments',['appointments' => $appointments]);

    }

    


       
    
}

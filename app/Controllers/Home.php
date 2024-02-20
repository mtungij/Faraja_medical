<?php

namespace App\Controllers;
use App\Models\DrugModel;
use App\Models\AppointmentModel;
use App\Models\PatientModel;
use App\Models\SaleItemModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {

        if(!session('user_id')){

            return redirect('login');
        }
        // $users=model(UserModel::class)->findAll();
        // $usercount=count($users);
 
    
        $today = date('Y-m-d');
        $minAge = 1;
        $maxAge = 5;

        $mainerage = 18;
        $painerage = 40;

        $oldage= 60;
        $olderage=120;
//weekly appointments
        $startDate = date('Y-m-d', strtotime('last monday', strtotime($today)));

        $endDate = date('Y-m-d', strtotime('next sunday', strtotime($today)));

        // end of weekly appointments

        $todaysale = model(SaleItemModel::class)->builder()->select('sale_items.*,d.name,d.unit')->join('drugs d','sale_items.id = d.id')->where("DATE(sale_items.created_at)",$today)->get()
        ->getResult(); 

        $products = model(DrugModel::class)->where("quantity",0)->get()->getResult(); 
      

        $weeklyappointments =model(AppointmentModel::class)->builder()->select("appointments.*,u.name as name,r.name as receiver ,p.first_name , p.middle_name , p.last_name ")
                            ->join('users u', 'u.id = appointments.user_id')
                            ->join('users r', 'r.id = appointments.receiver_id')
                            ->join('patients p', 'p.id = appointments.patient_id')
                            ->where('date >=', $startDate)
                            ->where('date <=', $endDate)
                            ->get()
                            ->getResult();
       
        //end weekly appointments

        $todayappointments =model(AppointmentModel::class)->where("DATE(date)",$today)->findAll();
        $patienttoday =model(PatientModel::class)->where("DATE(created_at)",$today)->findAll();
        $femaletoday =model(PatientModel::class)->where('gender','female')->where("DATE(created_at)",$today)->findAll();
        $maletoday =model(PatientModel::class)->where("gender","male")->where("DATE(created_at)","$today")->findAll();
        $patients=model(PatientModel::class)->findAll();
        $medicine =model(DrugModel::class)->select("SUM(drugs.quantity)");
        $lowage=model(PatientModel::class)->where("DATE(created_at)",$today)
        ->where('age >=', $minAge)
        ->where('age <=', $maxAge)
        ->findAll();

        $middleage = model(PatientModel::class)->where("DATE(created_at)",$today)->where('age >=',$mainerage )
        ->where('age <=',$painerage)
        ->findAll();

        $olders=model(PatientModel::class)->where("DATE(created_at)",$today)->where('age >=', $oldage)->where('age <=',$olderage)
        ->findAll();

        $users =model(UserModel::class)->findAll();

        // dd($users);

        // dd($todayappointments);
        // dd($middleage);
        // dd($femaletoday);
        //  dd($lowage);
        // dd($patienttoday);
        // dd($olders);

        // dd($medicine);  

        $todayP=count($patienttoday);
        $female=count($femaletoday);
        $male =count($maletoday);
        $patients =count($patients);
        $childage=count($lowage);
        $middleage=count($middleage);
        $olders=count($olders);
        $todayappointments=count($todayappointments);
        $weeklyappointments=count($weeklyappointments);
        $products =count($products );
        $user=count($users);

      
        
        
        $data = [
            'todayP' => $todayP,
            'female'=> $female,
            'male'=> $male,
            'patients'=> $patients,
            'medicine' => $medicine,
            'childage' => $childage,
            'middleage'=> $middleage,
            'olders'=> $olders,
            'todayappointments'=> $todayappointments,
            'weeklyappointments'=> $weeklyappointments,
            'products'=> $products,
            'user' =>$user,
        ];
    

        return view('welcome_message', $data);
    }
}

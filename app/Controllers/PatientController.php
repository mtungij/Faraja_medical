<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComplainModel;
use App\Models\LabtestModel;
use App\Models\PatientModel;
use App\Models\VitalModel;
use App\Models\UserModel;
use App\Models\ServiceModel;
use CodeIgniter\HTTP\ResponseInterface;

class PatientController extends BaseController
{
    public function show()
    {
        
       return view("patient/create_patient");
    }

    public function loadRecord()
    {

        $request = service('request');
		$searchData = $request->getGet(); // OR $this->request->getGet();

		$search = "";
		if (isset($searchData) && isset($searchData['search'])) {
			$search = $searchData['search'];
		}

		// Get data 
		$users = new PatientModel();


       // ...
// ...

if ($search == '') {
    $paginateData = $users->orderBy('created_at', 'DESC')  // Order by created_at in descending order
                         ->get()
                         ->getResult();
} else {
    $paginateData = $users->select('*')
        ->orLike('first_name', $search)
        ->orLike('middle_name', $search)
        ->orLike('last_name', $search)
        ->orLike('illiness_status', $search)
        ->orLike('gender', $search)
        ->orderBy('created_at', 'DESC')  // Order by created_at in descending order
        ->get()
        ->getResult();
}

// ...


// ...


		$data = [
			'users' => $paginateData,
			'pager' => $users->pager,
			'search' => $search
		];

		return view('patient/index', $data);
	}


       
    public function store()

    {   
        if( !$this->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name'=> 'required',
            'phone'=> 'permit_empty',
            'illiness_status'=>'required',
            'gender'=>'required',
            'address'=> 'permit_empty',
            'age'=> 'required',
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
    $patientExist = model(PatientModel::class)->where(['first_name' => $validatedData['first_name'], 'middle_name' => $validatedData['middle_name'],'last_name'=>$validatedData['last_name']])->first();
    
    if($patientExist)
    {
        return redirect()->back()->withInput()->with('errors','Mgonjwa unayemsajili tayari alishajiliwa');   
    }
    
     model(PatientModel::class)->insert($validatedData );
    
       
       return redirect('patients')->with('success','Mgonjwa mpya tayari ameshajiliwa');
    }


    public function profile($id)

    {
       
        $service=model(ServiceModel::class);
        $tests=model(LabtestModel::class);
        $vital=model(VitalModel::class);
        $vitals =$vital->where('patient_id',$id)->orderBy('created_at','desc')->get()->getResult();
        $service=$service->findAll();
        $test=$tests->findAll();
       
        $patient = model(PatientModel::class)->find($id);

        return view('patient/profile', ['patient'=> $patient,'vitals'=>$vitals,'service'=> $service ,'test'=> $test ]);
    }

    public function pro()
    {

        return view('setting/services');
    }

    public function editpage($id)
    {
       

       $patients=model(PatientModel::class);
       $patient = $patients->find($id);

    //    dd($patient);
       return view('patient/edit_patient', ['patient'=> $patient]);


    }

    public function update_patient()
    {

      
              
$id =$this->request->getPost('id');
$first_name = $this->request->getPost('first_name');
$middle_name = $this->request->getPost('middle_name');
$last_name = $this->request->getPost('last_name');
$phone = $this->request->getPost('phone');
$illiness_status= $this->request->getPost('illiness_status');
$gender= $this->request->getPost('gender');
$address = $this->request->getPost('address');
$age= $this->request->getPost('age');

$data = [
    'first_name' => $first_name,
    'middle_name'=> $middle_name,
    'last_name'=> $last_name,
    'phone'=> $phone,
    'illiness_status'=> $illiness_status,
    'gender'=> $gender,
    'address'=> $address,
    'age'=> $age

];

// dd($data);

$model = new PatientModel();
$result=$model->update($id,$data);


if($result){

    return redirect('patients')->with('success','Mgonjwa  tayari amerekebishwa');
    
}else{

    return redirect()->back()->withInput()->with('erros','please fill all field'); 

}


    }


    public function update($id)

    {
      

        $model = new PatientModel();
        $patient=$model->find($id);
        
    return view('patient/vital_sign');
    }

    public function new ()

    {
  
        $today = date('Y-m-d');

        $users = model(PatientModel::class)->where('DATE(created_at)',$today)->findAll();

        return view('patient/newpatient',['users'=>$users]);
    }

    public function all_patients()

    {

        $patients = model(PatientModel::class)->findAll();
        return view('patient/all_patients',['patients'=>$patients]);
    }
   
}



       




   
  
    
    

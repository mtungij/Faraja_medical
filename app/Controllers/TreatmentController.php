<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DrugModel;
use App\Models\PatientModel;
use App\Models\TreatmentModel;
use App\Models\InvoiceModel;
use App\Models\InvestigationModel;
use App\Models\InvestigationItemModel;
use App\Models\LabtestModel;
use App\Models\UserModel;
use App\Models\InvestigationResultModel;
use App\Models\TransferModel;
use CodeIgniter\HTTP\ResponseInterface;

class TreatmentController extends BaseController
{
    public function index($id)
    {
        $treatments = model(TreatmentModel::class)->builder()
                                ->select("treatments.*, users.name")
                                ->join("users", 'users.id = treatments.user_id')
                                ->where('patient_id', $id)
                                ->get()
                                ->getResult();

                             
        $patient = model(PatientModel::class)->find($id);
        $drugs=model(DrugModel::class)->findAll();

       
        return view('patient/treatment', [
            'treatments' => $treatments,
            'patient' => $patient,
            'drugs' => $drugs
        ]);
    }


    public function show($id)
    {
        if(session('department') != "admin") {
            $transfer = model(TransferModel::class)->where('patient_id', $id)->where('to', session('user_id'))->orderBy('created_at', 'desc')->first();
            if($transfer && $transfer->status == 'new') {
                model(TransferModel::class)->update((int) $transfer->id, ['status' => 'done']);
            }
        }
        $categories = model(LabtestModel::class)->findAll();
        $patient = model(PatientModel::class)->find($id);
        
        $investigations = model(InvestigationModel::class)->builder()
                                ->select("investigations.id,investigations.user_id, investigations.patient_id, investigations.created_at")
                                ->where('investigations.patient_id', $id)
                                ->get()
                                ->getResult();

                              

        foreach($investigations as $investigation) {
            $investigation->items = model(InvestigationItemModel::class)->builder()
                                    ->select('categories.*')
                                    ->join('categories', 'categories.id = investigation_items.category_id')
                                    ->where('investigation_id', $investigation->id)
                                    ->get()
                                    ->getResult();

                                 

            $investigation->invoice = model(InvoiceModel::class)->where('invoiceable_type', 'App\Models\InvestigationModel')->where('invoiceable_id', $investigation->id)->first();

            $investigation->user = model(UserModel::class)->find($investigation->user_id);

            $investigation->result = model(InvestigationResultModel::class)->where('investigation_id', $investigation->id)->first();

         
            if ($investigation->result) {
                $investigation->result->user = model(UserModel::class)->find($investigation->result->user_id);
            }
        }

        $drugs=model(DrugModel::class)->findAll();

        // dd($investigations);

        return view('patient/treats', [
            'patient' => $patient,
            'investigations' => $investigations,
            'categories' => $categories,
            'drugs' => $drugs
        ]);
}

    public function store()
    {
        $rules = [
            'medicine_name' => 'required',
            'quantity' => 'required',
            'route' => 'required',
            'frequency' => 'required',
            'duration' => 'required',
            'patient_id' => 'required',
            'user_id'=> 'required',
        ];  

        if( !$this->validate($rules)){
            return redirect()->back()->withInput()->with('erros','please fill all field');     
        }

        $validatedData = $this->validator->getValidated();

        // dd($validatedData);

        model(TreatmentModel::class)->insert($validatedData );

        return redirect()->back()->with("success","data saved successfully");
    }
}

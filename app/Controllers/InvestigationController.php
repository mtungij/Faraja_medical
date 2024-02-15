<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvestigationItemModel;
use App\Models\InvestigationModel;
use App\Models\InvestigationResultModel;
use App\Models\InvoiceModel;
use App\Models\LabtestModel;
use App\Models\PatientModel;
use App\Models\SurgicalModel;
use App\Models\TransferModel;
use App\Models\UserModel;

class InvestigationController extends BaseController
{
    public function index($id)
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

        // dd($investigations);

        return view('patient/investigation', [
            'patient' => $patient,
            'investigations' => $investigations,
            'categories' => $categories,
        ]);
    }

    public function store()
    {
        $categories = $this->request->getPost('categories');

        if( !$this->validate([
            'patient_id'=> 'required',
            'user_id'=> 'required',
        ])){
                       
           return redirect()->back()->withInput()->with('errors','please fill all field');     
        }
        
           $validatedData = $this->validator->getValidated();
            
           $investigationId = model(InvestigationModel::class)->insert($validatedData);

            foreach($categories as $category) {
            model(InvestigationItemModel::class)->insert(['investigation_id' => $investigationId, 'category_id' => $category]);
            }

            //save investigationId to invoice
            model(InvoiceModel::class)->insert(['patient_id' => $validatedData['patient_id'], 'user_id' => $validatedData['user_id'], 'invoice_number' => 'INV'. random_int(100_000_000, 999999999), 'invoiceable_type' => 'App\Models\InvestigationModel', 'invoiceable_id' => $investigationId]);
            
            return redirect()->back()->with('success','data added successfully');

        }


        public function edit($patientId, $investigationId)
        {
            $investigation = model(InvestigationModel::class)->find($investigationId);
            $patient = model(PatientModel::class)->find($patientId);

            return view('patient/replayInvestigation', [
                'patient' => $patient,
                'investigation' => $investigation,
            ]);
        }


        public function update($patientId, $investigationId)
        {
            if(! $this->validate([
                'result' => 'required',
                'replied_by' => 'required',
            ])){
                return redirect()->back()->withInput()->with('errors', "Please fill all inputs");
            }

            $validatedData = $this->validator->getValidated();

            model(InvestigationModel::class)->update((int) $investigationId, ['result' => $validatedData['result'], 'replied_by' => $validatedData['replied_by']]);

            return redirect()->to("patients/$patientId/investigations")->with('success', "Investigation updated successfully");
        }


        public function storeResult()
        {
            if(! $this->validate([
                'investigation_id' => 'required',
                'user_id' => 'required',
                'desc' => 'required',
            ])){
                return redirect()->back()->withInput()->with('errors', "Please fill all inputs");
            }

            $validatedData = $this->validator->getValidated();

            model(InvestigationResultModel::class)->insert($validatedData);

            return redirect()->back()->with('success', "Result added successfully");
        }
}

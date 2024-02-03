<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvestigationModel;
use App\Models\LabtestModel;
use App\Models\PatientModel;
use App\Models\SurgicalModel;
use CodeIgniter\HTTP\ResponseInterface;

class InvestigationController extends BaseController
{
    public function index($id)
    {
        $categories = model(LabtestModel::class)->findAll();
        $surgicals = model(SurgicalModel::class)->findAll();
        $patient = model(PatientModel::class)->find($id);
        $investigations = model(InvestigationModel::class)->builder()
                                ->select("investigatigations.*, users.name")
                                ->join("users", 'users.id = investigatigations.user_id')
                                // ->join('users r', 'r.id = investigatigations.replied_by')
                                ->where('patient_id', $id)
                                ->orderBy('created_at', 'desc')
                                ->get()
                                ->getResult();

        return view('patient/investigation', [
            'patient' => $patient,
            'investigations' => $investigations,
            'categories' => $categories,
            'surgicals' => $surgicals,
        ]);
    }

    public function store()
    {
        $comment = $this->request->getPost('desc');
        $surgicals = $this->request->getPost('surgicals');
        $result = $this->request->getPost('result');
        $categories = $this->request->getPost('categories');

        if( !$this->validate([
            'patient_id'=> 'required',
            'user_id'=> 'required',
        ])){
                       
           return redirect()->back()->withInput()->with('errors','please fill all field');     
        }
        
           $validatedData = $this->validator->getValidated();
            
           $investigation= model(InvestigationModel::class)->insert([
                ...$validatedData, 
                'comment' => $comment, 
                'result' => $result,
                'surgicals' => serialize($surgicals), 
                'categories' => serialize($categories)
            ]);

            //if patient_id is available to invoice table then update else insert

        $patient = model('App\Models\InvoiceModel')->where('patient_id', $this->request->getPost('patient_id'))->first();

        if ($patient) {
            model('App\Models\InvoiceModel')->update($patient->id, [
                'investigatigation_id' => $investigation,
                'status' => 'pending',
            ]);
        } else {
            model('App\Models\InvoiceModel')->insert([
                'patient_id' => $this->request->getPost('patient_id'),
                'investigatigation_id' => $investigation,
            ]);
        }



            
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
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SurgicalModel;
use App\Models\SurgicalRecordItemModel;
use App\Models\SurgicalRecordModel;
use CodeIgniter\HTTP\ResponseInterface;

class SurgicalRecordController extends BaseController
{
    public function index($id)
    {
        $surgicals = model(SurgicalModel::class)->findAll();
        $patient = model('App\Models\PatientModel')->find($id);

        $surgicalRecords = model(SurgicalRecordModel::class)->where('patient_id', $id)->get()->getResult();

        foreach($surgicalRecords as $surgicalRecord) {
            $surgicalRecord->items = model(SurgicalRecordItemModel::class)->builder()
                                    ->select('surgicals.id, surgicals.name, surgicals.price')
                                    ->join('surgicals', 'surgicals.id = surgical_record_items.surgical_id')
                                    ->where('surgical_record_items.surgical_record_id', $surgicalRecord->id)
                                    ->get()
                                    ->getResult();

            $surgicalRecord->user = model('App\Models\UserModel')->find($surgicalRecord->user_id);


            $surgicalRecord->invoice = model('App\Models\InvoiceModel')->where('invoiceable_type', 'App\Models\SurgicalRecordModel')->where('invoiceable_id', $surgicalRecord->id)->first();
        }

        return view('patient/surgical', [
            'surgicalRecords' => $surgicalRecords,
            'surgicals' => $surgicals,
            'patient' => $patient,
        ]);
    }


    public function store()
    {
        if(!$this->validate([
            'patient_id' => 'required',
            'user_id' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', "Please fill all fields");
        }

        $validatedData = $this->validator->getValidated();

        $surgicalRecordId = model(SurgicalRecordModel::class)->insert($validatedData);

        $surgicals = $this->request->getPost('surgicals');

        foreach($surgicals as $surgical) {
            model(SurgicalRecordItemModel::class)->insert(['surgical_record_id' => $surgicalRecordId, 'surgical_id' => (int) $surgical]);
        }

        //save surgicalRecordId to invoice
        $invoiceData = [
            'invoice_number' => random_int(1000, 99_999_999),
            'invoiceable_type' => 'surgicals',
            'invoiceable_id' => $surgicalRecordId,
            'patient_id' => $validatedData['patient_id'],
        ];

        model('App\Models\InvoiceModel')->insert($invoiceData);

        return redirect()->back()->with('message', 'Surgical record created successfully');
    }
}

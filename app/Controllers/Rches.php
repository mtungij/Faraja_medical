<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;
use App\Models\PatientModel;
use App\Models\RchesModel;
use App\Models\RchRecordItemModel;
use App\Models\RchRecordModel;

class Rches extends BaseController
{
    public function index()
    {
        return view('rches/index', [
            'rches' => model(RchesModel::class)->findAll(),
        ]);
    }

    public function create()
    {

        if( !$this->validate([
            'name' => 'required',
            'price' => 'required',
        ])){
                       
            return redirect()->back()->withInput()->with('errors','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
    
     $rch = model(RchesModel::class)->where('name',$validatedData['name'])->first();
    
     if(!$rch){
    
    //  dd($validatedData); 
    $validatedData['price'] = str_replace(',', '', $validatedData['price']);
    
     model(RchesModel::class)->insert($validatedData );
       
       return redirect()->back()->with('success','Rch added successfully');


    }
    }


    public function update()
    {
        model('RchesModel')->save([
            'id' => $this->request->getPost('id'),
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
        ]);

        return redirect()->back()->with('success', 'Data updated successfully!');
    }

    public function patientRches($id)
    {
        $rchesRecords = model(RchRecordModel::class)
                            ->where('patient_id', $id)
                            ->get()
                            ->getResult();

        $patient = model(PatientModel::class)->where('id', $id)->first();

        $rchesRecordInvoiceStatus = 'No invoice yet.';

        foreach ($rchesRecords as $rchRecord) {
            $rchRecord->items = model(RchRecordItemModel::class)->builder()
                                ->select('rch_record_items.*, rches.name, rches.price')
                                ->join('rches', 'rches.id = rch_record_items.rch_id')
                                ->where('rch_record_id', $rchRecord->id)
                                ->get()
                                ->getResult();
            
            $rchRecord->invoice = model(InvoiceModel::class)->where('invoiceable_id', $rchRecord->id)->where('invoiceable_type', 'App\Models\RchRecordModel')->first();
            if ($rchRecord->invoice) {
                $rchesRecordInvoiceStatus = $rchRecord->invoice->status;
            }
        }

        return view('patient/rches', [
            'rches' => model(RchesModel::class)->findAll(),
            'patient' => $patient,
            'rchesRecords' => $rchesRecords,
            'invoiceStatus' => $rchesRecordInvoiceStatus,
        ]);
    }


    public function store($id)
    {
        $rches = $this->request->getPost('rches');
        $desc = $this->request->getPost('desc');
        $patient_id = $this->request->getPost('patient_id');
        $user_id = $this->request->getPost('user_id');


            $rchRecordId = model('RchRecordModel')->insert([
                'patient_id' => $patient_id,
                'user_id' => $user_id,
            ]);

            //save rch record items
            foreach ($rches as $rch) {
                model('RchRecordItemModel')->insert([
                    'rch_record_id' => $rchRecordId,
                    'rch_id' => $rch,
                    'desc' => $desc,
                ]);
            }

            //save to invoice
            model('InvoiceModel')->insert([
                'invoice_number' => 'INV' . random_int(100_000_000, 999_999_999),
                'invoiceable_id' => $rchRecordId,
                'patient_id' => $patient_id,
                'invoiceable_type' => 'App\Models\RchRecordModel',
                'status' => 'pending',
            ]);

        return redirect()->back()->with('success', 'Rches has been saved');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;
use App\Models\RchesModel;
use App\Models\RchRecordModel;

class Rches extends BaseController
{
    public function index()
    {
        return view('rches/index', [
            'rches' => model(RchesModel::class)->paginate(10),
        ]);
    }

    public function create()
    {
        model('RchesModel')->insert([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price')
        ]);

        return redirect()->back()->with('success', 'Data has been saved');
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
        $rchesRecords = model(RchRecordModel::class)->builder()
                            ->select("*")
                            ->join('rch_record_items ri', 'rch_records.id = ri.rch_record_id')
                            ->join('rches r', 'ri.rch_id = r.id')
                            ->where('patient_id', $id)
                            ->get()
                            ->getResult();

        $rchesRecordInvoiceStatus = model(InvoiceModel::class)
                                        ->where('patient_id', $id)
                                        ->first()?->status;

        return view('patient/rches', [
            'rches' => model(RchesModel::class)->findAll(),
            'patient' => model('PatientModel')->find($id),
            'rchesRecords' => $rchesRecords,
            'invoiceStatus' => $rchesRecordInvoiceStatus ?? "No invoice yet",
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

            //if patient is available to invoices table update the invoice table with rch_record_id and status to pending otherwise create new invoice
            $invoice = model('InvoiceModel')->where('patient_id', $patient_id)->first();

            if ($invoice) {
                model(InvoiceModel::class)->update($invoice->id,[
                    'rch_record_id' => $rchRecordId,
                    'status' => 'pending',
                ]);
            } else {
                model('InvoiceModel')->insert([
                    'patient_id' => $patient_id,
                    'rch_record_id' => $rchRecordId,
                    'status' => 'pending',
                ]);
            }

            //save rch record items
            foreach ($rches as $rch) {
                model('RchRecordItemModel')->insert([
                    'rch_record_id' => $rchRecordId,
                    'rch_id' => $rch,
                    'desc' => $desc,
                ]);
            }

        return redirect()->back()->with('success', 'Rches has been saved');
    }
}

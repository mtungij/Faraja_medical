<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvestigationModel;
use App\Models\InvoiceModel;
use App\Models\PatientModel;
use App\Models\TransferModel;
use CodeIgniter\HTTP\ResponseInterface;

class InvoiceController extends BaseController
{
    public function index($id)
    {
        if(session('department') != "admin") {
            $transfer = model(TransferModel::class)->where('patient_id', $id)->where('to', session('user_id'))->orderBy('created_at', 'desc')->first();
            if($transfer && $transfer->status == 'new') {
                model(TransferModel::class)->update((int) $transfer->id, ['status' => 'done']);
            }
        }


        $invoice = model(InvoiceModel::class)->where('patient_id', $id)->first();
        $patient = model(PatientModel::class)->find($id);
        $invoiceItems = model(InvoiceModel::class)->builder()->select("*")->join('sales s', 's.id = invoices.sale_id')->join('sale_items si', 'si.sale_id = s.id')->join('drugs d', 'd.id = si.drug_id')->where('invoices.patient_id', $id)->get()->getResult();
        $investigations = model(InvestigationModel::class)->where('patient_id', $id)->orderBy('created_at', 'desc')->first();

        $rchesRecords = model(InvoiceModel::class)->builder()
                            ->select("*")
                            ->join('rch_records rr', 'invoices.rch_record_id = rr.id')
                            ->join('rch_record_items rri', 'rr.id = rri.rch_record_id')
                            ->join('rches r', 'rri.rch_id = r.id')
                            ->where('invoices.patient_id', $id)
                            ->get()
                            ->getResult();

        // dd($investigations);
        return view("patient/invoice", [
            "patient"=> $patient, 
            'invoiceItems' => $invoiceItems, 
            'investigations' => $investigations, 
            'invoice' => $invoice,
            'rchesRecords' =>$rchesRecords
        ]);
    }

    public function changeStatus(int $patient_id, int $invoice_id)
    {
        $userId = session('user_id');
        $invoice = model(InvoiceModel::class)->update($invoice_id, ['status' => $this->request->getPost('status'), 'user_id' => $userId]);
        return redirect()->back()->with('success', 'Paid Successfully!');
    }
}

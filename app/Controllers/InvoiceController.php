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
    public function index($id, $invoice_id)
    {
        $invoice = model(InvoiceModel::class)->find($invoice_id);

        $invoiceType = model($invoice->invoiceable_type)->find($invoice->invoiceable_id);

        $invoiceType->items = model($invoice->invoiceable_type . 'ItemModel')->where($invoice->invoiceable_type . '_id', $invoice->invoiceable_id)->get()->getResult();

        dd($invoiceType);

        return view("patient/invoice", [
            'patient' => model(PatientModel::class)->find($id),
            'setting' => model('App\Models\SettingModel')->first(),
        ]);
    }

    public function changeStatus(int $patient_id, int $invoice_id)
    {
        $userId = session('user_id');
        $invoice = model(InvoiceModel::class)->update($invoice_id, ['status' => $this->request->getPost('status'), 'user_id' => $userId]);
        return redirect()->back()->with('success', 'Paid Successfully!');
    }

    public function show($id, $invoice_id)
    {
        $this->request->setHeader('Content-Type', 'application/pdf');
        $invoiceName = "invoice" . $invoice_id . ".pdf";
        $pdf = new \Mpdf\Mpdf();

        $pdf->WriteHTML(view('patient_receipt'));
        $pdf->Output('invoice123.pdf', 'D');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvestigationItemModel;
use App\Models\InvestigationModel;
use App\Models\InvoiceModel;
use App\Models\PatientModel;
use App\Models\RchRecordItemModel;
use App\Models\RchRecordModel;
use App\Models\SaleItemModel;
use App\Models\SaleModel;
use App\Models\SurgicalRecordItemModel;
use App\Models\SurgicalRecordModel;
use App\Models\TransferModel;
use CodeIgniter\HTTP\ResponseInterface;

class InvoiceController extends BaseController
{
    public function index($id, $invoice_id)
    {
        $invoice = model(InvoiceModel::class)->find($invoice_id);

        $invoiceType = [];

        if($invoice->invoiceable_type == 'investigations') {
            $invoiceType = model(InvestigationModel::class)->find($invoice->invoiceable_id);
            $invoiceType->name = $invoice->invoiceable_type;
            $invoiceType->number = $invoice->invoice_number;
            $invoiceType->items = model(InvestigationItemModel::class)->builder()
                                   ->select('categories.name, categories.price, investigation_items.*')
                                   ->join('categories', 'categories.id = investigation_items.category_id')
                                   ->where('investigation_id', $invoiceType->id)
                                   ->get()
                                   ->getResult();

        } elseif($invoice->invoiceable_type == 'surgicals') {
            $invoiceType = model(SurgicalRecordModel::class)->find($invoice->invoiceable_id);
            $invoiceType->name = $invoice->invoiceable_type;
            $invoiceType->number = $invoice->invoice_number;
            $invoiceType->items = model(SurgicalRecordItemModel::class)->builder()
                                        ->select('surgicals.name, surgicals.price, surgical_record_items.*')
                                        ->join('surgicals', 'surgicals.id = surgical_record_items.surgical_id')
                                        ->where('surgical_record_id', $invoiceType->id)
                                        ->get()
                                        ->getResult();

        } elseif($invoice->invoiceable_type == 'rches') {
            $invoiceType = model(RchRecordModel::class)->find($invoice->invoiceable_id);
            $invoiceType->name = $invoice->invoiceable_type;
            $invoiceType->number = $invoice->invoice_number;
            $invoiceType->items = model(RchRecordItemModel::class)->builder()
                                        ->select('rches.name, rches.price, rch_record_items.*')
                                        ->join('rches', 'rches.id = rch_record_items.rch_id')
                                        ->where('rch_record_items.rch_record_id', $invoiceType->id)
                                        ->get()
                                        ->getResult();
                                        
        } elseif($invoice->invoiceable_type == 'drugs') {
            $invoiceType = model(SaleModel::class)->find($invoice->invoiceable_id);
            $invoiceType->name = $invoice->invoiceable_type;
            $invoiceType->number = $invoice->invoice_number;
            $invoiceType->items = model(SaleItemModel::class)->builder()
                                    ->select('drugs.name, drugs.sell_price as price, sale_items.*')
                                    ->join('drugs', 'drugs.id = sale_items.drug_id')
                                    ->where('sale_id', $invoiceType->id)
                                    ->get()
                                    ->getResult();
        }


        return view("patient/invoice", [
            'patient' => model(PatientModel::class)->find($id),
            'setting' => model('App\Models\SettingModel')->first(),
            'invoiceType' => $invoiceType,
            'invoice' => $invoice,
        ]);
    }


    public function print_invoice($id, $invoice_id)
    {

        //update invoice status to paid and user_id to current user
        $invoice = model(InvoiceModel::class)->update($invoice_id, [
            'status' => 'paid',
            'user_id' => session()->get('user_id')
        ]);

        $this->request->setHeader('Content-Type', 'application/pdf');
        $invoiceName = "invoice" . $invoice_id . ".pdf";
        $pdf = new \Mpdf\Mpdf();

        $pdf->WriteHTML(view('patient_receipt'));
        return $pdf->Output($invoiceName, 'D');
    }
}

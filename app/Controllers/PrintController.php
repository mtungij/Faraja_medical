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
use CodeIgniter\HTTP\ResponseInterface;

use Mpdf\Mpdf;


class PrintController extends BaseController
{
   public function print_invoice($id, $invoice_id)
    {

        //update invoice status to paid and user_id to current user
        $invoice = model(InvoiceModel::class)->update($invoice_id, [
            'status' => 'paid',
            'user_id' => session()->get('user_id')
        ]);

          $invoice = model(InvoiceModel::class)->find($invoice_id);

        $invoiceType = [];

        if($invoice->invoiceable_type == 'investigations') {
            $invoiceType = model(InvestigationModel::class)->find($invoice->invoiceable_id);
            $invoiceType->name = $invoice->invoiceable_type;
            $invoiceType->number = $invoice->invoice_number;
            $invoiceType->items = model(InvestigationItemModel::class)->builder()
                                   ->select('categories.name, categories.price, investigation_items.*')
                                   ->join('categories', 'categories.id = investigation_items.category_id')
                                   ->where('investigation_items.investigation_id', $invoiceType->id)
                                   ->get()
                                   ->getResult();
            $invoiceType->user = model(InvestigationModel::class)->builder()
                                   ->select('users.name')
                                   ->join('users', 'users.id = investigation_items.user_id')
                                   ->where('investigations.id', $invoiceType->id)
                                   ->get()
                                   ->getRow();

        } elseif($invoice->invoiceable_type == 'surgicals') {
            $invoiceType = model(SurgicalRecordModel::class)->find($invoice->invoiceable_id);
            $invoiceType->name = $invoice->invoiceable_type;
            $invoiceType->number = $invoice->invoice_number;
            $invoiceType->items = model(SurgicalRecordItemModel::class)->builder()
                                        ->select('surgicals.name, surgicals.price, surgical_record_items.*')
                                        ->join('surgicals', 'surgicals.id = surgical_record_items.surgical_id')
                                        ->where('surgical_record_items.surgical_record_id', $invoiceType->id)
                                        ->get()
                                        ->getResult();
        $invoiceType->user = model(SurgicalRecordModel::class)->builder()
                                        ->select('users.name')
                                        ->join('users', 'surgical_records.id = users.id')
                                        ->where('surgical_records.id', $invoiceType->id)
                                        ->get()
                                        ->getRow();

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
            $invoiceType->user = model(RchRecordModel::class)->builder()
                                        ->select('users.name')
                                        ->join('users', 'surgical_records.id = users.id')
                                        ->where('rch_records.id', $invoiceType->id)
                                        ->get()
                                        ->getRow();
                                        
        } elseif($invoice->invoiceable_type == 'drugs') {
            $invoiceType = model(SaleModel::class)->find($invoice->invoiceable_id);
            $invoiceType->name = $invoice->invoiceable_type;
            $invoiceType->number = $invoice->invoice_number;
            $invoiceType->items = model(SaleItemModel::class)->builder()
                                    ->select('drugs.name, drugs.sell_price as price, sale_items.*')
                                    ->join('drugs', 'drugs.id = sale_items.drug_id')
                                    ->where('sale_items.sale_id', $invoiceType->id)
                                    ->get()
                                    ->getResult();
            $invoiceType->user = model(SaleModel::class)->builder()
                                        ->select('users.name')
                                        ->join('users', 'sales.id = users.id')
                                        ->where('sales.id', $invoiceType->id)
                                        ->get()
                                        ->getRow();
           
        }


        return view("patient_receipt", [
            'patient' => model(PatientModel::class)->find($id),
            'setting' => model('App\Models\SettingModel')->first(),
            'invoiceType' => $invoiceType,
            'invoice' => $invoice,
        ]);
    }

}






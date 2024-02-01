<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;
use App\Models\PatientModel;
use CodeIgniter\HTTP\ResponseInterface;

class InvoiceController extends BaseController
{
    public function index($id)
    {
        $patient = model(PatientModel::class)->find($id);
        $invoiceItems = model(InvoiceModel::class)->builder()->select("*")->join('sales s', 's.id = invoices.sale_id')->join('sale_items si', 'si.sale_id = s.id')->join('drugs d', 'd.id = si.drug_id')->where('invoices.patient_id', $id)->get()->getResult();
        // dd($invoiceItems);

        return view("patient/invoice", ["patient"=> $patient, 'invoiceItems' => $invoiceItems]);
    }
}

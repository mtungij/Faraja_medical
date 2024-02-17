<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvestigationModel;
use App\Models\InvoiceModel;
use App\Models\RchRecordModel;
use App\Models\SaleModel;
use App\Models\SurgicalRecordModel;
use App\Models\TransferModel;

class ActivitiesController extends BaseController
{
    public function index()
    {
        $patients = [];
        if($this->request->getGet('search')) {
            $search = $this->request->getGet('search');
            $patients = model(TransferModel::class)
                            ->select("transfers.id, transfers.created_at, transfers.status as badge, p.id as patientId, p.first_name, p.middle_name, p.last_name, p.illiness_status as status, f.name, f.department,")
                            ->where('to', session('user_id'))
                            ->join('users f', 'transfers.from = f.id')
                            ->join('patients p', 'transfers.patient_id = p.id')
                            ->orderBy('created_at', 'desc')
                            ->like('p.first_name', $search)
                            ->orLike('p.middle_name', $search)
                            ->orLike('p.last_name', $search)
                            ->get()
                            ->getResult();
           
        } else {
            $patients = model(TransferModel::class)
                            ->select("transfers.id, transfers.created_at, transfers.status as badge, p.id as patientId, p.first_name, p.middle_name, p.last_name, p.illiness_status as status, f.name, f.department,")
                            ->where('to', session('user_id'))
                            ->join('users f', 'transfers.from = f.id')
                            ->join('patients p', 'transfers.patient_id = p.id')
                            ->orderBy('created_at', 'desc')
                            ->get()
                            ->getResult();
        }

        $invoices = model(InvoiceModel::class)
                    ->select('invoices.id, invoices.invoice_number, invoices.invoiceable_type, invoices.status, invoices.created_at, patients.id as patient_id, patients.first_name, patients.middle_name, patients.last_name')
                    ->join('patients', 'patients.id = invoices.patient_id')
                    ->where('invoices.status', 'pending')
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->getResult();

        $totalSurgicalsByUser = 0;
        $totalInvestigationsByUser = 0;
        $totalMedicationsByUser = 0;
        $totalRchesByUser = 0;

        foreach(model(InvoiceModel::class)->where('status', 'paid')->where('user_id', session('user_id'))->where('DATE(created_at)', date('Y-m-d'))->get()->getResult() as $invoice) {
            if($invoice->invoiceable_type == 'surgicals') {
                $surgicals = model(SurgicalRecordModel::class)->builder()
                                ->select('surgicals.price')
                                ->join('surgical_record_items', 'surgical_record_items.surgical_record_id = surgical_records.id')
                                ->join('surgicals', 'surgicals.id = surgical_record_items.surgical_id')
                                ->where('surgical_records.id', $invoice->invoiceable_id)
                                ->get()
                                ->getResult();
                foreach($surgicals as $surgical) {
                    $totalSurgicalsByUser += $surgical->price;
                }
            } else if($invoice->invoiceable_type == 'investigations') {
                $investigations = model(InvestigationModel::class)->builder()
                                ->select('categories.price')
                                ->join('investigation_items', 'investigation_items.investigation_id = investigations.id')
                                ->join('categories', 'categories.id = investigation_items.category_id')
                                ->where('investigations.id', $invoice->invoiceable_id)
                                ->get()
                                ->getResult();
                foreach($investigations as $investigation) {
                    $totalInvestigationsByUser += $investigation->price;
                }
            } else if($invoice->invoiceable_type == 'drugs') {
                $medications = model(SaleModel::class)->builder()
                                ->select('sale_items.price, sale_items.quantity, sale_items.created_at')
                                ->join('sale_items', 'sale_items.sale_id = sales.id')
                                ->where('sales.id', $invoice->invoiceable_id)
                                ->get()
                                ->getResult();
                                
                foreach($medications as $medication) {
                    $totalMedicationsByUser += ($medication->price * $medication->quantity);
                }
            } else if($invoice->invoiceable_type == 'rches') {
                $rches = model(RchRecordModel::class)->builder()
                                ->select('rches.price')
                                ->join('rch_record_items', 'rch_record_items.rch_record_id = rch_records.id')
                                ->join('rches', 'rches.id = rch_record_items.rch_id')
                                ->where('rch_records.id', $invoice->invoiceable_id)
                                ->get()
                                ->getResult();
                foreach($rches as $rch) {
                    $totalRchesByUser += $rch->price;
                }
            }
        }


        //list all today medications(drugs) by user from invoice, invoice status = paid

        $medications = [];
        foreach(model(InvoiceModel::class)->where('status', 'paid')->where('DATE(created_at)', date('Y-m-d'))->where('invoiceable_type', 'drugs')->get()->getResult() as $invoice) {
            $medications = model(SaleModel::class)->builder()
                            ->select('drugs.name, sale_items.price, sale_items.quantity, sale_items.created_at')
                            ->join('sale_items', 'sale_items.sale_id = sales.id')
                            ->join('drugs', 'drugs.id = sale_items.drug_id')
                            ->where('sales.id', $invoice->invoiceable_id)
                            ->get()
                            ->getResult();
        }

        $sales = [
            'Medication' => $totalMedicationsByUser,
            'Investigations(Labtest)' => $totalInvestigationsByUser,
            'RCH' => $totalRchesByUser,
            'Surgical' => $totalSurgicalsByUser,
        ];
        // dd($totalSurgicalsByUser, $totalInvestigationsByUser, $totalMedicationsByUser, $totalRchesByUser);
        
        return view('activities', [
            'patients' => $patients,
            'invoices' => $invoices,
            'sales' => $sales,
            'medications' => $medications,
        ]);
    }
}

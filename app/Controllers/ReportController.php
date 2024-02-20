<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvestigationItemModel;
use App\Models\InvoiceModel;
use App\Models\RchRecordItemModel;
use App\Models\RchRecordModel;
use CodeIgniter\HTTP\ResponseInterface;

class ReportController extends BaseController
{
    public function index()
    {
        //
    }

    public function investigation()
    {
            $status = $this->request->getGet('filter_by_status');
            $date_from = $this->request->getGet('from');
            $date_to = $this->request->getGet('to');
    
            $investigationsInvoices = model(InvoiceModel::class)->builder()
                                    ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                                    ->join('patients', 'patients.id = invoices.patient_id')
                                    ->join('users', 'users.id = invoices.user_id')
                                    ->where('invoiceable_type', 'investigations')
                                    ->orderBy('invoices.created_at', 'DESC')
                                    ->get()
                                    ->getResult();

            if($status && !$date_from && !$date_to) {
                $investigationsInvoices = model(InvoiceModel::class)->builder()
                                    ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                                    ->join('patients', 'patients.id = invoices.patient_id')
                                    ->join('users', 'users.id = invoices.user_id')
                                    ->where('invoiceable_type', 'investigations')
                                    ->where('invoices.status', $status)
                                    ->orderBy('invoices.created_at', 'DESC')
                                    ->get()
                                    ->getResult();
            } elseif($date_from && $date_to && !$status) {
                $investigationsInvoices = model(InvoiceModel::class)->builder()
                                    ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                                    ->join('patients', 'patients.id = invoices.patient_id')
                                    ->join('users', 'users.id = invoices.user_id')
                                    ->where('invoiceable_type', 'investigations')
                                    ->where('DATE(invoices.created_at) >=', $date_from)
                                    ->where('DATE(invoices.created_at) <=', $date_to)
                                    ->orderBy('invoices.created_at', 'DESC')
                                    ->get()
                                    ->getResult();
            } elseif($date_from && !$date_to && !$status) {
                $investigationsInvoices = model(InvoiceModel::class)->builder()
                                    ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                                    ->join('patients', 'patients.id = invoices.patient_id')
                                    ->join('users', 'users.id = invoices.user_id')
                                    ->where('invoiceable_type', 'investigations')
                                    ->where('DATE(invoices.created_at) >=', $date_from)
                                    ->orderBy('invoices.created_at', 'DESC')
                                    ->get()
                                    ->getResult();
            } elseif($date_to && !$date_from && !$status) {
                $investigationsInvoices = model(InvoiceModel::class)->builder()
                                    ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                                    ->join('patients', 'patients.id = invoices.patient_id')
                                    ->join('users', 'users.id = invoices.user_id')
                                    ->where('invoiceable_type', 'investigations')
                                    ->where('DATE(invoices.created_at) <=', $date_to)
                                    ->orderBy('invoices.created_at', 'DESC')
                                    ->get()
                                    ->getResult();
            } elseif($status && $date_from && !$date_to) {
                $investigationsInvoices = model(InvoiceModel::class)->builder()
                                    ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                                    ->join('patients', 'patients.id = invoices.patient_id')
                                    ->join('users', 'users.id = invoices.user_id')
                                    ->where('invoiceable_type', 'investigations')
                                    ->where('invoices.status', $status)
                                    ->where('DATE(invoices.created_at) >=', $date_from)
                                    ->orderBy('invoices.created_at', 'DESC')
                                    ->get()
                                    ->getResult();
            } elseif($status && $date_to && !$date_from) {
                $investigationsInvoices = model(InvoiceModel::class)->builder()
                                    ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                                    ->join('patients', 'patients.id = invoices.patient_id')
                                    ->join('users', 'users.id = invoices.user_id')
                                    ->where('invoiceable_type', 'investigations')
                                    ->where('invoices.status', $status)
                                    ->where('DATE(invoices.created_at) <=', $date_to)
                                    ->orderBy('invoices.created_at', 'DESC')
                                    ->get()
                                    ->getResult();
            } elseif($status && $date_from && $date_to) {
                $investigationsInvoices = model(InvoiceModel::class)->builder()
                                    ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                                    ->join('patients', 'patients.id = invoices.patient_id')
                                    ->join('users', 'users.id = invoices.user_id')
                                    ->where('invoiceable_type', 'investigations')
                                    ->where('invoices.status', $status)
                                    ->where('DATE(invoices.created_at) >=', $date_from)
                                    ->where('DATE(invoices.created_at) <=', $date_to)
                                    ->orderBy('invoices.created_at', 'DESC')
                                    ->get()
                                    ->getResult();
            }

            foreach($investigationsInvoices as $invoice) {
                $invoice->items = model(InvestigationItemModel::class)->builder()
                                    ->select('categories.name, categories.price, investigation_items.*')
                                    ->join('categories', 'categories.id = investigation_items.category_id')
                                    ->where('investigation_id', $invoice->invoiceable_id)
                                    ->get()
                                    ->getResult();
            }

            // dd($investigationsInvoices);


            

        return view('reports/investigation', [
            'investigationInvoices' => $investigationsInvoices,
        ]);
    }


    public function rch()
    {
        $date_from = $this->request->getGet('from');
        $date_to = $this->request->getGet('to');
        $status = $this->request->getGet('status');
        
        $rchInvoices = model(InvoiceModel::class)->builder()
                            ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                            ->join('patients', 'patients.id = invoices.patient_id')
                            ->join('users', 'users.id = invoices.user_id')
                            ->where('invoiceable_type', 'rches')
                            ->orderBy('invoices.created_at', 'DESC')
                            ->get()
                            ->getResult();

        if($date_from && $date_to && !$status) {
            $rchInvoices = model(InvoiceModel::class)->builder()
                            ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                            ->join('patients', 'patients.id = invoices.patient_id')
                            ->join('users', 'users.id = invoices.user_id')
                            ->where('invoiceable_type', 'rches')
                            ->where('DATE(invoices.created_at) >=', $date_from)
                            ->where('DATE(invoices.created_at) <=', $date_to)
                            ->orderBy('invoices.created_at', 'DESC')
                            ->get()
                            ->getResult();
        } elseif($date_from && !$date_to && !$status) {
            $rchInvoices = model(InvoiceModel::class)->builder()
                            ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                            ->join('patients', 'patients.id = invoices.patient_id')
                            ->join('users', 'users.id = invoices.user_id')
                            ->where('invoiceable_type', 'rches')
                            ->where('DATE(invoices.created_at) >=', $date_from)
                            ->orderBy('invoices.created_at', 'DESC')
                            ->get()
                            ->getResult();
        } elseif($date_to && !$date_from && !$status) {
            $rchInvoices = model(InvoiceModel::class)->builder()
                            ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                            ->join('patients', 'patients.id = invoices.patient_id')
                            ->join('users', 'users.id = invoices.user_id')
                            ->where('invoiceable_type', 'rches')
                            ->where('DATE(invoices.created_at) <=', $date_to)
                            ->orderBy('invoices.created_at', 'DESC')
                            ->get()
                            ->getResult();
        } elseif($status && !$date_from && !$date_to) {
            $rchInvoices = model(InvoiceModel::class)->builder()
                            ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                            ->join('patients', 'patients.id = invoices.patient_id')
                            ->join('users', 'users.id = invoices.user_id')
                            ->where('invoiceable_type', 'rches')
                            ->where('invoices.status', $status)
                            ->orderBy('invoices.created_at', 'DESC')
                            ->get()
                            ->getResult();
        } elseif($status && $date_from && !$date_to) {
            $rchInvoices = model(InvoiceModel::class)->builder()
                            ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                            ->join('patients', 'patients.id = invoices.patient_id')
                            ->join('users', 'users.id = invoices.user_id')
                            ->where('invoiceable_type', 'rches')
                            ->where('invoices.status', $status)
                            ->where('DATE(invoices.created_at) >=', $date_from)
                            ->orderBy('invoices.created_at', 'DESC')
                            ->get()
                            ->getResult();
        } elseif($status && $date_to && !$date_from) {
            $rchInvoices = model(InvoiceModel::class)->builder()
                            ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                            ->join('patients', 'patients.id = invoices.patient_id')
                            ->join('users', 'users.id = invoices.user_id')
                            ->where('invoiceable_type', 'rches')
                            ->where('invoices.status', $status)
                            ->where('DATE(invoices.created_at) <=', $date_to)
                            ->orderBy('invoices.created_at', 'DESC')
                            ->get()
                            ->getResult();
        } elseif($status && $date_from && $date_to) {
            $rchInvoices = model(InvoiceModel::class)->builder()
                            ->select('invoices.*, patients.first_name, patients.middle_name, patients.last_name, users.name as staff')
                            ->join('patients', 'patients.id = invoices.patient_id')
                            ->join('users', 'users.id = invoices.user_id')
                            ->where('invoiceable_type', 'rches')
                            ->where('invoices.status', $status)
                            ->where('DATE(invoices.created_at) >=', $date_from)
                            ->where('DATE(invoices.created_at) <=', $date_to)
                            ->orderBy('invoices.created_at', 'DESC')
                            ->get()
                            ->getResult();
        }

        foreach($rchInvoices as $invoice) {
            $invoice->items = model(RchRecordItemModel::class)->builder()
                                ->select('rches.name, rches.price, rch_record_items.*')
                                ->join('rches', 'rches.id = rch_record_items.rch_id')
                                ->where('rch_record_items.rch_record_id', $invoice->invoiceable_id)
                                ->get()
                                ->getResult();
        }

        return view('reports/rch', [
            'rches' => $rchInvoices,
        ]);

}
}
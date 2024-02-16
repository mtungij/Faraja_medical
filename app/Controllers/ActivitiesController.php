<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;
use App\Models\SaleModel;
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
        
        return view('activities', [
            'patients' => $patients,
            'invoices' => $invoices,
        ]);
    }
}

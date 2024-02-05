<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;
use CodeIgniter\HTTP\ResponseInterface;

class ReportController extends BaseController
{
    public function index()
    {
        //
    }

    public function investigation()
    {
            $investigations = model(InvoiceModel::class)->builder()->select("inv.categories, invoices.status, invoices.updated_at, inv.surgicals, u.name as staff, p.first_name, p.middle_name, p.last_name")
                                    ->join('investigatigations inv', 'invoices.investigatigation_id = inv.id')
                                    ->join('users u', 'inv.user_id = u.id')
                                    ->join('patients p', 'invoices.patient_id = p.id')
                                    // ->where('invoices.status !=', 'pending')
                                    // ->where('DATE(invoices.updated_at)', date('Y-m-d'))
                                    ->get()
                                    ->getResult();
        return view('reports/investigation', [
            'investigations' => $investigations,
        ]);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;
use App\Models\SaleModel;
use App\Models\TransferModel;
use CodeIgniter\HTTP\ResponseInterface;

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
                            ->paginate(10);
           
        } else {
            $patients = model(TransferModel::class)
                            ->select("transfers.id, transfers.created_at, transfers.status as badge, p.id as patientId, p.first_name, p.middle_name, p.last_name, p.illiness_status as status, f.name, f.department,")
                            ->where('to', session('user_id'))
                            ->join('users f', 'transfers.from = f.id')
                            ->join('patients p', 'transfers.patient_id = p.id')
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
        }

        $staffSales = null;
        if(session('department') == 'pharmacist') {
            $staffSales = model(SaleModel::class)->builder()->select('SUM(si.quantity) as quantity, SUM(si.price) as price, d.name')
                                ->join('sale_items si', 'sales.id = si.sale_id')
                                ->join('drugs d', 'si.drug_id = d.id')
                                ->where('sales.user_id', session('user_id'))
                                ->where('DATE(sales.created_at)', date('Y-m-d'))
                                ->groupBy('si.drug_id')
                                ->get()
                                ->getResult();
                                
        } elseif(session('department') == 'receptionist') {
            $staffSales = model(SaleModel::class)->builder()->select('SUM(si.quantity) as quantity, SUM(si.price) as price, d.name')
                                ->join('sale_items si', 'sales.id = si.sale_id')
                                ->join('drugs d', 'si.drug_id = d.id')
                                ->where('DATE(sales.created_at)', date('Y-m-d'))
                                ->groupBy('si.drug_id')
                                ->get()
                                ->getResult();
        }

        $investigations = [];
        if(session('department') == 'receptionist') {
            $investigations = model(InvoiceModel::class)->builder()->select("inv.categories, inv.surgicals")
                                    ->join('investigatigations inv', 'invoices.investigatigation_id = inv.id')
                                    ->where('invoices.status !=', 'pending')
                                    ->where('invoices.user_id', session('user_id'))
                                    ->where('DATE(invoices.updated_at)', date('Y-m-d'))
                                    ->get()
                                    ->getResult();
        }


        return view('activities', [
            'patients' => $patients,
            'staffSales' => $staffSales,
            'investigations' => $investigations,
        ]);
    }
}

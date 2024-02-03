<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
                            ->paginate(10);
        }

        // dd($patients);
        return view('activities', [
            'patients' => $patients,
        ]);
    }
}

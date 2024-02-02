<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransferModel;
use App\Models\User;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class TransferController extends BaseController
{
    // Controller method to fetch departments
    public function get_departments()
    {
        $departments = model(UserModel::class)->builder()->select('department')->distinct()->get()->getResultArray();
        echo json_encode($departments);
    }

    // Controller method to fetch staff by department
    public function getStaffByDepartment($department)
    {
        $staffs = model(UserModel::class)->where('department', $department)->get()->getResultArray();
        echo json_encode($staffs);
    }

    public function store()
    {
        if(! $this->validate([
            'patient_id' => 'required',
            'from' => 'required',
            'to' => 'required',
        ])){
            return redirect()->back()->withInput()->with('errors', "Please fill all fields");
        }

        $validatedData = $this->validator->getValidated();

        $transfer = model(TransferModel::class)->insert($validatedData);

        return redirect()->back()->with('success', 'Patient transfered successfully');
    }


}

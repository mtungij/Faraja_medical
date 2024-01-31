<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DrugModel;
use App\Models\PatientModel;
use App\Models\TreatmentModel;
use CodeIgniter\HTTP\ResponseInterface;

class SellController extends BaseController
{

    public function  search()
    {
        $patients =model(PatientModel::class)->findAll();
       
        return view('patient/search_patient',['patients'=>$patients]);
    }



    public function index()
    {
        $cart = \Config\Services::cart();
        $patientId = $this->request->getGet('patient_id');
        $treatment = model(TreatmentModel::class)->where('patient_id', $patientId)->orderBy('created_at','DESC')->first();
      
        return view('drug/sell', [
            'cart' => $cart->contents(),
            'treatment' => $treatment,
            'drugs' => model('App\Models\DrugModel')->findAll(),
        ]);
    }

    public function store()
    {
        $cart = \Config\Services::cart();

        $drug = model('App\Models\DrugModel')->find($this->request->getPost('drug_id'));

        $cart->insert([
            'id' => $drug->id,
            'name' => $drug->name,
            'qty' => 1,
            'price' => $drug->sell_price,
        ]);
        return redirect()->back()->with('success', 'Drug added to cart');
    }

    
    public function update()
    {
        $cart = \Config\Services::cart();

        //if quantity is greater than the available stock quantity then return error
        $drug = model('App\Models\DrugModel')->find($this->request->getPost('drug_id'));

        if ($this->request->getPost('qty') > $drug->quantity) {
            return redirect()->back()->with('errors', 'Quantity is greater than available stock');
        }

        $cart->update([
            'rowid' => $this->request->getPost('rowid'),
            'qty' => $this->request->getPost('qty'),
        ]);

        return redirect()->back()->with('success', 'Drug updated');
    }

    public function remove()
    {
        $cart = \Config\Services::cart();

        $cart->remove($this->request->getPost('rowid'));

        return redirect()->back()->with('success', 'Drug removed from cart');
    }

}

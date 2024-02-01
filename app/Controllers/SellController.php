<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DrugModel;
use App\Models\PatientModel;
use App\Models\PaymentModel;
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
        $payments = model(PaymentModel::class)->findAll();
        $patient = model(PatientModel::class)->find($patientId);
        $treatment = model(TreatmentModel::class)->where('patient_id', $patientId)->orderBy('created_at','DESC')->first();
      
        return view('drug/sell', [
            'cart' => $cart->contents(),
            'treatment' => $treatment,
            'patient' => $patient,
            'payments' => $payments,
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

    public function checkout()
    {
        $cart = \Config\Services::cart();

        if(! $this->validate([
            'payment_id' => 'required',
            'patient_id' => 'required',
        ])){
            return redirect()->back()->with('errors', "please fill are required fields");
        }

        //save to sales table
        $sales = model('App\Models\SaleModel')->insert([
            'patient_id' => $this->request->getPost('patient_id'),
            'payment_id' => $this->request->getPost('payment_id'),
            'user_id' => session()->get('user_id'),
        ]); 

        //save cartItems to saleItem table
        foreach ($cart->contents() as $key => $item) {
            model('App\Models\SaleItemModel')->insert([
                'sale_id' => $sales,
                'drug_id' => $item['id'],
                'quantity' => $item['qty'],
                'price' => $item['price'],
            ]);

            //update drug quantity
            $drug = model(DrugModel::class)->find($item['id']);
            $drug->quantity = $drug->quantity - $item['qty'];
            model(DrugModel::class)->save($drug);
        }

        //if patient_id is available to invoice table then update else insert

        $patient = model('App\Models\InvoiceModel')->where('patient_id', $this->request->getPost('patient_id'))->first();

        if ($patient) {
            model('App\Models\InvoiceModel')->update($patient['id'], [
                'sale_id' => $sales,
            ]);
        } else {
            model('App\Models\InvoiceModel')->insert([
                'patient_id' => $this->request->getPost('patient_id'),
                'sale_id' => $sales,
            ]);
        }

        $cart->destroy();

        return redirect()->back()->with('success', 'Checkout successful');
    }

}

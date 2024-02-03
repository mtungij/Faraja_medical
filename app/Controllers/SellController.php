<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DrugModel;
use App\Models\PatientModel;
use App\Models\PaymentModel;
use App\Models\TreatmentModel;
use App\Models\SaleItemModel;
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

        if(session('department') != "admin") {
            $transfer = model(TransferModel::class)->where('patient_id', $patientId)->where('to', session('user_id'))->orderBy('created_at', 'desc')->first();
            if($transfer && $transfer->status == 'new') {
                model(TransferModel::class)->update((int) $transfer->id, ['status' => 'done']);
            }
        }
      
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

    public function todaysales()
    {
        $today = date('Y-m-d');

        $from = $this->request->getGet('from');
        $to = $this->request->getGet('to');
        

        // $product =model(SaleItemModel::class)->builder()->select("SUM(sale_items.quantity) as total,sale_items.created_at")->where("DATE(sale_items.created_at)",date("Y-m-d"))->get()->getResult();

       

        $todaySales = [];
        
        if($from && $to){
            $todaySales = model(SaleModel::class)->builder()
            ->select("sales.*, d.name as drugName, d.buy_price, si.price, si.quantity, u.name as seller , p.first_name as first_name ,p.middle_name, p.last_name as last_name, ")
            ->join("sale_items si","sales.id = si.sale_id")->join("drugs d", "si.drug_id = d.id")
            ->join("patients p" ,"sales.patient_id = p.id")
            ->join("users u", "sales.user_id = u.id")->where("DATE(sales.created_at) BETWEEN '$from' AND '$to'")
            ->get()->getResult();
      
        }else{
            $todaySales = model(SaleModel::class)->builder()
            ->select("sales.*, d.name as drugName, d.buy_price, si.price, si.quantity, u.name as seller , p.first_name as first_name ,p.middle_name, p.last_name as last_name, ")
            ->join("sale_items si","sales.id = si.sale_id")->join("drugs d", "si.drug_id = d.id")
            ->join("patients p" ,"sales.patient_id = p.id")
            ->join("users u", "sales.user_id = u.id")->where("DATE(sales.created_at)", date("Y-m-d"))
            ->get()->getResult();
        }

        // dd($todaySales);

        $total_product_sold= 0;
        $total_sales =0;
        $total_profit = 0;

        if(count($todaySales)> 0){

            foreach ($todaySales as  $saleitem) {
                $total_product_sold += ($saleitem->quantity);
                $total_sales += ($saleitem->quantity * $saleitem->price);
                $total_profit += (($saleitem->price -  $saleitem->buy_price)* $saleitem->quantity);
            }

        }

       
        
        return view("drug/today_sale",["todaySales" => $todaySales  ,"total_product_sold" => $total_product_sold ,"total_sales" => $total_sales ,"total_profit" => $total_profit]);

    }

    public function productsold()
        {
         



            $from = $this->request->getGet('from');
            $to = $this->request->getGet('to');
            $drug = [];
            if($from && $to){
                $drug=model(DrugModel::class)->builder()->select("drugs.name,SUM(s.quantity) as quantity, s.price as price")
                ->join("sale_items as s","drugs.id = s.drug_id")->where("DATE(s.created_at) BETWEEN '$from' AND '$to'")
                ->groupBy("drugs.name")
                ->get()->getResult();
            }else{

                $drug=model(DrugModel::class)->builder()->select("drugs.name,SUM(s.quantity) as quantity, s.price as price")
                ->join("sale_items as s","drugs.id = s.drug_id")->where("DATE(s.created_at)", date("Y-m-d"))
                ->groupBy("drugs.name")
                ->get()->getResult();
            }




            $total_product_sold= 0;
            $total_sales =0;

            if(count($drug)> 0){

                foreach ($drug as  $saleitem) {
                    $total_product_sold += ($saleitem->quantity);
                    $total_sales += ($saleitem->quantity * $saleitem->price);
                }

            }


        return view("drug/drugsold",["drug" => $drug ,"total_product_sold" => $total_product_sold ,"total_sales" => $total_sales    ]);

        }


        
    

}

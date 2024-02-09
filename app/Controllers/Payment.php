<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LabtestModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PaymentModel;

class Payment extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $setting =model(PaymentModel::class);
        $data = [
            'payment' =>  $setting->paginate(10),
            'pager' =>  $setting->pager,
        ];
       
        // dd($data);
        return view("setting/payment",$data);
    }


    public function store()
    {

        if( ! $this->validate([
            'name' => 'required',
            'number' => 'required',
        
    
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
    //  dd($validatedData); 
    
    // $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    // $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);
    
    $paymentExist =model(PaymentModel::class)->where('name',$validatedData['name'])->first();

    if($paymentExist){

         return redirect()->back()->withInput()->with('errors','Payment method you are trying to insert existed');

    }else{
           
        model(PaymentModel::class)->insert($validatedData );
    
       
        return redirect()->back()->with('success','data added successfully');

    }
    

    }


    public function indexes($id)
    {
        $payment=model(PaymentModel::class)->find($id);
        // dd($payment);
        return view('setting/edit_method.php',['payment'=>$payment]);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $number   = $this->request->getPost('number');
       
        
        $data = [
            'name'        => $name,
            'number'     => $number,
        ];

        // dd($data);

          
        $model = model(PaymentModel::class);
        $result = $model->update($id, $data);
        if($result) {
            return redirect('payment_method')->with('success','Lab Test updated Successfully');
        } else {
            return redirect('')->back()->with('errors','an error occurred');
        }

    }

    public function delete($id)
    {
        $model = model(PaymentModel::class);
        $result = $model->delete($id);
        if($result) {
            return redirect('payment_method')->with('success','payment deleted Successfully');
        } else {
            return redirect('')->back()->with('errors','an error occurred');
        }

    }

}
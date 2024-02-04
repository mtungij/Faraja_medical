<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DrugModel;
use App\Models\PatientModel;
use CodeIgniter\HTTP\ResponseInterface;

class DrugController extends BaseController
{
    public function index()
    {
        $saleprice = model(DrugModel::class)->selectSum("sell_price", 'total')->get()->getRow();
        $buyprice =model(DrugModel::class)->selectSum('buy_price','total_buy')->get()->getRow();
        $stock = model(DrugModel::class)->selectSum('quantity','stock')->get()->getRow();
       
        // dd($buyprice);
    $drug =model(DrugModel::class)->findAll();
    return view ('drug/index.php',['drug'=> $drug,'saleprice' => $saleprice,'buyprice' => $buyprice,'stock'=> $stock]);
    }

    public function store()
    {
        if( !$this->validate([
            'name' => 'required',
            'unit'=> 'required',
            'quantity' => 'required',
             'buy_price' => 'required',
             'sell_price' => 'required',
             'stock_limit' => 'required',
             'user_id' =>'required',
        ])){
                       
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
     $validatedData = $this->validator->getValidated();
    
    //  dd($validatedData); 
    
    // $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
    // $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);
    
    
    
     model(DrugModel::class)->insert($validatedData );
    
       
       return redirect()->back()->with('success','data added successfully');
        
    }

    public function empty_products()

{
   


    $products = model(DrugModel::class)->where("quantity",0)->get()->getResult(); 
  

    return view("reports/empty_medicine",["products"=> $products]);
    

  
}


}




    

    




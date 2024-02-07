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
    
    $validatedData['buy_price'] = str_replace(',', '', $validatedData['buy_price']);
    $validatedData['sell_price'] = str_replace(',', '', $validatedData['sell_price']);
    
    
    
     model(DrugModel::class)->insert($validatedData );
    
       
       return redirect()->back()->with('success','medicine added successfully');
        
    }

    public function empty_products()

{
   


    $products = model(DrugModel::class)->where("quantity",0)->get()->getResult(); 
   $stock_limit = model(DrugModel::class)->findAll();

  

    return view("reports/empty_medicine",["products"=> $products]);
    

  
}

public function edit ($id)

{
   
    $drug = model(DrugModel::class)->find($id);


   
    return view('drug/edit',['drug'=>$drug]);
}

public function update()
{
    $id =$this->request->getPost('id');
    $name = $this->request->getPost('name');
    $unit = $this->request->getPost('unit');
    $quantity = $this->request->getPost('quantity');
    $stock_limit = $this->request->getPost('stock_limit');
    $buy_price= $this->request->getPost('buy_price');
    $sell_price= $this->request->getPost('sell_price');
    $unit= $this->request->getPost('unit');
   
    
    $data = [
        'name' => $name,
        'quantity'=> $quantity,
        'stock_limit'=> $stock_limit,
        'buy_price'=> $buy_price,
        'sell_price'=> $sell_price,
        'unit'=> $unit,
       
    
    ];

    $model = new DrugModel();
    
    $result=$model->update($id,$data);
    if ($result) {
        return redirect('drugs')->with('success','product updated successfully');
    } else {
        return redirect()->back()->withInput()->with('erros','please fill all field');
    }
}

public function delete($id)
{
    $model = new DrugModel();
    $model->delete($id);
    return redirect('drugs')->with('success','product deleted successfully');

}

}




    

    




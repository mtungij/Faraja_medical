<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LabtestModel;

class LabtestController extends BaseController
{
    public function index()
    {
  $test = model("LabtestModel"::class)->orderBy('created_at', 'desc')->find();
// Replace 'column_name' with the actual column you want to use for sorting.
// 'asc' stands for ascending order. You can also use 'desc' for descending order.

// dd($test);
return view("setting/labtest", ['test' => $test]);

        
}

public function store()
{
    if( !$this->validate([
        'name' => 'required',
        'price' => 'required',
    

    ])){
                   
        return redirect()->back()->withInput()->with('erros','please fill all field');     
}

 $validatedData = $this->validator->getValidated();


 $labtestExist = model(LabtestModel::class)->where('name',$validatedData['name'])->first();

 if(!$labtestExist){

//  dd($validatedData); 

// $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
// $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);



 model(LabtestModel::class)->insert($validatedData );

   
   return redirect()->back()->with('success','Investigation added successfully');
}

else{
    return redirect()->back()->withInput()->with('errors','Investigation Name Already Exist');

}
}

public function Update($id)
{
   $payment=model(LabtestModel::class)->find($id);
//    dd($payment);
    return view('payment/labtest_edit',['payment'=>$payment]);
}

public function insert_update()
{

    $id = $this->request->getPost('id');
    $name = $this->request->getPost('name');
    $price = $this->request->getPost('price');

    $data = [

        'name'=> $name, 
        'price'=> $price

    ];

    // dd($data);

       $model = model(LabtestModel::class);
    $result = $model->update($id, $data);
    if($result) {
        return redirect('tests_settings')->with('success','Investigation updated Successfully');
    } else {
        return redirect('')->back()->with('errors','an error occurred');
    }



}

}
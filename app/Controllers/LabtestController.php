<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LabtestModel;

class LabtestController extends BaseController
{
    public function index()
    {
    $test= model("LabtestModel"::class)->findAll();

    // dd($test);
        return view("setting/labtest",['test'=>$test]);

        
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

//  dd($validatedData); 

// $validatedData['expenses'] = str_replace(',', '', $validatedData['expenses']);
// $validatedData['amount'] = str_replace(',', '', $validatedData['amount']);



 model(LabtestModel::class)->insert($validatedData );

   
   return redirect()->back()->with('success','data added successfully');
}


}
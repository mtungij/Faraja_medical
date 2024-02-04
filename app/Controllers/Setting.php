<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use CodeIgniter\HTTP\ResponseInterface;

class Setting extends BaseController
{
    public function index()
    {
        $setting =model(SettingModel::class);
         $settings=$setting->first();

         return view("setting/general",["settings"=>$settings]);
    }

    public function create()
    {
        
       if(! $this->validate([
        'center_name' => 'required',
        'address'=> 'required',
        'phone'=> 'required',
        'location'=>'required',
        'email'=> 'required',
        // 'logo'=>'required',
        
       ])){
           return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
       }

       $validatedData = $this->validator->getValidated();

    //    dd($validatedData);

      
     
    //    dd($validatedData);

     $id=$this->request->getPost('id');
    $setting=$this->validator->getvalidated();
   model(SettingModel::class)->update($id,$setting);




       
       return redirect()->back()->with('success',' successfully settings Updated');
    }

    
}




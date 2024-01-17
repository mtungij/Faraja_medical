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
         $settings=$setting->findAll();

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

       model(SettingModel::class)->save([ ...$validatedData]);

       
       return redirect()->back()->with('successcreate','Order added successfully');
    }

}




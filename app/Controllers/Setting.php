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
}

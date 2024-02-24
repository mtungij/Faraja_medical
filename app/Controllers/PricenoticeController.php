<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RchesModel;
use App\Models\SurgicalModel;
use App\Models\LabtestModel;
use App\Models\DrugModeL;
use CodeIgniter\HTTP\ResponseInterface;

class PricenoticeController extends BaseController
{
    public function surgical()
    {
          $surgical = model(SurgicalModel::class)->paginate(10);

        //   dd($surgical);

          return view('pricenotice/surgical',['surgical'=> $surgical]);
    }

    public function investigation()
    {
        $investigation = model(LabtestModel::class)->paginate(10);

      
        return view('pricenotice/investigation',['investigation'=> $investigation]);
    }

    public function rch ()
    {
        $rch = model(RchesModel::class)->paginate(10);

        return view('pricenotice/rhc',['rch'=> $rch]);
    }

    public function medicine()
    {
        $medicine = model(DrugModel::class)->paginate(10);


      

        return view('pricenotice/medicine',['medicine'=> $medicine]);
    }
}

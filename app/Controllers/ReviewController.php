<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\ReviewModel;
use CodeIgniter\HTTP\ResponseInterface;

class ReviewController extends BaseController
{
    public function index($id)
    {

     $patient = model(PatientModel::class)->find( $id );

      $reviews = model(ReviewModel::class)->builder()->select("*")
                                          ->join('users', 'reviews.user_id = users.id')
                                          ->where('patient_id', $id)->orderBy('reviews.id', 'DESC')
                                          ->get()->getResult();

        return view("patient/review_system", ["patient"=> $patient, 'reviews' => $reviews ] );
    }

    public function store()
      {
        if( !$this->validate([
            'desc' => 'required',
            'patient_id' => 'required',
            'user_id'=> 'required',
        ])){
            return redirect()->back()->withInput()->with('erros','please fill all field');     
    }
    
      $validatedData = $this->validator->getValidated();
    
       model(ReviewModel::class)->insert($validatedData );
       return redirect()->back()->with("good","data saved successfully");

      }    
}

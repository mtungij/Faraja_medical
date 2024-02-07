<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RchesModel;
use CodeIgniter\HTTP\ResponseInterface;

class Rches extends BaseController
{
    public function index()
    {

        return view('rches/index', [
            'rches' => model(RchesModel::class)->paginate(10),
        ]);
    }

    public function create()
    {
        model('RchesModel')->insert([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price')
        ]);

        return redirect()->back()->with('success', 'Data has been saved');
    }

    public function update()
    {
        model('RchesModel')->save([
            'id' => $this->request->getPost('id'),
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
        ]);

        return redirect()->back()->with('success', 'Data updated successfully!');
    }
}

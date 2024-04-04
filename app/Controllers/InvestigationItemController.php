<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvestigationItemModel;
use CodeIgniter\HTTP\ResponseInterface;

class InvestigationItemController extends BaseController
{
    public function cancelItem(int $id)
    {
        model(InvestigationItemModel::class)->delete($id);
        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitsModel;
use CodeIgniter\HTTP\ResponseInterface;

class Units extends BaseController
{
    public function index()
    {
        $model = new UnitsModel();

        $data = [
            'units' => $model->getUnitsWithDetails(),
            'title' => 'Units',
        ];
        return view('units/index', $data);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LandlordsModel;
use CodeIgniter\HTTP\ResponseInterface;

class Landlords extends BaseController
{
    public function index()
    {
        $model = model(LandlordsModel::class);
        $data = [
            'landlords' => $model->getLandlords(),
            'title' => 'Landlords',

        ];

        return view('landlords/index', $data);
    }
}

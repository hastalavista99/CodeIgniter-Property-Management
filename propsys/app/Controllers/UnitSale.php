<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitSaleModel;
use CodeIgniter\HTTP\ResponseInterface;

class UnitSale extends BaseController
{
    public function index()
    {
        $model = new UnitSaleModel();
        $data = [
            'title' => 'Unit Sale',
            'units' => $model->getUnitsForSale()
        ];
        return view('units/sale', $data);
    }
}

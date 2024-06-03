<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PropertySaleModel;
use CodeIgniter\HTTP\ResponseInterface;

class PropertySale extends BaseController
{
    public function index()
    {
        $model = new PropertySaleModel();

        $data = [
            'title' => 'Properties',
            'properties' => $model->getPropertiesForSale()
        ];
        return view('properties/sale', $data);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PropertySaleModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class PropertySale extends BaseController
{
    public function index()
    {
        $model = new PropertySaleModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'title' => 'Properties',
            'properties' => $model->getPropertiesForSale(),
            'userInfo' => $userInfo
        ];
        return view('properties/sale', $data);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitSaleModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UnitSale extends BaseController
{
    public function index()
    {
        $model = new UnitSaleModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'title' => 'Unit Sale',
            'units' => $model->getUnitsForSale(),
            'userInfo' => $userInfo
        ];
        return view('units/sale', $data);
    }
}

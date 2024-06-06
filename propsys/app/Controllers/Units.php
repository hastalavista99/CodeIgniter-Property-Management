<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitsModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Units extends BaseController
{
    public function index()
    {
        $model = new UnitsModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'units' => $model->getUnitsWithDetails(),
            'title' => 'Units',
            'userInfo' => $userInfo
        ];
        return view('units/index', $data);
    }
}

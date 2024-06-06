<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TenantModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Tenants extends BaseController
{
    public function index()
    {
        $model = new TenantModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'tenants' => $model->getTenants(),
            'title' => 'Tenants',
            'userInfo' => $userInfo
        ];
        return view('tenants/index', $data);
    }
}

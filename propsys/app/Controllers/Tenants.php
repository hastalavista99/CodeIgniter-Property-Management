<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TenantModel;
use CodeIgniter\HTTP\ResponseInterface;

class Tenants extends BaseController
{
    public function index()
    {
        $model = new TenantModel();
        $data = [
            'tenants' => $model->getTenants(),
            'title' => 'Tenants'
        ];
        return view('tenants/index', $data);
    }
}

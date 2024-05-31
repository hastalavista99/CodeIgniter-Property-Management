<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Tenants extends BaseController
{
    public function index()
    {
        return view('tenants/index');
    }
}

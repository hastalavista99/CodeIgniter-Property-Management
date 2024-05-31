<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LandlordsModel;
use CodeIgniter\HTTP\ResponseInterface;

class Landlords extends BaseController
{
    public function index()
    {
        return view('landlords/index');
    }
}

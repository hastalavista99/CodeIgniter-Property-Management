<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Properties extends BaseController
{
    public function index()
    {
        return view('properties/index');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitsModel;
use App\Models\UserModel;
use App\Models\PropertiesModel;
use CodeIgniter\HTTP\ResponseInterface;

class Units extends BaseController
{
    public function index()
    {
        $model = new UnitsModel();
        $userModel = new UserModel();
        $property = new PropertiesModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'units' => $model->getUnitsWithDetails(),
            'title' => 'Units',
            'userInfo' => $userInfo,
            'properties' => $property->findAll()
        ];
        return view('units/index', $data);
    }

    public function insertUnit()
    {
        helper('form');

        $property = $this->request->getPost('property');
        $name = $this->request->getPost('name');
        $unitNo = $this->request->getPost('unit_no');
        $description = $this->request->getPost('description');
        $status = $this->request->getPost('status');


    }
}

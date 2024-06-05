<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LandlordsModel;
use CodeIgniter\HTTP\ResponseInterface;

class Landlords extends BaseController
{
    public function index()
    {
        $model = model(LandlordsModel::class);
        $data = [
            'landlords' => $model->getLandlords(),
            'title' => 'Landlords',

        ];

        return view('landlords/index', $data);
    }

    public function insertLandlord()
    {
        helper('form');

        // save the landlord
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone_number');

        $data = [
            'name' => $name,
            'phone_number' => $phone,
            'email' => $email
        ];

        $model = new LandlordsModel();
        $query = $model->save($data);
        if($query) {
            return redirect()->back()->with('fail', 'Saving Landlord Failed');
        } else {
            return redirect()->back()->with('success', 'Saved Landlord');
        }

    }
}

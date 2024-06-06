<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LandlordsModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Landlords extends BaseController
{
    public function index()
    {
        $model = model(LandlordsModel::class);
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'landlords' => $model->getLandlords(),
            'title' => 'Landlords',
            'userInfo' => $userInfo

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

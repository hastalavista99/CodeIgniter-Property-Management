<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LandlordsModel;
use App\Models\PropertiesModel;
use App\Models\UserModel;
use App\Libraries\Hash;
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
        $authModel = new UserModel();
        new \App\Libraries\Hash();

        // Generate random password
        $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $pass = substr(str_shuffle($alpha_numeric), 0, 8);

        // Initialize username with the user's name
        $usernameBase = strtolower(preg_replace('/\s+/', '', $name)); // Remove spaces and convert to lowercase
        $username = $usernameBase;

        //in case of same username
        $counter = 1;
        while ($authModel->where('user_name', $username)->first()) {
            $username = $usernameBase . $counter;
            $counter++;
        }

        $authData = [
            'role' => 'landlord',
            'name' => $name,
            'user_name' => $username,
            'user_email' => $email,
            'user_password' => Hash::encrypt($pass),
            'user_mobile' => $phone
        ];



        $query = $model->save($data);
        if (!$query) {
            return redirect()->back()->with('fail', 'Saving Landlord Failed');
        } else {
            $authModel->save($authData);

            $msg = "Hi, $username \n Login to https://rent.macrobuy.co.ke to view your transactions.\nUsername: $name\nPassword: $pass; \n Regards \n Property Manager";

            $sms = new SendSMS();

            $sms->sendSMS($phone, $msg);
            return redirect()->back()->with('success', 'Created Landlord Successfully');
        }
    }


    public function show()
    {
        $model = new LandlordsModel();
        $userModel = new UserModel();
        $properties = new PropertiesModel();

        $id = $this->request->getGet('landlord');
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $landlord = $model->find($id);
        $properties = $properties->where('landlord_id', $id)->findAll();

        $data = [
            'landlord' => $landlord,
            'title' => 'View Landlord',
            'userInfo' => $userInfo,
            'properties' => $properties

        ];
        return view('landlords/view', $data);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountsModel;
use App\Models\PaymentsModel;
use App\Models\RentModel;
use App\Models\UtilitiesModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Accounts extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $data = [
            'title' => 'Accounts',
            'userInfo' => $userInfo
            
        ];

        return view('accounts/index', $data);
    }

    public function charts()
    {
        $model = new AccountsModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'title' => 'Chart Of Accounts',
            'accounts' => $model->getAccounts(),
            'userInfo' => $userInfo
        ];

        return view('accounts/accounts_chart', $data);
    }

    public function approvalList()
    {

        $data = [
            'title' => 'Approval'
        ];
        return view('accounts/approval', $data);
    }

    public function payments()
    {
        $model = new PaymentsModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $data = [
            'title' => 'Payments',
            'payments' => $model->getPayments(),
            'userInfo' => $userInfo
        ];

        return view('accounts/payments', $data);
    }

    public function tenants()
    {
        $rentModel = new RentModel();
        $utilitiesModel = new UtilitiesModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $data = [
            'title' => 'Tenants',
            'rents' => $rentModel->getRent(),
            'utilities' => $utilitiesModel->getUtilities(),
            'userInfo' => $userInfo
        ];
        return view('accounts/tenants', $data);
    }

    public function close()
    {
        $data = [
            'title' => 'Close Period'
        ];
        return view('accounts/close_period', $data);
    }
}

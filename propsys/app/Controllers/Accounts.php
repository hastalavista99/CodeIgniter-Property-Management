<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountsModel;
use App\Models\PaymentsModel;
use App\Models\RentModel;
use App\Models\UtilitiesModel;
use CodeIgniter\HTTP\ResponseInterface;

class Accounts extends BaseController
{
    public function index()
    {
       
        $data = [
            'title' => 'Accounts',
            
        ];

        return view('accounts/index', $data);
    }

    public function charts()
    {
        $model = new AccountsModel();

        $data = [
            'title' => 'Chart Of Accounts',
            'accounts' => $model->getAccounts()
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
        $data = [
            'title' => 'Payments',
            'payments' => $model->getPayments()
        ];

        return view('accounts/payments', $data);
    }

    public function tenants()
    {
        $rentModel = new RentModel();
        $utilitiesModel = new UtilitiesModel();
        $data = [
            'title' => 'Tenants',
            'rents' => $rentModel->getRent(),
            'utilities' => $utilitiesModel->getUtilities()
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

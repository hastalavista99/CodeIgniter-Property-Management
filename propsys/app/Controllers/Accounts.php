<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountsModel;
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
}

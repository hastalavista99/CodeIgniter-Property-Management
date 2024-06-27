<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BillingModel;
use App\Models\PropertiesModel;
use App\Models\RentModel;
use App\Models\TenantModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Payments extends BaseController
{
    public function index()
    {
        $tenantModel = new TenantModel();
        $propertyModel = new PropertiesModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'properties' => $propertyModel->findAll(),
            'title' => 'Rent Payment',
            'userInfo' => $userInfo
        ];

        return view('payments/rent', $data);
    }

    public function rentReceive()
    {
        helper(['form', 'url']);

        // Retrieve form data
        $tenant = $this->request->getPost('tenantSelect');
        $month = $this->request->getPost('rentMonth');
        $rent = $this->request->getPost('rentSelect');

        // Debugging: Log or display the received data
        // You can use log_message('debug', 'message') to log or use var_dump() to display
        log_message('debug', 'Tenant: ' . $tenant);
        log_message('debug', 'Month: ' . $month);
        log_message('debug', 'Rent: ' . $rent);

        // Check if any of the required fields are empty
        if (empty($tenant) || empty($month) || empty($rent)) {
            return redirect()->back()->with('fail', 'All fields are required');
        }

        // Prepare data for insertion
        $rentModel = new RentModel();
        $data = [
            'tenant_id' => $tenant,
            'month' => $month,
            'year' => '2024',
            'rent_amount' => $rent
        ];

        // Insert data
        $query = $rentModel->save($data);

        // Redirect based on query result
        if (!$query) {
            return redirect()->back()->with('fail', 'Rent Payment Failed');
        } else {
            return redirect()->back()->with('success', 'Rent Paid Successfully');
        }
    }
}

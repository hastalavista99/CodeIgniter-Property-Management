<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BillingModel;
use App\Models\LandlordsModel;
use App\Models\UnitsModel;
use App\Models\UserModel;
use App\Models\PropertiesModel;
use App\Models\TenantModel;
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

         // Initialize status fields
    $available = 'No';
    $reserved = 'No';
    $occupied = 'No';

    // Set the appropriate status field based on the submitted status
    switch ($status) {
        case 'reserved':
            $reserved = 'Yes';
            break;
        case 'occupied':
            $occupied = 'Yes';
            break;
        case 'available':
            $available = 'Yes';
            break;
    }

        $data = [
            'property_id' => $property,
            'unit_name' => $name,
            'unit_number' => $unitNo,
            'description' => $description,
            'available' => $available,
            'reserved' => $reserved,
            'occupied' => $occupied
        ];

        $model = new UnitsModel();
        $query = $model->save($data);

        if (!$query) {
            return redirect()->back()->with('fail', 'Saving Unit Failed');
        } else {
            return redirect()->back()->with('success', 'Saved Unit Successfully');
        }

    }

    public function view()
    {
        $id = $this->request->getGet('unit');
        $unitModel = new UnitsModel();
        $propertyModel = new PropertiesModel();
        $billModel = new BillingModel();
        $landlordModel = new LandlordsModel();
        $tenantModel = new TenantModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $tenant = $tenantModel->where('unit_id', $id)->first();
        $ten = $tenant ? $tenant['name'] : 'N/A';

        $unit = $unitModel->find($id);

        $propId = $unit['property_id'];
        $bills = $billModel->where('unit_id', $id)->first();

        $property = $propertyModel->find($propId);
        $landlordId = $property['landlord_id'];
        $landlord = $landlordModel->find($landlordId);

        $data = [
            'unit' => $unit,
            'title' => $unit['unit_name'],
            'tenant' => $ten,
            'property' => $property,
            'landlord' => $landlord,
            'userInfo' => $userInfo,
            'bills' => $bills
        ];

        return view('units/view', $data);
    }

    public function billPage()
    {
        helper(['form', 'url']);
        $model = new UnitsModel();
        $userModel = new UserModel();
        $property = new PropertiesModel();
        $billModel = new BillingModel();

        $unitId = $this->request->getGet('unit');
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $bills = $billModel->where('unit_id', $unitId)->first();

        $data = [
            'unit_id' => $unitId,
            'title' => 'Bills',
            'userInfo' => $userInfo,
            'bills' => $bills,
        ];
        return view('units/bills', $data);
    }

    public function setBills()
    {
        helper(['form', 'url']);

        $rules = [
            'rent' => [
                'rules' => 'required|numeric|greater_than[0]',
                'label' => 'Rent',
                'errors' => [
                    'required' => 'Please provide a value for rent.',
                    'numeric' => 'Value for rent should be a number',
                    'greater_than' => 'Rent value should not be 0'
                ]
            ],
            'deposit' => [
                'rules' => 'required|numeric',
                'label' => 'Deposit',
                'errors' => [
                    'required' => 'Please provide a value for deposit',
                    'numeric' => 'Value for deposit should be a number'
                ]
            ],
            'commission' => [
                'rules' => 'required|numeric',
                'label' => 'Commission',
                'errors' => [
                    'required' => 'Please enter value for commission',
                    'numeric' => 'Commission value should be a number',
                ],

            ],
            'water' => [
                'rules' => 'required|numeric',
                'label' => 'Water Deposit',
                'errors' => [
                    'required' => 'You must provide a value for water deposit',
                    'numeric' => 'Values must be numeric',
                ],
            ],
            'electricity' => [
                'rules' => 'required|numeric',
                'label' => 'Electricity Deposit',
                'errors' => [
                    'required' => 'Please provide value for electricity deposit',
                    'numeric' => 'Values must be numeric',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $data["validated"] = $this->validator;
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $billModel = new BillingModel();

        $unitId = $this->request->getGet('unit_id');
        $rent = $this->request->getPost('rent');
        $commission = $this->request->getPost('commission');
        $deposit = $this->request->getPost('deposit');
        $water = $this->request->getPost('water');
        $electricity = $this->request->getPost('electricity');
        $service = $this->request->getPost('service');

        $data = [
            'unit_id' => $unitId,
            'commission' => $commission,
            'deposit' => $deposit,
            'rent' => $rent,
            'service_charge' => $service,
            'water_deposit' => $water,
            'electricity_deposit' => $electricity
        ];

        $query = $billModel->save($data);

        if(!$query) {
            return redirect()->to('rent/units')->with('fail', 'Something went wrong, try again later');
        }

        return redirect()->to('rent/units')->with('success', 'Bills set successfully!!');
    }
}

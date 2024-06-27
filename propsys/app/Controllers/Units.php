<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
        $landlordModel = new LandlordsModel();
        $tenantModel = new TenantModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $tenant = $tenantModel->where('unit_id', $id)->first();
        $ten = $tenant ? $tenant['name'] : 'N/A';

        $unit = $unitModel->find($id);

        $propId = $unit['property_id'];

        $property = $propertyModel->find($propId);
        $landlordId = $property['landlord_id'];
        $landlord = $landlordModel->find($landlordId);

        $data = [
            'unit' => $unit,
            'title' => $unit['unit_name'],
            'tenant' => $ten,
            'property' => $property,
            'landlord' => $landlord,
            'userInfo' => $userInfo
        ];

        return view('units/view', $data);
    }
}

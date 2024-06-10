<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PropertiesModel;
use App\Models\UnitsModel;
use App\Models\UserModel;
use App\Models\LandlordsModel;
use App\Models\PropertyType;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class Properties extends BaseController
{
    public function index()
    {

        $propertyModel = new PropertiesModel();
        $unitModel = new UnitsModel();
        $userModel = new UserModel();
        $landlord = new LandlordsModel();
        $type = new PropertyType();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $data = [
            'title' => 'Properties',
            'properties' => [],
            'userInfo' => $userInfo,
            'landlords' => $landlord->findAll(),
            'types' => $type->findAll()
        ];
    

        $properties = $propertyModel->getProperties();
        foreach ($properties as $property) {
            $propertyId = $property['property_id'];
            $property['vacant_units'] = $unitModel->getVacantUnits($propertyId);
            $property['occupied_units'] = $unitModel->getOccupiedUnits($propertyId);
            $property['total_units'] = $unitModel->getTotalUnits($propertyId);

            $data['properties'][] = $property;
        }

        return view('properties/index', $data);
    }

    public function insertProperty()
    {
        helper(['form', 'url']);

        $name = $this->request->getPost('name');
        $location = $this->request->getPost('location');
        $landlord = $this->request->getPost('landlord');
        $type = $this->request->getPost('type');
        $active = $this->request->getPost('active');

        $active_status = $active ? 'active' : 'inactive';

        $data = [
            'name' => $name,
            'location' => $location,
            'landlord_id' => $landlord,
            'type_id' => $type,
            'active_status' => $active_status
        ];

        $model = new PropertiesModel();
        $query = $model->save($data);

        if(!$query) {
            return redirect()->back()->with('fail', 'Saving Property Failed');
        } else {
            return redirect()->back()->with('success', 'Saved Property Successfully');
        }


    }
}

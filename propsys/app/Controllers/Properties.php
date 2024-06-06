<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PropertiesModel;
use App\Models\UnitsModel;
use App\Models\UserModel;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class Properties extends BaseController
{
    public function index()
    {

        $propertyModel = new PropertiesModel();
        $unitModel = new UnitsModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $data = [
            'properties' => [],
            'userInfo' => $userInfo
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
}

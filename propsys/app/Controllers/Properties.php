<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PropertiesModel;
use App\Models\UnitsModel;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class Properties extends BaseController
{
    public function index()
    {

        $propertyModel = new PropertiesModel();
        $unitModel = new UnitsModel();
        $data['properties'] = [];

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

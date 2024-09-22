<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PropertiesModel;
use App\Models\PropertySaleModel;
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

        if (!$query) {
            return redirect()->back()->with('fail', 'Saving Property Failed');
        } else {
            return redirect()->back()->with('success', 'Saved Property Successfully');
        }
    }

    public function show()
    {
        $name = $this->request->getGet('property');
        $userModel = new UserModel();
        $landlordModel = new LandlordsModel();
        $unitsModel = new UnitsModel();
        $property = new PropertiesModel();
        $each = $property->where('name', $name)->first();
        $propertyId = $each['id'];
        $landlordId = $each['landlord_id'];
        $landlord = $landlordModel->find($landlordId);
        $units = $unitsModel->where('property_id', $propertyId)->countAllResults();
        $show = $property->find($propertyId);
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'title' => $name,
            'property' => $show,
            'landlord' => $landlord,
            'units' => $units,
            'userInfo' => $userInfo
        ];
        return view('properties/show', $data);
    }

    public function myPropertiesRent()
    {
        $name = $this->request->getGet('landlord');

        if (!$name) {
            // Handle missing landlord name error
            return redirect()->back()->with('error', 'Landlord name is required.');
        }

        $landlordModel = new LandlordsModel();
        $propertiesModel = new PropertiesModel();
        $unitsModel = new UnitsModel();
        $userModel = new UserModel();

        // Fetch landlord by name
        $landlord = $landlordModel->where('name', $name)->first(); // Use 'first()' instead of 'findAll()' for a single result

        if (!$landlord) {
            // Handle landlord not found
            return redirect()->back()->with('error', 'Landlord not found.');
        }

        $landlordId = $landlord['id']; // Adjust according to your database structure

        // Fetch user info for logged-in user
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        if (!$userInfo) {
            // Handle user not found
            return redirect()->back()->with('error', 'User not found.');
        }

        // Fetch properties for the landlord
        $properties = $propertiesModel->where('landlord_id', $landlordId)->findAll();

        $data = [
            'title' => 'My Properties',
            'properties' => [],
            'userInfo' => $userInfo
        ];

        if (!empty($properties)) {
            $propertyIds = array_column($properties, 'id');

            // Optimize: Fetch all unit data for these properties in one go
            $unitsData = $unitsModel->getUnitsByPropertyIds($propertyIds);

            foreach ($properties as &$property) { // Use reference to directly modify $properties array
                $propertyId = $property['id'];

                $property['vacant_units'] = $unitsData[$propertyId]['vacant_units'] ?? 0;
                $property['occupied_units'] = $unitsData[$propertyId]['occupied_units'] ?? 0;
                $property['total_units'] = $unitsData[$propertyId]['total_units'] ?? 0;

                $data['properties'][] = $property;
            }
        }

        return view('properties/my_rent', $data);
    }

    public function myPropertiesSale()
    {
        $name = $this->request->getGet('landlord');

        if (!$name) {
            // Handle missing landlord name error
            return redirect()->back()->with('error', 'Something went wrong. Please sign in again.');
        }

        $landlordModel = new LandlordsModel();
        $propertiesModel = new PropertySaleModel();
        $userModel = new UserModel();

        // Fetch landlord by name
        $landlord = $landlordModel->where('name', $name)->first(); // Use 'first()' instead of 'findAll()' for a single result

        if (!$landlord) {
            // Handle landlord not found
            return redirect()->back()->with('error', 'Landlord not found.');
        }

        $landlordId = $landlord['id']; // Adjust according to your database structure

        // Fetch user info for logged-in user
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        if (!$userInfo) {
            // Handle user not found
            return redirect()->back()->with('error', 'User not found.');
        }

        // Fetch properties for the landlord
        $properties = $propertiesModel->where('landlord_id', $landlordId)->findAll();

        $data = [
            'title' => 'My Properties',
            'properties' => $properties,
            'userInfo' => $userInfo,
            'landlord' => $landlord['name']
        ];
        return view('properties/my_sale', $data);
    }

}

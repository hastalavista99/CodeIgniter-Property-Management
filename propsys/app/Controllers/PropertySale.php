<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PropertySaleModel;
use App\Models\UserModel;
use App\Models\LandlordsModel;
use App\Models\UnitSaleModel;
use CodeIgniter\HTTP\ResponseInterface;

class PropertySale extends BaseController
{
    public function index()
    {
        $model = new PropertySaleModel();
        $userModel = new UserModel();
        $landlord = new LandlordsModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'title' => 'Properties',
            'properties' => $model->getPropertiesForSale(),
            'landlords' => $landlord->findAll(),
            'userInfo' => $userInfo
        ];
        return view('properties/sale', $data);
    }

    public function propertySale()
    {
        helper(['form', 'url']);

        $name = $this->request->getPost('name');
        $location = $this->request->getPost('location');
        $landlord = $this->request->getPost('landlord');
        $image = $this->request->getPost('image');

        $data = [
            'name' => $name,
            'landlord_id' => $landlord,
            'location'=> $location,
            'image' => NULL
        ];

        $model = new PropertySaleModel();
        $query = $model->save($data);

        if (!$query) {
            return redirect()->back()->with('fail', 'Saving Property Failed');
        } else {
            return redirect()->back()->with('success', 'Saved Property Successfully');
        }
    }
    

    public function showSale()
    {

        $name = $this->request->getGet('property');
        $property = new PropertySaleModel();
        $userModel = new UserModel();
        $landlordModel = new LandlordsModel();
        $unitsModel = new UnitSaleModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $each = $property->where('name',$name)->first();
        $propertyId = $each['id'];
        $landlordId = $each['landlord_id'];
        $landlord = $landlordModel->find($landlordId);
        $units = $unitsModel->where('property_sale_id', $propertyId)->countAllResults();
        $show = $property->find($propertyId);

        $data = [
            'title' => $name,
            'property' => $show,
            'landlord' => $landlord,
            'units' => $units,
            'userInfo' => $userInfo
        ];
        return view('properties/sale_show', $data);
    }
}

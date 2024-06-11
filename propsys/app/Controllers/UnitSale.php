<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitSaleModel;
use App\Models\UserModel;
use App\Models\PropertySaleModel;
use CodeIgniter\HTTP\ResponseInterface;

class UnitSale extends BaseController
{
    public function index()
    {
        $model = new UnitSaleModel();
        $userModel = new UserModel();
        $properties = new PropertySaleModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'title' => 'Unit Sale',
            'units' => $model->getUnitsForSale(),
            'properties' => $properties->findAll(),
            'userInfo' => $userInfo
        ];
        return view('units/sale', $data);
    }

    public function saleUnit()
    {
        helper(['form','url']);

        $property = $this->request->getPost('property');
        $name = $this->request->getPost('name');
        $commission = $this->request->getPost('commission');
        $deposit = $this->request->getPost('deposit');
        $price = $this->request->getPost('price');
        $description = $this->request->getPost('description');

        $data =[
            'property_sale_id' => $property,
            'name' => $name,
            'description' => $description,
            'commission' => $commission,
            'deposit' => $deposit,
            'price' => $price
        ];

        $model = new UnitSaleModel();
        $query = $model->save($data);

        if (!$query) {
            return redirect()->back()->with('fail', 'Saving Unit Failed');
        } else {
            return redirect()->back()->with('success', 'Saved Unit Successfully');
        }
    }
}

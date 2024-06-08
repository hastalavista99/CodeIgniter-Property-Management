<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PropertiesModel;
use App\Models\TenantModel;
use App\Models\UnitsModel;
use CodeIgniter\HTTP\ResponseInterface;

class AssignTenant extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
        $propertyModel = new PropertiesModel();
        $model = new UserModel();
        $loggedId = session()->get('loggedInUser');
        $userInfo = $model->find($loggedId);
        $id = $this->request->getGet('id');

        $data = [
            'title' => 'Assign Tenant',
            'properties' => $propertyModel->findAll(),
            'userInfo' => $userInfo,
            'id' => $id
        ];
        return view('tenants/assign', $data);
    }

    public function getUnits()
    {
        $propertyId = $this->request->getPost('property_id');
        $unitModel = new UnitsModel();
        $units = $unitModel->where('property_id', $propertyId)->where('available', 'yes')->findAll();

        return $this->response->setJSON($units);
    }

    public function assign()
    {
        helper(['form', 'url']);

        $property = $this->request->getPost('property_Select');
        $unit =  $this->request->getPost('unitSelect');
        $contract = $this->request->getPost('contract');
        $id = $this->request->getGet('id');

        $data = [
            'contract' => $contract,
            'tenant_status' => 'assigned',
            'property_id' => $property,
            'unit_id' => $unit
        ];

        $model = new TenantModel();
        $query = $model->update($id, $data);

        if (!$query) {
            session()->setFlashdata('fail', 'Assigning Tenant Failed. Try again later');
            return redirect()->to('tenants')->withInput();
        } else {
            session()->setFlashdata('success', 'Assigned Tenant Successfully');
            return redirect()->to('tenants')->withInput();
        }
    }
}

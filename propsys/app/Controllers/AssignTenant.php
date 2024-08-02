<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\SendSMS;
use App\Models\BillingModel;
use App\Models\UserModel;
use App\Models\PropertiesModel;
use App\Models\TenantModel;
use App\Models\UnitsModel;
use App\Models\VacateModel;
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
        $units = $unitModel->where('property_id', $propertyId)->where('occupied', 'yes')->findAll();

        return $this->response->setJSON($units);
    }

    public function getTenants()
    {
        $unitId = $this->request->getPost('unit_id');
        $tenantModel = new TenantModel();
        $tenants = $tenantModel->where('unit_id', $unitId)->findAll();

        return $this->response->setJSON($tenants);
    }

    public function getRent()
    {
        $unitId = $this->request->getPost('unit_id');
        $rentModel = new BillingModel();
        $rent = $rentModel->where('unit_id', $unitId)->findAll();

        return $this->response->setJSON($rent);
    }

    public function assign()
    {
        helper(['form', 'url']);

        $property = $this->request->getPost('property_Select');
        $unit =  $this->request->getPost('unitSelect');
        $contract = $this->request->getPost('contract');
        $id = $this->request->getGet('id');

        $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $pass = substr(str_shuffle($alpha_numeric), 0, 8);

        $data = [
            'contract' => $contract,
            'tenant_status' => 'assigned',
            'property_id' => $property,
            'unit_id' => $unit
        ];

        $model = new TenantModel();
        $tenant = $model->find($id);
        $name = $tenant['name'];
        $mobile = $tenant['phone_number'];
        $query = $model->update($id, $data);

        if (!$query) {
            session()->setFlashdata('fail', 'Assigning Tenant Failed. Try again later');
            return redirect()->to('tenants')->withInput();
        } else {
            $msg = "Hi, $name \n Welcome to Gloha Sacco Login to https://rent.macrobuy.co.ke to view your transactions.\nUsername: $name\nPassword: $pass; \n Regards \n Property Manager";

            $sms = new SendSMS();

            $sms->sendSMS($mobile, $msg);
            session()->setFlashdata('success', 'Assigned Tenant Successfully');
            return redirect()->to('tenants')->withInput();
        }
    }

    public function vacate()
    {
        helper(['form', 'url']);

        $id = $this->request->getGet('tenant');
        $property = $this->request->getGet('prop');
        $unit = $this->request->getGet('unit');
        $model = new TenantModel();
        $userModel = new UserModel();
        $loggedId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedId);


        $data = [
            'title' => 'Vacate',
            'tenant' => $model->find($id),
            'property' => $property,
            'unit' => $unit,
            'userInfo' => $userInfo,
            'tenantId' => $id
        ];

        return view('tenants/vacate', $data);
    }

    public function vacateTenant()
    {
        helper(['form', 'url']);

        $comment = $this->request->getPost('comment');
        $tenant = $this->request->getGet('tenant');

        $data = [
            'tenant_id' => $tenant,
            'comment' => $comment
        ];

        $tenantData = [
            'tenant_status' => 'unassigned',
            'property_id' => NULL,
            'unit_id' => NULL
        ];

        $vacateModel = new VacateModel();
        $tenantModel = new TenantModel();


        try {
            // First query
            if (!$vacateModel->save($data)) {
                throw new \Exception('Failed to save vacate data');
            }

            // Second query
            if (!$tenantModel->update($tenant, $tenantData)) {
                throw new \Exception('Failed to update tenant data');
            }

            // If both queries succeed
            session()->setFlashdata('success', 'Vacated Tenant Successfully');
        } catch (\Exception $e) {
            // If any query fails
            session()->setFlashdata('fail', $e->getMessage());
        }

        return redirect()->to('tenants')->withInput();
    }
}

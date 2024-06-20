<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TenantModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Tenants extends BaseController
{
    public function index()
    {
        $model = new TenantModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'tenants' => $model->getTenants(),
            'title' => 'Tenants',
            'userInfo' => $userInfo
        ];
        return view('tenants/index', $data);
    }

    public function createTenant()
    {
        helper('form');

        // get post info
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone_number');
        $idNumber = $this->request->getPost('id_number');

        $data = [
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone,
            'id_number' => $idNumber
        ];

        $tenantModel = new TenantModel();
        $query = $tenantModel->save($data);

        if(!$query) {
            return redirect()->back()->with('fail', 'Saving Tenant Failed');
        } else {
            return redirect()->back()->with('success', 'Saved Tenant Successfully');
        }
    }

    public function viewTenant()
    {
        helper(['form', 'url']);

        $tenantId = $this->request->getGet('tenant');
        $model = new TenantModel();
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $tenant = $model->find($tenantId);


        $data = [
            'title' => 'View Tenant',
            'tenant' => $tenant,
            'userInfo' => $userInfo
        ];

        return view('tenants/view', $data);
    }

    public function editTenant()
    {
        helper(['form', 'url']);

        // get post info
        $id = $this->request->getGet('tenant');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone_number');
        $idNumber = $this->request->getPost('id_number');

        $tenantModel = new TenantModel();

        $data = [
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone,
            'id_number' => $idNumber
        ];

        $query = $tenantModel->update($id, $data);

        if(!$query) {
            return redirect()->back()->with('fail', 'Saving Tenant Failed');
        } else {
            return redirect()->back()->with('success', 'Saved Tenant Successfully');
        }
        
    }

}

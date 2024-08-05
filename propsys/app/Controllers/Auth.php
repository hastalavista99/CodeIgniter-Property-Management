<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\TenantModel;
use App\Libraries\Hash;
use App\Models\AuthModel;
use App\Models\TenantAuth;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Auth extends BaseController
{
    public function index()
    {
        helper('form');
        return view('auth/login');
    }

    public function register()
    {

        helper('form');

        $userModel = new UserModel();
        $loggedId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedId);
        $data = [
            'title' => 'New User',
            'userInfo' => $userInfo

        ];
        return view('auth/register', $data);
    }

    public function registerUser()
    {
        helper('form');
        // validate user input
        if (!$this->request->is('post')) {
            return view('auth/register');
        }
        $validated = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[5]|max_length[20]',
            'passwordConf' => 'required|min_length[5]|max_length[20]|matches[password]'
        ];
        $data = $this->request->getPost(array_keys($validated));

        if (!$this->validateData($data, $validated)) {
            return view('auth/register');
        }
        $validData = $this->validator->getValidated();

        // save the user
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $passwordConf = $this->request->getPost('passwordConf');
        $role = $this->request->getPost('role');

        new \App\Libraries\Hash();
        $data = [
            'role' => $role,
            'user_name' => $name,
            'user_email' => $email,
            'user_password' => Hash::encrypt($password),

        ];


        // storing data
        $userModel = new \App\Models\UserModel();

        try {
            $userModel->insert($data);
            return redirect()->to('register')->with('success', 'User created successfully.');
        } catch (DatabaseException $e) {
            if ($e->getCode() == 1062) { // 1062 is the error code for duplicate entry
                return redirect()->back()->withInput()->with('fail', 'Username already exists. Please choose a different username.');
            }
            return redirect()->back()->withInput()->with('fail', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function loginUser()
    {

        helper(['form', 'url']); // Load form and URL helpers

        if (!$this->request->is('post')) {
            return view('auth/login');
        }

        $rules = [
            'name' => 'required',
            'password' => 'required|min_length[5]|max_length[20]'
        ];

        if (!$this->validate($rules)) {
            return view('auth/login', [
                'validation' => $this->validator
            ]);
        } else {
            // User details in database
            $name = $this->request->getPost('name');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('user_name', $name)->first();

            if ($user) {
                $checkPassword = Hash::check($password, $user['user_password']);
                if (!$checkPassword) {
                    session()->setFlashdata('fail', 'Incorrect password provided');
                    return redirect()->to('auth')->withInput();
                } else {
                    // Process user info
                    $userId = $user['id'];
                    session()->set('loggedInUser', $userId);
                    return redirect()->to('dashboard');
                }
            } else {
                session()->setFlashdata('fail', 'User not found');
                return redirect()->to('auth')->withInput();
            }
        }
    }

    public function users()
    {
        helper('form');


        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $data = [
            'users' => $userModel->getUser(),
            'title' => 'Users',
            'userInfo' => $userInfo

        ];

        return view('users/index', $data);
    }

    public function profile()
    {
        helper('form');


        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $data = [
            'users' => $userModel->getUser(),
            'title' => 'Profile',
            'userInfo' => $userInfo

        ];
        return view('auth/profile', $data);
    }

    public function tenantProfile()
    {
        helper('form');


        $userModel = new TenantAuth();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $data = [
            'users' => $userModel->getUser(),
            'title' => 'Profile',
            'userInfo' => $userInfo

        ];
        return view('auth/tenant_profile', $data);
    }

    public function edit()
    {
        helper(['form', 'url']);

        $userId = $this->request->getGet('id');
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $userData = $userModel->find($userId);
        $data = [
            'user' => $userData,
            'title' => 'Edit Profile',
            'userInfo' => $userInfo
        ];
        return view('auth/edit_user', $data);
    }

    public function updateUser()
    {
        helper(['form', 'url']);

        $validated = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[5]|max_length[20]',
            'passwordConf' => 'required|min_length[5]|max_length[20]|matches[password]'
        ];
        $data = $this->request->getPost(array_keys($validated));
        // Validate data
        if (!$this->validate($validated)) {
            return redirect()->back()->withInput()->with('fail', 'Validation failed. Please check your input.');
        }

        $userModel = new UserModel();

        // save the user
        $userId = $this->request->getGet('id');
        $name = esc($this->request->getPost('name'));
        $email = esc($this->request->getPost('email'));
        $password = esc($this->request->getPost('password'));
        $passwordConf = esc($this->request->getPost('passwordConf'));
        $role = esc($this->request->getPost('role'));

        new \App\Libraries\Hash();
        $data = [
            'role' => $role,
            'user_name' => $name,
            'user_email' => $email,
            'user_password' => Hash::encrypt($password),

        ];

        $existingUser = $userModel->where('user_name', $name)->first();

        if ($existingUser && $existingUser['id'] != $userId) {
            return redirect()->back()->with('fail', 'Username already taken. Please choose a different username.');
        }

        if ($userModel->update($userId, $data)) {
            return redirect()->to('users')->with('success', 'User updated successfully.');
        } else {
            return redirect()->back()->with('fail', 'Failed to update user. Please try again.');
        }
    }

    public function tenantLogin()
    {
        helper(['form', 'url']);
        return view('auth/tenant');
    }

    public function tenantSignIn()
    {
        helper(['form', 'url']);

        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[5]|max_length[20]'
        ];

        

        if (!$this->validate($rules)) {
            
            return view('auth/tenant', [
                'validation' => $this->validator
            ]);
        } else {
            // Process tenant info

            $username = esc($this->request->getPost('username'));
            $password = esc($this->request->getPost('password'));

            $tenantModel = new TenantModel();
            $user = $tenantModel->where('user_name', $username)->first();

            if ($user) {
                $checkPassword = Hash::check($password, $user['user_password']);
                if (!$checkPassword) {
                    session()->setFlashdata('fail', 'Incorrect password provided');
                    return redirect()->to('auth/tenant')->withInput();
                } else {
                    // Process user info
                    $userId = $user['id'];
                    session()->set('loggedInUser', $userId);
                    return redirect()->to('dashboard');
                }
            } else {
                session()->setFlashdata('fail', 'User not found');
                return redirect()->to('auth/tenant')->withInput();
            }
        }
    }

    public function changeAuth()
    {
        helper(['form', 'url']);

        // Validation rules
        $rules = [
            'cpassword' => 'required',
            'newPassword' => 'required|min_length[5]|max_length[20]',
            'renewpassword' => 'required|matches[newpassword]'
        ];
        // Validate the input
        // if (!$this->validate($rules)) {
        //     $userModel = new UserModel();
        // $loggedInUserId = session()->get('loggedInUser');
        // $userInfo = $userModel->find($loggedInUserId);
        // $data = [
        //     'users' => $userModel->getUser(),
        //     'title' => 'Profile',
        //     'userInfo' => $userInfo

        // ];
        //     return view('auth/profile', [
        //         'validation' => $this->validator,
        //         'users' => $userModel->getUser(),
        //     'title' => 'Profile',
        //     'userInfo' => $userInfo
        //     ]);
        // }

        $id = $this->request->getGet('id');
        $currentPass = esc($this->request->getPost('cpassword'));
        $newPass = esc($this->request->getPost('newPassword'));

        $authModel = new UserModel();
        $user = $authModel->where('id', $id)->first();

        // Verify current password
        if (!Hash::check($currentPass, $user['user_password'])) {
            return redirect()->to('profile')->with('fail', 'Incorrect current password.');
        }

        // Hash new password
        $data = [
            'user_password' => Hash::encrypt($newPass),
        ];

        // Update password
        if ($authModel->update($id, $data)) {
            return redirect()->to('profile')->with('success', 'Password updated successfully.');
        } else {
            return redirect()->to('profile')->withInput()->with('fail', 'Failed to update password.');
        }
    }

    public function changeTenantAuth()
    {
        helper(['form', 'url']);

        // Validation rules
        $rules = [
            'cpassword' => 'required',
            'newPassword' => 'required|min_length[5]|max_length[20]',
            'renewpassword' => 'required|matches[newpassword]'
        ];
        // Validate the input
        // if (!$this->validate($rules)) {
        //     $userModel = new UserModel();
        // $loggedInUserId = session()->get('loggedInUser');
        // $userInfo = $userModel->find($loggedInUserId);
        // $data = [
        //     'users' => $userModel->getUser(),
        //     'title' => 'Profile',
        //     'userInfo' => $userInfo

        // ];
        //     return view('auth/profile', [
        //         'validation' => $this->validator,
        //         'users' => $userModel->getUser(),
        //     'title' => 'Profile',
        //     'userInfo' => $userInfo
        //     ]);
        // }

        $id = $this->request->getGet('id');
        $currentPass = esc($this->request->getPost('cpassword'));
        $newPass = esc($this->request->getPost('newPassword'));

        $authModel = new TenantAuth();
        $user = $authModel->where('id', $id)->first();

        // Verify current password
        if (!Hash::check($currentPass, $user['user_password'])) {
            return redirect()->to('tenant/profile')->with('fail', 'Incorrect current password.');
        }

        // Hash new password
        $data = [
            'user_password' => Hash::encrypt($newPass),
        ];

        // Update password
        if ($authModel->update($id, $data)) {
            return redirect()->to('tenant/profile')->with('success', 'Password updated successfully.');
        } else {
            return redirect()->to('tenant/profile')->withInput()->with('fail', 'Failed to update password. Kindly recheck your password');
        }
    }

    public function tenantLogout()
    {
        if (session()->has('loggedInUser')) {
            session()->remove('loggedInUser');
        }

        return redirect()->to('auth/tenant?access=loggedout')->with('fail', "You are logged out");
    }

    public function logout()
    {
        if (session()->has('loggedInUser')) {
            session()->remove('loggedInUser');
        }

        return redirect()->to('auth?access=loggedout')->with('fail', "You are logged out");
    }
}

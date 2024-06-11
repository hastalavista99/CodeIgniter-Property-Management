<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\Hash;
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
                    return redirect()->to('auth/login')->withInput();
                } else {
                    // Process user info
                    $userId = $user['id'];
                    session()->set('loggedInUser', $userId);
                    return redirect()->to('dashboard');
                }
            } else {
                session()->setFlashdata('fail', 'User not found');
                return redirect()->to('auth/login')->withInput();
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

    public function logout(){
        if(session()->has('loggedInUser'))
        {
            session()->remove('loggedInUser');

        }

        return redirect()->to('auth?access=loggedout')->with('fail', "You are logged out");
    }
}

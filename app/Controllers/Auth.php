<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function signupForm()
    {
        // Load the sign-up form view
        return view('signup');
    }

    public function index()
    {
        // Load the login form view
        return view('signup');
    }

    public function processSignup()
    {
        $validation = \Config\Services::validation();

        // Validate the form input
        $validation->setRules([
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Return to the form with validation errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Save the user to the database
        $userModel = new UserModel();
        $userModel->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        // Redirect to a success page or login page
        return redirect()->to('/login')->with('success', 'Account created successfully. Please log in.');
    }
}
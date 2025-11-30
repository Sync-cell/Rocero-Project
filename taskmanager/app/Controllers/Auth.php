<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // Show login form
    public function login()
    {
        return view('auth/login');
    }

    // Show registration form
    public function register()
    {
        return view('auth/register');
    }

    // Store new user
   public function store()
{
    $model = new \App\Models\UserModel();
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $role     = $this->request->getPost('role');

    // Check if username exists
    if ($model->where('username', $username)->first()) {
        return redirect()->back()->with('error', 'Username already exists.');
    }

    // Save new user
    $model->save([
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'role'     => $role
    ]);

    return redirect()->to('/admin/login')->with('success', 'Registered! Please log in.');
}


    // Authenticate login
   public function authenticate()
{
    $model = new UserModel();
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Find user by username
    $user = $model->where('username', $username)->first();

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Set session with role info
        session()->set([
            'user_logged_in' => true,
            'username'       => $user['username'],
            'user_id'        => $user['id'],
            'role'           => $user['role']
        ]);

        // Redirect based on role
        if ($user['role'] === 'admin') {
    return redirect()->to('/tasks'); // Admins go here too
} else {
    return redirect()->to('/tasks'); // Users also go here
}

    }

    // Invalid credentials
    return redirect()->back()->with('error', 'Invalid credentials');
}


    // Logout user
    public function logout()
    {
        // Destroy the session data to log out
        session()->destroy();

        // Redirect to login page after logout
        return redirect()->to('/admin/login');
    }
}


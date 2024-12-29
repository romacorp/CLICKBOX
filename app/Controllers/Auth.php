<?php

namespace App\Controllers;

use App\Services\AuthService;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($this->authService->login($username, $password)) {
                return redirect()->to('/customers');
            }

            return redirect()->back()->with('error', 'Credenciales inválidas');
        }

        return view('auth/login');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            $userData = [
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ];

            if ($this->authService->register($userData)) {
                return redirect()->to('/login')->with('success', 'Registro exitoso');
            }

            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        return view('auth/register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
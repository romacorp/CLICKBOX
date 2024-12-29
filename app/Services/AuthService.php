<?php

namespace App\Services;

use App\Models\UserModel;

class AuthService
{
    protected $userModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    public function login($username, $password)
    {
        $user = $this->userModel->attemptLogin($username, $password);
        
        if ($user) {
            $this->setUserSession($user);
            return true;
        }
        
        return false;
    }
    
    public function register($userData)
    {
        return $this->userModel->save([
            'username' => $userData['username'],
            'email'    => $userData['email'],
            'password' => password_hash($userData['password'], PASSWORD_DEFAULT)
        ]);
    }
    
    protected function setUserSession($user)
    {
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'isLoggedIn' => true
        ]);
    }
}
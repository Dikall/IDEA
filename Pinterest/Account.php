<?php
class Account {
    private string $password;
    public string $email;

    public function create($email, $password) {
        
    }

    public function login($email, $password) {
        
    }

    public function logout() {
        
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($newPassword) {
        $this->password = $newPassword;
    }
}
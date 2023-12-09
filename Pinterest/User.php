<?php 

class User extends Account {
    public string $name;
    public string $username;
    public int $followers;
    public int $following;

    public function editProfile($name, $username) {
        // Logika untuk mengedit profil
    }

    public function follow($user) {
        // Logika untuk mengikuti pengguna lain
    }

    public function shareProfile() {
        // Logika untuk membagikan profil pengguna
    }
}
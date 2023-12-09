<?php
use App\Model\User;
use App\View;

require_once 'vendor/autoload.php';

$user = new User();
$user->user_id = 2;
$user->name = 'ILimau';
$user->email = 'hadid@gmail.com';
$user->password = 'hadisriwayat';

View::json($user->editUser());
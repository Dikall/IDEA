<?php


use App\Model\User;
use App\View;


require_once 'vendor/autoload.php';


$user = new User();
$user->username = '@insanhadid';
$user->password = 'insanpreman';
$user->name = 'insan';
$user->email = 'insanlomhay@yahoo.com';
$user->follower = '0';
$user->following = '0';
View::json($user->save());
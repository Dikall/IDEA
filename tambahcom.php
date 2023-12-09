<?php

use App\Model\User;
use App\Model\Pin;
use App\Model\Comment;
use App\View;

require_once 'vendor/autoload.php';

$user = new User(); // Isi dengan ID pengguna yang sesuai
$user->user_id = 2; // Menginisialisasi properti user_id

$pin = new Pin();
$pin->id_pin = 1; // Menginisialisasi properti user_id

// $user_id = 1;
// $id_pin = 1;
$content = 'Wah Mejanya bulat sekali';
$time = '12:10';
$likes = 1002;


$komen = new Comment();
$komen->user_id = $user->user_id;
$komen->id_pin = $pin->id_pin;
$komen->content = $content;
$komen->time = $time;
$komen->likes = $likes; // Memanggil metode setUser untuk mengatur user yang terkait

View::json($komen->save());

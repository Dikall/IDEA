<?php

use App\Model\User;
use App\Model\Pin;
use App\View;

require_once 'vendor/autoload.php';

$user = new User();
$user_id = 2; // Isi dengan ID pengguna yang sesuai
$user->user_id = $user_id; // Menginisialisasi properti user_id

$judul_gambar = 'Sea Helbert.jpeg';
$deskripsi = 'Pantai yang luas dengan air berwarna biru';
$destination_link = 'https://i.pinimg.com/564x/1c/bd/3e/1cbd3e34bc9eca0dc9924c61ecbc3369.jpg';
$time_stamp = '2023-12-07 17:16:46.00000';
$viewer = 20;



$pin = new Pin();
$pin->title = $judul_gambar;
$pin->description = $deskripsi;
$pin->destination_link = $destination_link;
$pin->time_stamp = $time_stamp;
$pin->viewer = $viewer;
$pin->setUser($user); // Memanggil metode setUser untuk mengatur user yang terkait

View::json($pin->save());

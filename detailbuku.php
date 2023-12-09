<?php


use App\Model\book;
use App\View;


require_once 'vendor/autoload.php';


$buku = new Book();
$buku->detail(12);
View::json($buku);
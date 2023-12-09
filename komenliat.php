<?php


use App\Model\Comment;
use App\View;


require_once 'vendor/autoload.php';


$komen = new Comment();
$komen->detail(1);
View::json($komen);
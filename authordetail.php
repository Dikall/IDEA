<?php


use App\Model\Author;
use App\View;


require_once 'vendor/autoload.php';


$author = new Author();
$author->detail(9);
View::json($author);
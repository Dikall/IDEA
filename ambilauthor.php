<?php


use App\Model\Author;
use App\View;


require_once 'vendor/autoload.php';


$author = new Author();
View::json($author->all());
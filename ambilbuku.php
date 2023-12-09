<?php


use App\Model\Book;
use App\View;


require_once 'vendor/autoload.php';


$book = new Book();
View::json($book->all());

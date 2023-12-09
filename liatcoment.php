<?php


use App\Model\Comment;
use App\View;


require_once 'vendor/autoload.php';


$comment = new Comment();
View::json($comment->all());

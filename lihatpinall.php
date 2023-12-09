<?php


use App\Model\Pin;
use App\View;


require_once 'vendor/autoload.php';


$pin = new Pin();
View::json($pin->all());
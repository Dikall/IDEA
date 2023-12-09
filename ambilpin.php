<?php


use App\Model\Pin;
use App\View;


require_once 'vendor/autoload.php';


$pinData = new Pin();
$pinData->detail('Sunset Sky');
View::json($pinData);
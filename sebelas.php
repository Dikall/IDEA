<?php
require_once 'vendor/autoload.php';
use App\Admin\Dosen;

$dian = new Dosen();
$dian->nama = "Muhammad Radikal";
$dian->nip = 198411132015041001;
$dian->setNoHp(62111111);
$dian->alamat = "Jln Karangan";
$dian->nidn = "0013118405";

$dian->mengajar();
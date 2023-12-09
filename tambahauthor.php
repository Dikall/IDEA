<?php


use App\Model\book;
use App\View;


require_once 'vendor/autoload.php';


$buku = new Book();
$buku->id = '11';
$buku->tittle = 'One Piece';
$buku->description = 'Untuk mencari koki yang handal, Luffy dan teman-teman mampir di restoran di atas laut. Namun di luar dugaan, yanh muncul di hadapan mereka adalah Kapten Krieg, si petualang laut yang berusaha untuk mendapatkan One Piece!';
$buku->category_id = '4';
View::json($buku->save());
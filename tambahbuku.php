<?php


use App\Model\Author;
use App\Model\Category;
use App\Model\Book;
use App\View;


require_once 'vendor/autoload.php';


$judul_buku = 'Semua Bisa Menjadi Programmer Laravel Basic';
$id_penulis = [1,2];
$deskripsi = 'Ini hanyalah sebuah deskripsi dari sebuah buku';
$penerbit = 'Elex media';
$id_category = 1;




$book = new Book();
$category = new Category();
$authors = [];




$book->tittle = $judul_buku;
$book->description = $deskripsi;
$book->publisher = $penerbit;


// Menambahkan category pada buku berdasarkan id
$category->detail($id_category);
$book->setCategory($category);


// Menambahkan penulis-penulis pada buku berdasarkan id
$index = 0;
foreach ($id_penulis as $item) {
    $authors[$index] = new Author();
    $authors[$index]->detail($item);
    $book->setAuthor($index,$authors[$index]);
    $index++;
}


View::json($book->save());

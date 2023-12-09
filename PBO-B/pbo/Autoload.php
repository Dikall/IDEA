<?php

// Autoload function untuk memuat kelas secara otomatis
spl_autoload_register(function ($class) {
    // Ubah namespace menjadi path file
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    // Masukkan path ke file kelas
    include __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
});

// Menggunakan namespace
use Akademik\Akademik;

// Membuat objek dari kelas Akademik
$akademik = new Akademik();

// Memanggil metode dari kelas Akademik
echo $akademik->verifLirs();

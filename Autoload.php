<?php

// Autoload function untuk memuat kelas secara otomatis
spl_autoload_register(function ($class) {
    // Ubah namespace menjadi path file
    $class = str_replace('\\', '/', $class);
    // Masukkan path ke file kelas
    require_once __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
});

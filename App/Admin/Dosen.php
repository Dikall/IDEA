<?php
namespace App\Admin;
use App\Admin\Pegawai;
class Dosen extends Pegawai {
    public string $nidn;

    public function mengajar(): void {
        echo "$this->nama Sedang Mengajar Perkuliahan" ;
    }

}
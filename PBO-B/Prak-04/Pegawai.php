<?php

class Pegawai {
    public int $nip;
    public int $no_php;
    public string $nama;
    public string $alamat;

    public function CekIn(): bool {
        return true;
    }

    public function CekOut(): bool {
        return true;
    }
}
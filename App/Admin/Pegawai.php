<?php
namespace App\Admin;

class Pegawai {
    public int $nip;
    protected int $no_hp;
    public string $nama;
    public string $alamat;

    public function CekIn(): bool {
        return true;
    }

    public function CekOut(): bool {
        return true; 
    }

    public function setNoHp($no_hp)
    {
        if($no_hp > 62000){
            $this->no_hp = $no_hp;
        } else {
            return false;
        }
    }

    public function getNoHp() : int
    {
        return $this->no_hp;
    }
}

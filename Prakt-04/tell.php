<?php

require_once ("pegawai.php");

$ijat = new Pegawai();
$ijat->setNoHp(62899);
$ijat->nip = 19700001;
$ijat->nama = "ijat";
$ijat->alamat = "rumah sendiri";

echo "Alamat Rumah si {$ijat->nama} adalah di {$ijat->alamat} No hp nya {$ijat->getNoHp()} 
sedangkan NIP nya adalah {$ijat->nip}";
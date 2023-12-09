<?php
require_once ("Pegawai.php");

$ijat = new Pegawai();
$ijat->nip = 19700001;
$ijat->nama = "Ijat";
$ijat->no_php = 6289999;
$ijat->alamat = "Rumah Sendiri";

echo "NIP \t", "$ijat->nip \n";
echo "Nama \t", "$ijat->nama \n";
echo "No Hp \t", "$ijat->no_php \n";
echo "Alamat \t", "$ijat->alamat \n";


<?php


function luasLingkaran($jari) : float{
    $luas = 3.14*$jari*$jari;
    return $luas;
}

function kelilingLingkaran($jari) : float{
    $keliling = 2*3.14*$jari;
    return $keliling;
}

function volumeBola($jari) : float{
    $volume = 4/3*3.14*$jari*$jari*$jari;
    return $volume;
}

function volumeTabung($jari, $tinggi) : float{
    $volume = 3.14*$jari*$jari*$tinggi;
    return $volume;
}

function volumeKerucut($jari, $tinggi) : float{
    $volume = 3.14*$jari*$jari*$tinggi/3;
    return $volume;
}
$luas_tanah = luasLingkaran(45);
echo "Luas tanah budi adalah {$luas_tanah}\n";

$keliling_tanah = kelilingLingkaran(45);
echo "Keliling Tanah budi adalah {$keliling_tanah}\n";

$volume_bola = volumeBola(45);
echo "Volume Bola adalah {$volume_bola}\n";

$volume_tabung = volumeTabung(45, 5);
echo "Volume Tabung adalah {$volume_tabung}\n";

$volume_kerucut = volumeKerucut(45, 15);
echo "Volume Kerucut adalah {$volume_kerucut}\n";
?>


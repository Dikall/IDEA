<?php

date_default_timezone_set("Asia/Jakarta");
$nama = readline('Masukkan nama Anda: ');
$waktu = date('h:i:s');
if($waktu < '11') {
    echo "Selamat Pagi, ($nama), Sekarang Pukul, ($waktu)\n";
} elseif($waktu < '15') {
    echo "Selamat Siang, ($nama), Sekarang Pukul, ($waktu)\n";
} elseif($waktu < '19') {
    echo "Selamat Sore, ($nama), Sekarang Pukul, ($waktu)\n";
} elseif($waktu < '5') {
    echo "Selamat Malam, ($nama), Sekarang Pukul, ($waktu)\n";
}

?>

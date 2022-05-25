<?php
// Kita Mulai Session 
session_start();

// Simpan Data Tujuan 
$tujuan = 'download/' .  $_POST['folder'];

// Buat Directory 
mkdir($tujuan, 0777, true);

// Mengambil Data Dari "data.php"
require('data.php');

// Hitung Jumlah Data 
$jumlah = count($download);

//Lakukan Perulangan Sejumlah Datanya
for ($i = 0; $i < $jumlah; $i++) {

    // Buat Percabangan
    if ((@file_get_contents($download[$i][0])) === false) {
        // Jika URL Gagal Untuk Diakses Maka Abaikan
        continue;
    } else {
        // Jika URL Dapat Diakses Maka Simpan Filenya
        file_put_contents($tujuan . '/' . $download[$i][1], file_get_contents($download[$i][0]));
    }
}

$_SESSION['pesan'] = "Berhasil Mendownload,Silahkan Cek " . "\"" . $tujuan . "\"";
header('Location: index.php');

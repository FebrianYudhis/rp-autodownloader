<?php
// Kita Mulai Session 
session_start();

// Ambil Data Lokasi Dan Folder 

$lokasi = $_POST['lokasi'];
$folder = $_POST['folder'];

// Simpan Data Tujuan 
$tujuan = 'download/' . $lokasi  . '/' . $folder;

// Buat Directory 
mkdir($tujuan, 0777, true);

// Mengambil Data Dari "data.php"
require('data.php');

// Hitung Jumlah Data 
$jumlah = count($download);

for ($i = 0; $i < $jumlah; $i++) {

    // Setiap Data Kita Ulang dan Download 
    file_put_contents($tujuan . '/' . $download[$i][1], file_get_contents($download[$i][0]));
}

$_SESSION['pesan'] = "Berhasil Mendownload,Silahkan Cek " . "\"" . $tujuan . "\"";
header('Location: index.php');

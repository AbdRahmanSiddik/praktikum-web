<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "praktikum";

// melakukan koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// cek kondisi dari koneksi
if (!$conn) {
    echo "Database Gagal Tersambung, cek koneksi database anda!";
}

?>
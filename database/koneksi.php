<?php
$host = "localhost";
$uname = "root";
$password = "12345678";
$database = "db_spbu";
$koneksi = new mysqli($host, $uname, $password, $database);
if (!$koneksi) {
    echo "Gagal: " . mysqli_connect_error();
}

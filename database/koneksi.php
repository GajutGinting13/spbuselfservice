<?php
$host = "localhost";
$uname = "root";
$password = "12345678";
$database = "db_spbu";
// $host = "localhost";
// $uname = "u387258854_gaspas";
// $password = "Gaspas1234";
// $database = "u387258854_gaspas";
$koneksi = new mysqli($host, $uname, $password, $database);
if (!$koneksi) {
    echo "Gagal: " . mysqli_connect_error();
}

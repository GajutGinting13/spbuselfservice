<?php
include '../database/koneksi.php';

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "DELETE FROM proses";
if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil dihapus";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);

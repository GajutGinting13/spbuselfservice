<?php

include '../database/koneksi.php';
session_start();
$id = $_SESSION['id'];
$jumlah = intval($_GET['jumlah']);
$jenis = $_GET['jenis'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
$hasil = mysqli_fetch_array($sql);
$saldo = intval($hasil['saldo']);
if ($jenis == "premium") {
    if ((8000 * $jumlah) >= $saldo) {
        $total = 8000 * $jumlah;
        $sql1 = mysqli_query($koneksi, "INSERT INTO proses ('nilai')values($total)");
        $saldo_terakhir = $saldo - $total;
        mysqli_query($koneksi, "UPDATE user SET saldo = '$saldo_terakhir' WHERE id = '$id'");
    } else {
        echo "<script>alert('Saldo Anda Kurang');window.location.href = '';</script>";
    }
} else if ($jenis == "pertalite") {
    if ((10000 * $jumlah) >= $saldo) {
        $total = 10000 * $jumlah;
        $sql1 = mysqli_query($koneksi, "INSERT INTO proses ('nilai')values($total)");
        $saldo_terakhir = $saldo - $total;
        mysqli_query($koneksi, "UPDATE user SET saldo = '$saldo_terakhir' WHERE id = '$id'");
    } else {
        echo "<script>alert('Saldo Anda Kurang');window.location.href = '';</script>";
    }
} else {
    if ((13000 * $jumlah) >= $saldo) {
        $total = 10000 * $jumlah;
        $sql1 = mysqli_query($koneksi, "INSERT INTO proses ('nilai')values($total)");
        $saldo_terakhir = $saldo - $total;
        mysqli_query($koneksi, "UPDATE user SET saldo = '$saldo_terakhir' WHERE id = '$id'");
    } else {
        echo "<script>alert('Saldo Anda Kurang');window.location.href = '';</script>";
    }
}

<?php

include '../database/koneksi.php';
session_start();

if (!isset($_SESSION['id'])) {
    echo "<script>alert('Session expired. Please login again.');window.location.href = '../';</script>";
    exit();
}

$id = $_SESSION['id'];
$jumlah = intval($_GET['jumlah']);
$jenis = $_GET['jenis'];

$sql = $koneksi->prepare("SELECT saldo FROM user WHERE id = ?");
$sql->bind_param("i", $id);
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows === 0) {
    echo "<script>alert('User not found.');window.location.href = '/spbuselfservice/User';</script>";
    exit();
}

$hasil = $result->fetch_assoc();
$saldo = intval($hasil['saldo']);
$harga_per_liter = 0;

switch ($jenis) {
    case 'premium':
        $harga_per_liter = 8000;
        break;
    case 'pertalite':
        $harga_per_liter = 10000;
        break;
    default:
        $harga_per_liter = 13000;
        break;
}

$total = $harga_per_liter * $jumlah;

if ($total > $saldo) {
    echo "<script>alert('Saldo Anda Kurang: $saldo');window.location.href = '/spbuselfservice/User';</script>";
} else {
    $koneksi->begin_transaction();
    $kirim = $jumlah * 1000;
    try {
        $sql1 = $koneksi->prepare("INSERT INTO proses (nilai) VALUES (?)");
        $sql1->bind_param("i", $kirim);
        $sql1->execute();

        $saldo_terakhir = $saldo - $total;
        $sql2 = $koneksi->prepare("UPDATE user SET saldo = ? WHERE id = ?");
        $sql2->bind_param("ii", $saldo_terakhir, $id);
        $sql2->execute();

        $koneksi->commit();
        echo "<script>window.location.href = '/spbuselfservice/User';</script>";
    } catch (Exception $e) {
        $koneksi->rollback();
        error_log("Transaction failed: " . $e->getMessage());
        echo "<script>alert('Transaction failed. Please try again.');window.location.href = '/spbuselfservice/User';</script>";
    }
}

<?php
include '../database/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    if (is_numeric($amount) && $amount > 0) {
        $sql = "UPDATE user SET saldo = saldo + $amount WHERE id = $id";
        if ($koneksi->query($sql) === TRUE) {
            echo "Saldo berhasil ditambahkan";
        } else {
            echo "Error updating record: " . $koneksi->error;
        }
    } else {
        echo "Jumlah topup tidak valid";
    }
    $koneksi->close();
    header("Location: index.php");
}

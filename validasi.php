<?php
require 'database/koneksi.php';
$user = $_POST['username'];
$password = $_POST['password'];
$stmt = $koneksi->prepare("SELECT * FROM `user` WHERE `username` = ? AND `password` = ?");
$stmt->bind_param("ss", $user, $password);
$stmt->execute();
$result = $stmt->get_result();
$hasil = $result->fetch_assoc();

if ($hasil) {
    $nama = $hasil['nama'];
    $role = $hasil['role'];
    $response = [
        'success' => true,
        'message' => "Selamat Datang " . $nama,
        'role' => $role,
    ];
} else {
    $response = [
        'success' => false,
        'message' => "Username atau password salah"
    ];
}

header('Content-Type: application/json');
echo json_encode($response);

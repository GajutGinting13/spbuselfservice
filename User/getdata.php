<?php
include '../database/koneksi.php';
$sql = mysqli_query($koneksi, "SELECT * FROM proses limit 1");
$data = mysqli_fetch_array($sql);

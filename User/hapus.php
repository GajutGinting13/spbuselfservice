<?php
include '../database/koneksi.php';
mysqli_query($koneksi, "DELETE FROM proses");

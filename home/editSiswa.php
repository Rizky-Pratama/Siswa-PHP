<?php

session_start();
include('../login/koneksi.php');

$id   = $_POST['id'];
$query      = "SELECT * FROM siswa WHERE id_siswa='$id'";
$result     = mysqli_query($connection, $query);
$num_row    = mysqli_num_rows($result);
$row        = mysqli_fetch_array($result);

if ($num_row >= 1) {
    echo "success";
    // $_SESSION['nisn']       = $row['nisn'];
    // $_SESSION['nama']       = $row['nama'];
    // $_SESSION['no_telp']    = $row['no_telp'];
    // $_SESSION['alamat']     = $row['alamat'];
} else {
    echo "error";
}

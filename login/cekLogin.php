<?php

session_start();
include('koneksi.php');

$username   = $_POST['username'];
$password   = MD5($_POST['password']);
$query      = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
$result     = mysqli_query($connection, $query);
$num_row    = mysqli_num_rows($result);
$row        = mysqli_fetch_array($result);

if ($num_row >= 1) {

    echo "success";
    $_SESSION['id_petugas']    = $row['id_petugas'];
    $_SESSION['nama_petugas']       = $row['nama_petugas'];
    $_SESSION['username']   = $row['username'];
    $_SESSION['no_telp']   = $row['no_telp'];
    $_SESSION['alamat']   = $row['alamat'];
} else {

    echo "error";
}

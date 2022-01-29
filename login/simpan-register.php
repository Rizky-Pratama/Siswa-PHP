<?php

include('koneksi.php');

$nama       = $_POST['nama'];
$username   = $_POST['username'];
$pass       = MD5($_POST['password']);
$no_telp    = $_POST['no_telp'];
$alamat     = $_POST['alamat'];

$query = "INSERT INTO petugas (id_petugas, username, password, nama_petugas, no_telp, alamat) VALUES ( null,'$username', '$pass', '$nama', '$no_telp', '$alamat')";

if ($connection->query($query)) {
    echo "success";
} else {
    echo "error";
}

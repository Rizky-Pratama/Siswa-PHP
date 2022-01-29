<?php
include('../login/koneksi.php');

$nisn           = $_POST['nisn'];
$nama = $_POST['nama'];
$no_telp       = $_POST['no_telp'];
$alamat       = $_POST['alamat'];

$query = "INSERT INTO siswa (nisn, nama, no_telp, alamat) VALUES ('$nisn', '$nama','$no_telp', '$alamat')";

if ($connection->query($query)) {
    echo "success";
} else {
    echo "error";
}

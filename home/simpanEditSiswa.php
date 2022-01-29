<?php

include("../login/koneksi.php");

$nisn       = $_POST['nisn'];
$nama       = $_POST['nama'];
$no_telp    = $_POST['no_telp'];
$alamat     = $_POST['alamat'];

$query      = "UPDATE siswa SET nama='$nama', no_telp='$no_telp',alamat='$alamat' WHERE nisn='$nisn'";

if ($connection->query($query)) {
    echo "success";
} else {
    echo "Data Gagal Di update";
}

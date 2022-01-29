<?php

include('../login/koneksi.php');

$id = $_POST['id'];

$query = "DELETE FROM siswa WHERE id_siswa = '$id'";

if ($connection->query($query)) {
    echo "success";
} else {
    echo "DATA GAGAL DIHAPUS!";
}

<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "sekolah";

$connection = mysqli_connect("$host", "$user", "$pass", "$db");

if ($connection) {
    // echo"Berhasil";
} else {
    echo "Gagal";
}

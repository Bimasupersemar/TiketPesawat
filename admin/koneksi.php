<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "19015_psas";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}


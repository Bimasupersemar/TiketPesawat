<?php
include 'koneksi.php';

$id = $_GET['id']; // Ambil ID dari URL

$query = "DELETE FROM pemesanan WHERE id = $id";

if ($koneksi->query($query) === TRUE) {
    // Jika penghapusan berhasil, tampilkan alert dan redirect
    echo "<script type='text/javascript'>
            alert('Data Berhasil Dihapus!');
            window.location.href = 'index.php'; 
            </script>";
} else {
    echo "Error: " . $koneksi->error;
}
?>
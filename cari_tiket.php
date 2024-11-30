<?php
require 'admin/koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $koneksi->query("SELECT * FROM pemesanan WHERE id = $id");

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo "Data Tiket Ditemukan: <br>";
        echo "ID: " . htmlspecialchars($data['id']) . "<br>";
        echo "Penumpang: " . htmlspecialchars($data['penumpang']) . "<br>";
        // Tambahkan detail lain sesuai kebutuhan
    } else {
        echo "Data Tiket Tidak Ditemukan.";
    }
} else {
    echo "Masukkan ID Tiket untuk Pencarian.";
}
?>

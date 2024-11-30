<?php 
require 'koneksi.php';

// Cek apakah parameter ID ada di URL
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = intval($_GET['id']);

// Ambil data pemesanan berdasarkan ID
$query = $koneksi->query("SELECT * FROM pemesanan WHERE id = $id");
if ($query->num_rows == 0) {
    echo "Data tidak ditemukan!";
    exit;
}

$data = $query->fetch_assoc();

// Update status jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $koneksi->real_escape_string($_POST['status']);

    $update = $koneksi->query("UPDATE pemesanan SET status = '$status' WHERE id = $id");

    if ($update) {
        echo "<script>alert('Status berhasil diperbarui!'); window.location = 'index.php';</script>";
    } else {
        echo "Gagal memperbarui status: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Status Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Edit Status Pemesanan</h2>
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="status" class="block text-gray-600">Status</label>
                <select name="status" id="status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="Menunggu Konfirmasi" <?= $data['status'] == 'Menunggu Konfirmasi' ? 'selected' : '' ?>>Menunggu Konfirmasi</option>
                    <option value="Dikonfirmasi" <?= $data['status'] == 'Dikonfirmasi' ? 'selected' : '' ?>>Dikonfirmasi</option>
                    <option value="Dibatalkan" <?= $data['status'] == 'Dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 w-full">Simpan Perubahan</button>
            </div>
        </form>
        <div class="mt-4 text-center">
            <a href="index.php" class="text-blue-500 hover:underline">Kembali ke Daftar Pemesanan</a>
        </div>
    </div>
</body>
</html>
    
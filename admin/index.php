<?php 
require 'koneksi.php';
$result = $koneksi->query("SELECT * FROM pemesanan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Tiket Pesawat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-5">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Daftar Pemesanan Tiket Pesawat</h1>
        <table class="table-auto w-full mt-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Penumpang</th>
                    <th class="px-4 py-2">Kelas</th>
                    <th class="px-4 py-2">Asal</th>
                    <th class="px-4 py-2">Tujuan</th>
                    <th class="px-4 py-2">Tanggal Berangkat</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr class="bg-white border">
                    <td class="px-4 py-2"><?= $row['id'] ?></td>
                    <td class="px-4 py-2"><?= $row['penumpang'] ?></td>
                    <td class="px-4 py-2"><?= $row['kelas'] ?></td>
                    <td class="px-4 py-2"><?= $row['asal'] ?></td>
                    <td class="px-4 py-2"><?= $row['tujuan'] ?></td>
                    <td class="px-4 py-2"><?= $row['tanggal_berangkat'] ?></td>
                    <td class="px-4 py-2"><?= $row['status'] ?></td>
                    <td class="px-4 py-2">
                        <a href="edit.php?id=<?= $row['id'] ?>" class="text-blue-500">Edit</a> |
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="text-red-500">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

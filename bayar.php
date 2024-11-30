<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <?php
        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', '', '19015_psas');

        // Cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Ambil data dari URL
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $query = "SELECT * FROM pemesanan WHERE id = $id";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
            } else {
                echo "<p class='text-red-500 text-center'>Data tidak ditemukan.</p>";
                exit;
            }
        } else {
            echo "<p class='text-red-500 text-center'>ID Pesanan tidak ditemukan.</p>";
            exit;
        }
        ?>

        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Nota Pembayaran</h2>
        <div class="space-y-4">
            <p><strong class="text-gray-600">ID Pesanan:</strong> <span class="text-gray-800">#<?= htmlspecialchars($data['id']) ?></span></p>
            <p><strong class="text-gray-600">Jumlah Penumpang:</strong> <span class="text-gray-800"><?= htmlspecialchars($data['penumpang']) ?> Penumpang</span></p>
            <p><strong class="text-gray-600">Kelas:</strong> <span class="text-gray-800"><?= ucfirst(htmlspecialchars($data['kelas'])) ?></span></p>
            <p><strong class="text-gray-600">Dari:</strong> <span class="text-gray-800"><?= htmlspecialchars($data['asal']) ?></span></p>
            <p><strong class="text-gray-600">Ke:</strong> <span class="text-gray-800"><?= htmlspecialchars($data['tujuan']) ?></span></p>
            <p><strong class="text-gray-600">Tanggal Keberangkatan:</strong> <span class="text-gray-800"><?= htmlspecialchars($data['tanggal_berangkat']) ?></span></p>
            <?php if (!empty($data['tanggal_kembali'])): ?>
                <p><strong class="text-gray-600">Tanggal Kembali:</strong> <span class="text-gray-800"><?= htmlspecialchars($data['tanggal_kembali']) ?></span></p>
            <?php endif; ?>
            <p><strong class="text-gray-600">Metode Pembayaran:</strong> <span class="text-gray-800"><?= ucfirst(htmlspecialchars($data['metode_pembayaran'])) ?></span></p>
            <p><strong class="text-gray-600">Total Harga:</strong> <span class="text-gray-800">Rp <?= number_format($data['total_harga'], 0, ',', '.') ?></span></p>
            <?php
// Tentukan warna berdasarkan status
$statusClass = '';
switch ($data['status']) {
    case 'Menunggu Konfirmasi':
        $statusClass = 'text-yellow-500'; // Warna kuning
        break;
    case 'Dibatalkan':
        $statusClass = 'text-red-500'; // Warna merah
        break;
    case 'Dikonfirmasi':
        $statusClass = 'text-green-500'; // Warna hijau
        break;
    default:
        $statusClass = 'text-gray-800'; // Default warna
        break;
}
?>
<p>
    <strong class="text-gray-600">Status:</strong> 
    <span class="<?= $statusClass ?> font-semibold">
        <?= htmlspecialchars($data['status']) ?>
    </span>
</p>
</div>
        <div class="mt-6 text-center">
            <a href="tiket.php" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali ke Halaman Pemesanan</a>
        </div>
    </div>
</body>
</html>

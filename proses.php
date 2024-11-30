<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg min-w-md w-full">
        <?php 
        $conn = new mysqli('localhost', 'root', '', '19015_psas');
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
            
        }
        if (isset($_GET['cari_tiket']) && isset($_GET['id'])) {
            $id = intval($_GET['id']); // Mengamankan input ID
            $query = $conn->query("SELECT * FROM pemesanan WHERE id = $id");
        
            if ($query->num_rows > 0) {
                $data = $query->fetch_assoc();
                // Tampilkan data tiket
                echo "<div class='bg-white p-6 rounded-lg shadow-md'>";
                echo "<h2 class='text-2xl font-bold mb-4'>Detail Tiket</h2>";
                echo "<p><strong>ID Tiket:</strong> " . htmlspecialchars($data['id']) . "</p>";
                echo "<p><strong>Penumpang:</strong> " . htmlspecialchars($data['penumpang']) . "</p>";
                echo "<p><strong>Kelas:</strong> " . htmlspecialchars($data['kelas']) . "</p>";
                echo "<p><strong>Asal:</strong> " . htmlspecialchars($data['asal']) . "</p>";
                echo "<p><strong>Tujuan:</strong> " . htmlspecialchars($data['tujuan']) . "</p>";
                echo "<p><strong>Tanggal Berangkat:</strong> " . htmlspecialchars($data['tanggal_berangkat']) . "</p>";
                echo "<p><strong>Status:</strong> " . htmlspecialchars($data['status']) . "</p>";
                echo "</div>";
        
                // Tambahkan tombol kembali
                echo "<div class='mt-4'>";
                echo "<a href='tiket.php' class='bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600'>Kembali ke Tiket</a>";
                echo "</div>";
            } else {
                echo "<p class='text-red-500'>Data Tiket Tidak Ditemukan.</p>";
        
                // Tambahkan tombol kembali jika tidak ditemukan
                echo "<div class='mt-4'>";
                echo "<a href='tiket.php' class='bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600'>Kembali ke Tiket</a>";
                echo "</div>";
            }
            exit; // Menghentikan eksekusi agar tidak masuk ke proses lain
        }
        
        // Cek apakah form telah disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $penumpang = $_POST['penumpang'];
            $kelas = $_POST['kelas'];
            $asal = $_POST['asal'];
            $tujuan = $_POST['tujuan'];
            $metodePembayaran = $_POST['metode_pembayaran'];
            $tanggalKeberangkatan = $_POST['tanggal_berangkat'];
            if (empty($_POST['tanggal_berangkat'])) {
                echo "<div class='flex flex-col items-center mt-4'>";
                echo "<p class='text-red-500 text-center font-bold'>Tanggal keberangkatan tidak boleh kosong.</p>";
                echo "<a href='tiket.php' class='text-center bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mt-2'>Kembali ke Pemesanan Tiket</a>";
                echo "</div>";
                exit; // Hentikan eksekusi skrip
            }

            
// Simpan data ke tabel pemesanan
            // Tentukan harga dasar per kelas penerbangan
            $hargaPerPenumpang = 0;
            switch ($kelas) {
                case 'Ekonomi':
                    $hargaPerPenumpang = 500000; // Ekonomi: Rp 500.000
                    break;
                case 'Bisnis':
                    $hargaPerPenumpang = 1500000; // Bisnis: Rp 1.500.000
                    break;
                case 'Premium':
                    $hargaPerPenumpang = 3000000; // First Class: Rp 3.000.000
                    break;
            }

            // Hitung total harga berdasarkan jumlah penumpang
            $totalHarga = $hargaPerPenumpang * $penumpang;
            
            if (empty($penumpang) || empty($kelas) || empty($asal) || empty($tujuan) || empty($metodePembayaran) || empty($tanggalKeberangkatan)) {
                echo "<p class='text-red-500 text-center font-semibold'>Semua data harus diisi!</p>";
            } 
            
            else {
                // Tampilkan detail pemesanan
                echo "<h2 class='text-2xl font-bold text-gray-700 text-center mb-6'>Detail Pemesanan Anda</h2>";
                echo "<div class='space-y-4'>";
                echo "<p><strong class='text-gray-600'>Jumlah Penumpang:</strong> <span class='text-gray-800'>" . htmlspecialchars($penumpang) . " Penumpang</span></p>";
                echo "<p><strong class='text-gray-600'>Kelas:</strong> <span class='text-gray-800'>" . ucfirst(htmlspecialchars($kelas)) . "</span></p>";
                echo "<p><strong class='text-gray-600'>Dari:</strong> <span class='text-gray-800'>" . htmlspecialchars($asal) . "</span></p>";
                echo "<p><strong class='text-gray-600'>Ke:</strong> <span class='text-gray-800'>" . htmlspecialchars($tujuan) . "</span></p>";
                echo "<p><strong class='text-gray-600'>Metode Pembayaran:</strong> <span class='text-gray-800'>" . ucfirst(htmlspecialchars($metodePembayaran)) . "</span></p>";
                echo "<p><strong class='text-gray-600'>Tanggal Keberangkatan:</strong> <span class='text-gray-800'>" . htmlspecialchars($tanggalKeberangkatan) . "</span></p>";
                echo "<p><strong class='text-gray-600'>Total Harga:</strong> <span class='text-gray-800'>Rp " . number_format($totalHarga, 0, ',', '.') . "</span></p>";
                echo "<div class='mt-6 text-center'>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            // Jika pengguna mengakses file ini secara langsung
            echo "<p class='text-red-500 text-center font-semibold'>Akses tidak diizinkan.</p>";
        }
        ?>
        <?php $sql = "INSERT INTO pemesanan (penumpang, kelas, asal, tujuan, tanggal_berangkat, metode_pembayaran, total_harga, status)
        VALUES ('$penumpang', '$kelas', '$asal', '$tujuan', '$tanggalKeberangkatan', '$metodePembayaran', '$totalHarga', 'menunggu konfirmasi')";
        if ($conn->query($sql) === TRUE) {
            // Ambil ID pesanan terakhir yang disimpan
            $lastId = $conn->insert_id; }{
            echo "<a href='bayar.php?id=" . urlencode($lastId) . "' class='bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600'>Bayar Sekarang</a>";
        }    

$conn->close();
 ?>
        <div class="mt-6 text-center">
            <a href="tiket.php" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                Kembali ke Halaman Pemesanan
            </a>
        </div>
    </div>
</body>
</html>
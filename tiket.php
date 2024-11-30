<?php 
include_once 'header.php';
?>
 
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<title>Air Air An</title>
<div class="bg-white p-6 rounded-lg shadow-md">
    
<form action="proses.php" method="GET" class="mb-6">
    <label for="cari_id" class="block text-sm font-medium text-gray-700">Cari Tiket Berdasarkan ID</label>
    <div class="flex mt-1">
        <input type="text" name="id" id="cari_id" placeholder="Masukkan ID Tiket" class="w-full rounded-l-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
        <button type="submit" name="cari_tiket" class="bg-blue-500 text-white px-4 rounded-r-md hover:bg-blue-600">Cari</button>
    </div>
</form>


    <!-- Formulir Pemesanan -->
    <form action="proses.php" method="POST" class="space-y-4">
        <div>
            <label for="penumpang" class="block text-sm font-medium text-gray-700">Penumpang</label>
            <select name="penumpang" id="penumpang" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <option value="<?= $i; ?>"><?= $i; ?> Penumpang</option>
                <?php endfor; ?>
            </select>
        </div>
        <div>
            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
            <select name="kelas" id="kelas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                <option value="Ekonomi">Ekonomi</option>
                <option value="Bisnis">Bisnis</option>
                <option value="Premium">Premium</option>
            </select>
        </div>

        <div>
            <label for="asal" class="block text-sm font-medium text-gray-700">Dari</label>
            <select name="asal" id="asal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                <option value="Jakarta">Jakarta (JKTA)</option>
                <option value="Surabaya">Surabaya (SUB)</option>
                <option value="Bali">Bali (DPS)</option>
            </select>
        </div>

        <div>
            <label for="tujuan" class="block text-sm font-medium text-gray-700">Ke</label>
            <select name="tujuan" id="tujuan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                <option value="Yogyakarta">Yogyakarta (JOGA)</option>
                <option value="Medan">Medan (KNO)</option>
                <option value="Makassar">Makassar (UPG)</option>
            </select>
        </div>

        <label for="tanggal_berangkat" class="block text-sm font-medium text-gray-700">Tanggal Keberangkatan</label>
        <input type="date" id="tanggal_berangkat" name="tanggal_berangkat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
        <script>
            flatpickr("#tanggal_berangkat", {
                dateFormat: "Y-m-d",
                minDate: "today",
                onChange: function(selectedDates, dateStr, instance) {
                    document.getElementById('tanggal_berangkat').value = dateStr;
                }
            });
        </script>

        <div>
            <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                <option value="gopay">Gopay</option>
                <option value="bni">BNI</option>
                <option value="bri">BRI</option>
                <option value="dana">Dana</option>
                <option value="mandiri">Mandiri</option>
                <option value="cod">Cash on Delivery (COD)</option>
            </select>
        </div>

        <!-- Tombol Submit -->
        <div class="flex justify-between items-center">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                Buat Pesanan
            </button>
        </div>
    </form>
</div>

<section id="footer">
    <?php include_once 'footer.php';?>
</section>

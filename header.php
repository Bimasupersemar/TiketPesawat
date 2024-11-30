<?php 
include 'admin/koneksi.php'
?>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<header>
  <nav x-data="{ open: false }"  class="flex h-auto w-auto bg-white shadow-lg rounded-lg justify-between md:h-16">
      <div class="bg-blue-600 flex w-full justify-between">
          <div :class="open ? 'hidden':'flex'" 
          class="flex px-6 w-1/2 items-center font-bold text-white
          md:w-1/5 md:px-1 md:flex md:items-center md:justify-center"
          x-transition:enter="transition ease-out duration-300">
          <img src="https://w7.pngwing.com/pngs/386/732/png-transparent-airplane-aircraft-logo-airplane-blue-logo-airplane-thumbnail.png" class="mr-4 h-8" alt="Flowbite Logo" />
              <a href="" class="text-white">Air Air An</a>
          </div>

          <div  
          x-show="open" x-transition:enter="transition ease-in-out duration-300"
          class="flex flex-col w-full h-auto
          md:hidden text-white">
          </div>
          <div class="hidden w-3/5 items-center justify-evenly font-semibold text-white md:flex">
            <a href="index.php" class="text-white">Beranda</a>
            <a href="tiket.php" class="text-white">Tiket Pesawat</a> 
            <a href="kemana.php" class="text-white">Mau Kemana?</a>
            <a href="#footer" class="text-white">Kontak</a>
            <a href="admin/index.php" target="_blank" class="text-white">Admin</a>
          </div>
      </div>
  </nav>
</header>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

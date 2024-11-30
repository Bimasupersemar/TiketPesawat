<?php include_once 'header.php'
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Tiket Pesawat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-blue-900 text-white p-6 text-left">
        <h1 class="text-3xl font-bold">Booking Tiket Pesawat Termurah </h1>
        <p class="mt-4 font-semibold">Booking tiket pesawat ke seluruh planet</p>
    </header>
<!-- component -->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<section class="relative pt-12 bg-blueGray-50">
<div class="items-center flex flex-wrap">
  <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
    <img alt="..." class="max-w-full rounded-lg shadow-lg" src="https://cdn.idntimes.com/content-images/post/20210910/cseyuwew8aq04vj-9a010b7b56eb60a7a6c379a33b3df8ec.jpg">
   <br>
   
    <a href="tiket.php" type="button" class="justify-center py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 focus:outline-none focus:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-400 dark:hover:bg-blue-900 dark:focus:bg-blue-900">
  Pesan Sekarang
</a>
  </div>
  <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
    <div class="md:pr-12">
      <div class="text-blue-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-blue-300 mt-8">
        <i class="fas fa-plane text-xl"></i>
      </div>
      <h3 class="text-3xl font-semibold">Air Air An</h3>
      <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
        Selamat Datang di Air Air An, kami menyediakan layanan tiket pesawat ke seluruh penjuru dunia
      </p>
      <ul class="list-none mt-6">
        <li class="py-2">
          <div class="flex items-center">
            <div>
              <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200 mr-3"><i class="fas fa-skull"></i></span>
            </div>
            <div>
              <h4 class="text-blueGray-500">
                Perjalanan menyenangkan bersama Air Air An
              </h4>
            </div>
          </div>
        </li>
        <li class="py-2">
          <div class="flex items-center">
            <div>
              <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200 mr-3"><i class="fas fa-bolt"></i></span>
            </div>
            <div>
              <h4 class="text-blueGray-500">Cepat sampai tujuan</h4>
            </div>
          </div>
        </li>
        <li class="py-2">
          <div class="flex items-center">
            <div>
              <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200 mr-3"><i class="far fa-paper-plane"></i></span>
            </div>
            <div>
              <h4 class="text-blueGray-500">Mencakup seluruh penjuru dunia</h4>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<footer class="relative  pt-8 pb-6 mt-8">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-6/12 px-4 mx-auto text-center">
      </div>
    </div>
  </div>
</footer>
</section>
<?php include_once 'kemana.php';?>
<section id="footer">
  <?php include_once 'footer.php';?>
  </section>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>{{ config('app.name') }}</title>
</head>
<body>
    <nav class="p-6 bg-black text-white flex justify-between items-center">
      <h1 class="text-3xl">Booth Booking</h1>
      <div >
        <ul>
          <li class="flex gap-5">
            <a href="/">Beranda</a>
            <a href="/pesan_booth">Pesan Booth</a>
            <a href="/cara_pemesanan">Cara Memesan Booth ?</a>
            <a href="/authPage">Login</a>
          </li>
        </ul>
      </div>
</nav>
  @yield('content') 

<footer class="p-6 bg-black text-white  w-full">
    <div >
      <h1>Footer</h1>
    </div>
</footer>
</body>
</html>

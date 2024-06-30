<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>{{ config('app.name') }}</title>
</head>
<body class="bg-gray-100">
    <!-- Sticky Navbar -->
    <nav class="sticky top-0 p-6 bg-black text-white flex justify-between items-center z-10">
      <h1 class="text-3xl">Booth Booking</h1>
      <div class="hidden md:block">
        <ul class="flex gap-5">
          <li><a href="/" class="hover:text-gray-300">Beranda</a></li>
          <li><a href="/pesan_booth" class="hover:text-gray-300">Pesan Booth</a></li>
          <li><a href="/cara_pemesanan" class="hover:text-gray-300">Cara Memesan Booth?</a></li>
          <li><a href="/authPage" class="hover:text-gray-300">Login</a></li>
        </ul>
      </div>
      <!-- Mobile Menu Button -->
      <div class="block md:hidden">
        <button id="menu-button" class="focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </nav>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden p-6 bg-black text-white">
      <ul class="flex flex-col gap-5">
        <li><a href="/" class="hover:text-gray-300">Beranda</a></li>
        <li><a href="/pesan_booth" class="hover:text-gray-300">Pesan Booth</a></li>
        <li><a href="/cara_pemesanan" class="hover:text-gray-300">Cara Memesan Booth?</a></li>
        <li><a href="/authPage" class="hover:text-gray-300">Login</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div>
        @yield('content')
    </div>

    <footer class="p-6 bg-black text-white w-full mt-6">
        <div>
          <h1>Footer</h1>
        </div>
    </footer>

    <script>
      // Toggle mobile menu
      const menuButton = document.getElementById('menu-button');
      const mobileMenu = document.getElementById('mobile-menu');
      menuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
      });
    </script>
</body>
</html>

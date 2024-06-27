<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }} - Admin</title>
</head>
<body>
    <nav class="p-6 bg-black text-white flex justify-between items-center">
        <h1 class="text-3xl">Booth Booking</h1>
        <div >
          <ul>
            <li class="flex gap-5">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a  href="{{ route('booth-management.index') }}">Booth Management</a>
                <a href="{{ route('user-management.index') }}">User Management</a>
                <a href="{{ url('logout') }}">Logout</a>
            </li>
          </ul>
        </div>
  </nav>
    @yield('content') 
</body>
</html>
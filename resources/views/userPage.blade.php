@extends('layout.layout')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg relative">
    <div class="absolute top-0 right-0 m-6">
        <a href="{{ url('logout') }}" class="bg-red-500 text-white p-3 rounded-lg hover:bg-red-600 transition duration-300">Logout</a>
    </div>
    <h1 class="text-4xl font-bold mb-4">Welcome, {{ $user->name }}</h1>
    <div class="text-lg mb-4">
        <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
        <p><span class="font-semibold">Username:</span> {{ $user->username }}</p> 
        <p><span class="font-semibold">Booth Booked:</span> {{ $user->booth_booked }}</p> 
    </div>
    <a href="{{ url('print-pdf') }}" class="bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition duration-300">Print PDF</a>
</div>
@endsection

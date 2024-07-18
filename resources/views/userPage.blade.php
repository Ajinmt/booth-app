@extends('layout.layout')

@section('content')
<!-- <div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg relative">
    <div class="absolute top-0 right-0 m-6">
        <a href="{{ url('logout') }}" class="bg-red-500 text-white p-3 rounded-lg hover:bg-red-600 transition duration-300">Logout</a>
    </div>
    <h1 class="text-4xl font-bold mb-4">Welcome, {{ $user->name }}</h1>
    <div class="text-lg mb-4">
        <p><span class="font-semibold">Email:</span>    </p>
        <p><span class="font-semibold">Username:</span> {{ $user->username }}</p> 
        <p><span class="font-semibold">Booth Booked:</span> {{ $user->booth_booked }}</p> 
    </div>
    <a href="{{ url('print-pdf') }}" class="bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition duration-300">Print PDF</a>
</div> -->
<div class=" h-screen flex justify-center items-center flex-col">
    <h1 class="text-4xl font-bold mb-4">Welcome, {{ $user->name }}</h1>
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col items-center py-10">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"> {{ $user->name }}</h5>
            <p class="text-sm text-gray-500 dark:text-gray-400"> {{ $user->username }}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400"> {{ $user->email }}</p>
            <div class="flex mt-4 md:mt-6 gap-8">
                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-secondary hover:opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Print PDF</a>
                <a href="{{ url('logout') }}" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 ">logout</a>
            </div>
        </div>
    </div>
</div>

@endsection

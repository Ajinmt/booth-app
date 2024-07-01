@extends('layout.layout')
@section ('content')
<h1 class="text-center md:text-3xl mb-5">Booth Tersedia</h1>


    <div class="grid grid-cols-4 item md:px-52 ">
    @foreach ($booths as $booth)
        <div class="m-2">
                <div class="bg-white p-4 shadow-md rounded-lg">
                    <h2 class="text-xl font-semibold mb-2">{{ $booth->nama }}</h2>
                    <p class="text-gray-600 mb-2">Stand: {{ $booth->deskripsi}}</p>  
                    <p class="text-gray-600 mb-2">Harga: {{ $booth->harga }}</p> <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Pesan Sekarang
                </button>
                </div>
        </div>
    @endforeach
    </div>

@endsection
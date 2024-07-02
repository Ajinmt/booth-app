@extends('layout.layout')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
<div class="px-3 py-10 md:px-52 md:py-20  mt-20 flex justify-center items-center flex-col gap-5">
    <h1 class="md:text-6xl text-5xl text-center font-bold md:mb-10">Pemesanan Stand Booth Festival Rakyat Kota Kediri</h1>
    <div class="flex gap-5 md:w-1/2 w-full">
        <a href="" class="bg-secondary  hover:opacity-80 text-white font-semibold rounded-xl focus:outline-none focus:shadow-outline px-8 py-5 w-full text-center">Pesan Sekarang</a>
        <a href="#check-booth" class="outline outline-1 outline-primary hover:opacity-80 font-semibold rounded-xl focus:shadow-outline px-8 py-5 w-full text-center focus:outline-none">Cek Booth</a>
    </div>
</div>

<div  id="check-booth">
    <h1 class="text-center md:text-3xl mb-5">Booth Tersedia</h1>
    <div class="flex justify-center items-center flex-col">
      <div class="md:px-52">
        <img src="  {{ asset('img/Denah.png') }}" alt="">
      </div>
        <div class="flex md:flex-row md:justify-center md:gap-10 gap-3 md:p-5 flex-wrap w-full max-h-screen overflow-hidden ">
            <!-- Loop through booths here -->
              @foreach ($booths as $booth)
        <div class="w-fit bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 md:py-6 py-4 mb-3">
            <a href="#">
                <h1 class="md:text-7xl text-3xl text-center font-bold">{{ $booth->nama }}</h1>
            </a>
            <div class="md:px-5 md:pb-5 ">
                    <h5 class="md:text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $booth->deskripsi }}</h5>
                <div class="flex items-center justify-between gap-2">
                    <span class="md:text-2xl font-bold text-gray-900 dark:text-white">Rp.{{ number_format($booth->harga, 2, ',', '.') }}</span>
                    @if(auth()->check())
                        <a href="https://wa.me/?text=I'm interested in booking the booth: {{ $booth->nama }}" class="text-white bg-secondary  hover:opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Pesan</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white bg-secondary hover:opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Login</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
        </div>
        <div class="flex justify-center">
            <a href= "{{url('pesan_booth')}}" class="rounded-full outline outline-gray-400 outline-1 px-8 py-2">Lihat Selengkapnya</a>
        </div>
    </div>
</div>
@endsection

@extends('layout.layout')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
<div class="px-3 py-10 md:px-52 md:py-32 flex justify-center items-center flex-col gap-5">
    <h1 class="md:text-6xl text-5xl text-center font-bold md:mb-10">Pemesanan Stand Booth Festival Rakyat Kota Kediri</h1>
    <div class="flex gap-5 md:w-1/2 w-full">
        <a href="" class="bg-black hover:opacity-80 text-white font-semibold rounded focus:outline-none focus:shadow-outline px-8 py-5 w-full text-center">Pesan Sekarang</a>
        <a href="#check-booth" class="outline outline-1 outline-black hover:opacity-80 font-semibold rounded focus:shadow-outline px-8 py-5 w-full text-center focus:outline-none">Cek Booth</a>
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
                <div class="rounded-3xl flex md:justify-center md:items-center md:gap-10  md:py-10 md:px-5 md:w-fit w-1/2 py-3 px-5 md:flex-row flex-col gap-4 {{ Str::startsWith($booth->nama, 'A') ? 'bg-pink-500' : (Str::startsWith($booth->nama, 'B') ? 'bg-blue-300' : (Str::startsWith($booth->nama, 'C') ? 'bg-orange-500' : 'bg-blue-500')) }}">
                    <div class="md:max-w-20 max-w-10 ">
                        <h2 class="text-white md:text-4xl text-3xl font-bold">{{ $booth->nama }}</h2>
                        <p class="text-white md:text-md text-[14px]">{{ $booth->deskripsi }}</p>
                        <p class="text-white font-medium">Rp.{{ $booth->harga }}</p>
                    </div>
                    <div>
                        <h1 class="text-white md:text-2xl font-bold">Tersedia </h1>
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

@extends('layout.layout')
@section ('content')
<div class="px-3 py-10 md:px-52 md:py-32 flex justify-center items-center flex-col gap-5">
      <h1 class="md:text-6xl text-5xl text-center font-bold md:mb-10 ">Pemesanan Stand Booth festival rakyat Kota Kediri</h1>
      <div class="flex gap-5  md:w-1/2 w-full">
        <a href="" class="bg-black hover:opacity-80 text-white font-semibold  rounded focus:outline-none focus:shadow-outline px-8 py-5 w-full text-center">Pesan Sekarang</a>
          <a href="#check-booth"  class="outline outline-1 outline-black hover:opacity-80  font-semibold  rounded focus:outline-none focus:shadow-outline px-8 py-5 w-full text-center focus:outline-none ">Cek Booth</a>
       
      
      </div>
    </div>

    <div class="md:px-52 " id="check-booth">
        <h1 class="text-center md:text-3xl mb-5">Booth Tersedia</h1>
        <div class="flex justify-center flex-col ">
          <img src="https://assets.pikiran-rakyat.com/crop/0x76:1080x756/750x500/photo/2022/11/12/1215709881.jpg" alt="">
          <div class="flex flex-row justify-center gap-10 md:p-5  flex-wrap w-full max-h-96 overflow-hidden">
            <div class="p-16 bg-blue-500">1</div>
          
          </div>
          <div class="flex justify-center">
             <a href="" class="rounded-full outline outline-gray-400  outline-1 px-8 py-2 ">Lihat Selengkapnya </a>
          </div>
        </div>
    </div>
@endsection
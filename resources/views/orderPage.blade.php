@extends('layout.layout')

@section('content')
<h1 class="text-center md:text-3xl mb-5">Booth Tersedia</h1>

<div class="grid grid-cols-2 md:grid-cols-4 place-items-center md:px-10 md:mt-10 mt-14">
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
                        <button class="text-white bg-secondary hover:opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center pesan-button" data-nama="{{ $booth->nama }}" data-deskripsi="{{ $booth->deskripsi }}" data-harga="{{ number_format($booth->harga, 2, ',', '.') }}" data-modal-target="default-modal" data-modal-toggle="default-modal">Pesan</button>
                    @else
                        <a href="{{ route('login') }}" class="text-white bg-secondary hover:opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " >Login</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">
    <div class="relative p-4 w-full max-w-2xl">
        <!-- Konten modal -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Header modal -->
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Spesifikasi Data
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8" id="close-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>
            <!-- Body modal -->
            <div class="p-4 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Berikut adalah spesifikasi untuk data yang Anda pesan:
                </p>
                <ul class="list-disc list-inside text-gray-500 dark:text-gray-400">
                    <li><strong>Nama Booth:</strong> <span id="modal-nama"></span></li>
                    <li><strong>Deskripsi:</strong> <span id="modal-deskripsi"></span></li>
                    <li><strong>Harga:</strong> Rp.<span id="modal-harga"></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    // Mendapatkan elemen modal dan tombol
const modal = document.getElementById('default-modal');
const openModalButtons = document.querySelectorAll('.pesan-button');
const closeModalButton = document.getElementById('close-modal');

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        document.getElementById('modal-nama').innerText = button.getAttribute('data-nama');
        document.getElementById('modal-deskripsi').innerText = button.getAttribute('data-deskripsi');
        document.getElementById('modal-harga').innerText = button.getAttribute('data-harga');
        modal.classList.remove('hidden');
    });
});

// Menutup modal ketika tombol ditutup diklik
closeModalButton.addEventListener('click', () => {
    modal.classList.add('hidden');
});

// Menutup modal jika area di luar modal diklik
modal.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.classList.add('hidden');
    }
});
</script>

@endsection

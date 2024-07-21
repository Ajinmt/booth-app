@extends('layout.layout')

@section('content')

<div class="mt-20">
    <h1 class="text-center md:text-3xl mb-5">Booth Tersedia</h1>
    
    <img src="{{ asset('img/Denah.png') }}" class="my-10 mx-auto ">
    <div class="grid grid-cols-1 md:grid-cols-4 place-items-center md:px-10 md:mt-10">
        @foreach ($booths as $booth)
        <div class="w-96 md:w-72 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 md:py-6 py-4 mb-3 " id="booth-{{ $booth->id }}">
            <a href="#">
                <h1 class="text-7xl text-7xl text-center font-bold">{{ $booth->nama }}</h1>
            </a>
            <div class="md:px-3 px-5">
                <div class="w-3/4">
                    <h5 class="md:text-md text-sm tracking-tight text-gray-900 dark:text-white">
                        {{ $booth->deskripsi }}
                    </h5>
                </div>
                <span class="md:text-2xl font-bold text-gray-900 dark:text-white">
                    Rp.{{ number_format($booth->harga, 2, ',', '.') }}
                </span>
                <div class="flex items-center justify-between gap-5 mt-5">
                    @if (auth ()->check())
                    <div>
                        <form method="POST" action="{{ route('toggle.favorite', $booth->id) }}" id="favorite-form-{{ $booth->id }}" class="hidden">
                            @csrf
                        </form>
                        <button type="button" class="focus:outline-none love-button" data-booth-id="{{ $booth->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ $booth->isFavorited() ? '#EF5A6F' : 'none' }}" stroke="black" class="size-8 love-icon {{ $booth->isFavorited() ? 'text-red-500' : 'text-gray-500' }}">
                                <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z"/>
                            </svg>
                        </button>
                    </div>
                    @endif
                    @if ($booth->status == 'tersedia')
                        @if(auth()->check())
                            <a class="text-white bg-secondary hover:opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer pesan-button w-full" 
                               data-booth-id="{{ $booth->id }}" 
                               data-harga="{{ $booth->harga }}" 
                               data-modal-target="popup-modal" 
                               data-modal-toggle="popup-modal">
                                Pesan
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-white bg-secondary hover:opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer w-full">
                                Pesan
                            </a>
                        @endif
                    @else
                        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-full">
                            Tidak Tersedia
                        </button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin memesan booth ini?</h3>
                <form id="transaksi-form" method="POST" action="{{ route('transaksi.store') }}">
                    @csrf
                    <input type="hidden" name="booth_id" id="booth_id" value="">
                    <input type="hidden" name="harga" id="harga" value="">
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                    <button type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="popup-modal">
                        No, cancel
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pesanButtons = document.querySelectorAll('.pesan-button');
        pesanButtons.forEach(button => {
            button.addEventListener('click', function () {
                const boothId = this.dataset.boothId;
                const harga = this.dataset.harga;

                document.getElementById('booth_id').value = boothId;
                document.getElementById('harga').value = harga;
            });
        });

        const loveButtons = document.querySelectorAll('.love-button');
        loveButtons.forEach(button => {
            button.addEventListener('click', function () {
                const boothId = this.dataset.boothId;
                const form = document.getElementById(`favorite-form-${boothId}`);
                const icon = this.querySelector('.love-icon');

                if (icon.classList.contains('text-pink-500')) {
                    icon.classList.remove('text-pink-500');
                } else {
                    icon.classList.add('text-pink-500');
                }

                form.submit();
            });
        });
    });
</script>

@endsection

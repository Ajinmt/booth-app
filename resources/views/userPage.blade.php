@extends('layout.layout')

@section('content')
<div class="mt-20">
    <div class="grid md:grid-cols-3 grid-cols-1 place-items-center md:place-items-stretch  gap-4 px-5 ">
        <div>
             <div class="w-full max-w-sm bg-white border border-gray-200 rounded-2xl shadow dark:bg-gray-800 dark:border-gray-700 h-fit   ">
            <div class="flex flex-col items-center py-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('img/Profile.png') }}" alt="Profile image"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->name }}</h5>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->username }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                <div class="flex mt-4 md:mt-6 gap-8">
                    <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-secondary hover:opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Print PDF</a>
                    <a href="{{ url('logout') }}" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4">Logout</a>
                </div>
            </div>
        </div>
        <div>
            <div  class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Simpan Booth</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Tekan Love pada card booth yang ingin anda pilih</p>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-3">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Booth Number</th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($boothLove as $love)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $love->nama}}</th>
                            <td class="px-6 py-4"><svg xmlns="http://www.w3.org/2000/svg" fill="#EF5A6F"  viewBox="0 0 24 24"   className="size-6"><path strokeLinecap="round" strokeLinejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </td>
                </tr>

                @endforeach
                    </tbody>
                </table>
</div>

        </div>
        </div>
        <div class ="col-span-2">
            <!-- Tabel Pembelian -->
            <div class="relative overflow-x-auto mb-20">
                <h1 class="text-xl  mb-4">Pembelian</h1>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Id Transaksi</th>
                            <th scope="col" class="px-6 py-3">Nomor Booth</th>
                            <th scope="col" class="px-6 py-3">Category</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($pendingTransaksi as $transaksi)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$transaksi->id}}</th>
                            <td class="px-6 py-4">{{$transaksi->booth->nama}}</td>
                            <td class="px-6 py-4">{{$transaksi->status}}</td>
                            <td class="px-6 py-4">Rp. {{$transaksi->harga}}</td>
                        </tr>
                          @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tabel Riwayat Transaksi -->
              <div class="relative overflow-x-auto mb-20">
                <h1 class="text-xl mb-4">Riwayat Transaksi</h1>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Product name</th>
                            <th scope="col" class="px-6 py-3">Color</th>
                            <th scope="col" class="px-6 py-3">Category</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchaseHistory as $history)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$history->id}}</th>
                            <td class="px-6 py-4">{{$history->booth->nama}}</td>
                            <td class="px-6 py-4">{{$history->status}}</td>
                            <td class="px-6 py-4">Rp. {{$history->harga}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tabel BoothList -->
        </div>
    </div>
</div>
@endsection

@extends('admin.adminLayout')

@section('content')
<div class="relative container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Daftar Booth</h1>
    <a href="{{ route('booth-management.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-4">Tambah Booth Baru</a>
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-900 dark:text-white">Nama</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-900 dark:text-white">Deskripsi</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-900 dark:text-white">Harga</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-900 dark:text-white">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($booths as $booth)
            <tr>
                <td class="py-3 px-4 text-sm text-gray-900 dark:text-black">{{ $booth->nama }}</td>
                <td class="py-3 px-4 text-sm text-gray-900 dark:text-black ">{{ $booth->deskripsi }}</td>
                <td class="py-3 px-4 text-sm text-gray-900 dark:text-black">Rp {{ number_format($booth->harga, 0, ',', '.') }}</td>
                <td class="py-3 px-4 text-sm text-gray-900 dark:text-black">
                    <div class="flex space-x-2">
                        <a href="{{ route('booth-management.edit', $booth->id) }}" class="inline-block bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('booth-management.destroy', $booth->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

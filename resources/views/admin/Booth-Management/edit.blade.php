@extends('admin.adminPage')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-semibold mb-6">Edit Booth</h1>

        <form action="{{ route('booth-management.update', $booth->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="nama" name="nama" value="{{ $booth->nama }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-gray-700 text-sm font-bold mb-2">Harga:</label>
                <input type="text" id="harga" name="harga" value="{{ $booth->harga }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $booth->deskripsi }}</textarea>
            </div>  
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Booth</button>
            </div>
        </form>
    </div>
@endsection

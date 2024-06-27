@extends('admin.adminPage')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-center text-xl font-semibold mb-4">Create User</h3>
            <form action="{{ route('user-management.store') }}" method="POST" id="createForm" class="space-y-4">
                @csrf
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-3"
                        placeholder="Masukkan Nama" required autofocus />
                    @if ($errors->has('name'))
                    <span class="text-red-500 text-sm">* {{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input id="username" type="text" name="username" value="{{ old('username') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-3"
                        placeholder="Masukkan Username" required />
                    @if ($errors->has('username'))
                    <span class="text-red-500 text-sm">* {{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-3"
                        placeholder="Masukkan Email" required />
                    @if ($errors->has('email'))
                    <span class="text-red-500 text-sm">* {{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-3"
                        placeholder="Masukkan Password" required />
                    @if ($errors->has('password'))
                    <span class="text-red-500 text-sm">* {{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputLevel" class="block text-sm font-medium text-gray-700">Level</label>
                    <select id="inputLevel" name="level" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-3">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    @if ($errors->has('level'))
                        <span class="text-red-500 text-sm">* {{ $errors->first('level') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit"
                        class="w-full bg-black text-white py-2 px-4 rounded-md hover:bg-gray-700 transition duration-200">
                        Daftar!
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

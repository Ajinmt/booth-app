@extends('layout.layout')
@section ('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md mt-20">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-center text-xl font-semibold mb-4">Create Account</h3>
            <form action="{{ route('proses_register') }}" method="POST" id="regForm" class="space-y-4">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700" for="inputFirstName">Nama</label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-3" id="inputFirstName" type="text" name="name" placeholder="Masukkan Nama" />
                    @if ($errors->has('name'))
                        <span class="text-red-500 text-sm">* {{ $errors->first('name') }}</span>
                    @endif
                </div>
                <!-- <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700" for="inputusername">Username</label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-3" id="inputusername" type="text" name="username" placeholder="Masukkan Username" />
                    @if ($errors->has('username'))
                        <span class="text-red-500 text-sm">* {{ $errors->first('username') }}</span>
                    @endif
                </div> -->
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700" for="inputEmailAddress">Email</label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-3" id="inputEmailAddress" type="email" name="email" placeholder="Masukkan Email" />
                    @if ($errors->has('email'))
                        <span class="text-red-500 text-sm">* {{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="block text-sm font-medium text-gray-700" for="inputPassword">Password</label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-3" id="inputPassword" type="password" name="password" placeholder="Masukkan Password" />
                    @if ($errors->has('password'))
                        <span class="text-red-500 text-sm">* {{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="w-full bg-secondary text-white py-2 px-4 rounded-xl hover:opacity-80 transition duration-200" type="submit">Daftar!</button>
                </div>
                <div>
                <p class="text-center mb-3">Atau</p>
                    <div>
                        <button class="outline  outline-1 outline-secondary  hover:bg-opacity-80  font-medium text-sm py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline w-full flex justify-center items-center focus:outline-secondary focus:outline " type="submit"> <img src="https://img.icons8.com/color/48/000000/google-logo.png" alt="">Register Menggunakan Google</button>
                        </div>
                </div>
            </form>
            <div class="mt-4 text-center">
                <a class=" hover:underline" href="{{ route('login') }}">Sudah Punya Akun? <strong>Login !</strong></a>
            </div>
             
        </div>
    </div>
</div>
@endsection

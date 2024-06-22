@extends('layout.layout')
@section('content')
<div id="layoutAuthentication" class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
    <div id="layoutAuthentication_content" class="w-full max-w-md">
            <div class="container mx-auto">
                <div class="flex justify-center">
                    <div class="w-full">
                        <div class="bg-white shadow-lg rounded-lg mt-5">
                            {{-- Error Alert --}}
                            @if(session('error'))
                            <div class="bg-red-500 text-white text-sm font-bold px-4 py-3 rounded relative" role="alert">
                                {{session('error')}}
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.586 7.066 4.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 12.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934z"/></svg>
                                </span>
                            </div>
                            @endif
                            <div class="p-6">
                                <form action="{{url('proses_login')}}" method="POST" id="logForm">
                                    {{ csrf_field() }}
                                    <div class="mb-4">
                                        @error('login_gagal')
                                            <div class="bg-yellow-500 text-white text-sm font-bold px-4 py-3 rounded relative" role="alert">
                                                <span class="block sm:inline">  {{ $message }}</span>
                                            </div>
                                            @enderror
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="inputEmailAddress">Username</label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="inputEmailAddress"
                                            name="username"
                                            type="text"
                                            placeholder="Masukkan Username"/>
                                        @if($errors->has('username'))
                                        <span class="text-red-500 text-xs italic">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-6">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="inputPassword">Password</label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                            id="inputPassword"
                                            type="password"
                                            name="password"
                                            placeholder="Masukkan Password"/>
                                        @if($errors->has('password'))
                                        <span class="text-red-500 text-xs italic">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex items-center justify-between mt-4 mb-0">
                                            <button class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">Login</button>
                                    </div>
                                </form>
                                <p>belum punya akun? <a href="{{url('register')}}" class="text-blue-500">Daftar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection

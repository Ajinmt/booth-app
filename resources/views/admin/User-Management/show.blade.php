@extends('layout.layout')

@section('content')
    <div class="container mx-auto mt-20">
        <h1 class="text-3xl font-semibold mb-6">User Details</h1>

        <div class="mb-4">
            <p><strong>Name:</strong> {{ $user->name }}</p>
        </div>
        <div class="mb-4">
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
        <div class="mb-4">
            <p><strong>Username:</strong> {{ $user->username }}</p>
        </div>
        <div class="mb-4">
            <p><strong>Level:</strong> {{ $user->level }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('user-management.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Back</a>
        </div>
    </div>
@endsection

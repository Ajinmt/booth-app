@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Welcome, {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <p>Username: {{ $user->username }}</p> 
    <p>Booth Booked: {{ $user->booth_booked }}</p> 

    <a href="{{ url('logout') }}" class="bg-red-500 p-5 rounded-lg">Logout</a>
</div>
@endsection

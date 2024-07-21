@extends('layout.layout')

@section('content')
<div class="container mt-20">
    <h2>Daftar Transaksi Pending</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Booth</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingTransactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->booth->name }}</td>
                    <td>{{ $transaction->harga }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td>
                        <a href="{{ route('transaction.edit', ['id' => $transaction->id]) }}" class="btn btn-primary">Ubah Status</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

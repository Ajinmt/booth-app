@extends('layout.layout')

@section('content')
<div class="container mt-20">
    <h2>Ubah Status Transaksi</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('transaction.updateStatus', ['id' => $transaction->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="lunas" {{ $transaction->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ubah Status</button>
    </form>
</div>
@endsection

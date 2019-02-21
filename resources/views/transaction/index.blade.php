@extends('layouts.app')

@section('content')
<div class="container">
    <center><h1>Transaksi</h1></center>

    <table class="table table-striped mt-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Waktu Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr onclick="window.location='{{ route('transaction.show', $transaction) }}'" style="cursor: pointer">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $transaction->user->name }}</td>
                    <td>Rp {{ $transaction->total }}</td>
                    <td>Rp {{ $transaction->pay_total }}</td>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

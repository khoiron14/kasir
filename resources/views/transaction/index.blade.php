@extends('layouts.app')

@section('content')
    <section class="hero is-light is-fullheight">
        @include('layouts.navbar')
        <div class="hero-body">
            <div class="container">
                <div class="box">
                    <h3 class="title is-3 has-text-centered">Transaksi</h3>
                    <table class="table is-striped is-fullwidth is-hoverable">
                        <thead>
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
            </div>
        </div>
    </section>
@endsection

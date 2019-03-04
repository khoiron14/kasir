@extends('layouts.app')

@section('content')
<div class="container">
    <center><h1>Detail Transaksi</h1></center>
    <div class="float-right"><b>{{ date('d F Y', strtotime($transaction->created_at)) }}</b></div>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kategori</th>
                <th scope="col">Foto</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaction->details as $detail)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $detail->item->name }}</td>
                    <td>{{ $detail->item->category->name }}</td>
                    <td>
                        <img src="{{ asset($detail->item->image) }}" width="50px" height="50px">
                    </td>
                    <td>Rp {{ $detail->item->price }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>Rp {{ $detail->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

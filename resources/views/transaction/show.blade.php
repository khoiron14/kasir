@extends('layouts.app')

@section('content')
<section class="hero is-light is-fullheight">
    @include('layouts.navbar')
    <div class="hero-body">
        <div class="container">
            <div class="box">
                <h3 class="title is-3 has-text-centered">Detail Transaksi</h3>
                <table class="table is-striped is-fullwidth is-hoverable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subtotal</th>
                        <th scope="row">Tanggal</th>
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
                            <td>{{ date('d F Y', strtotime($transaction->created_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

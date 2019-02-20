@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    Pilih Barang
                </div>
                <div class="card-body">
                    <form>
                        <input type="hidden" name="item_id" id="itemId">

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="item_name" id="itemName" placeholder="Pilih barang..." readonly required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#pilihBarang">Pilih</button>
                                </div>
                            </div>

                            <div class="modal fade" id="pilihBarang">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Pilih Barang</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <table class="table table-stripped">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nama Barang</th>
                                                        <th scope="col">Kategori</th>
                                                        <th scope="col">Deskripsi</th>
                                                        <th scope="col">Harga</th>
                                                        <th scope="col">Stok</th>
                                                        <th scope="col">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($items as $key => $item)
                                                        <tr>
                                                            <th scope="row">{{ $key + 1 }}</th>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->category->name }}</td>
                                                            <td>{{ $item->description }}</td>
                                                            <td>Rp. {{ $item->price }}</td>
                                                            <td>{{ $item->stock }}</td>
                                                            <td>
                                                                <button 
                                                                    type="button" 
                                                                    class="btn btn-sm btn-primary" 
                                                                    data-dismiss="modal"
                                                                    onclick="
                                                                        $('#itemId').val('{{ $item->id }}')
                                                                        $('#itemName').val('{{ $item->name }}')
                                                                    "
                                                                >
                                                                    Pilih
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" value="1" class="form-control" name="quantity" placeholder="Masukkan jumlah..." required>
                                <div class="input-group-append">
                                    <span class="input-group-text">Unit</span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Tambah</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Pembayaran
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Total Harga</label>

                            <div class="input-group col-sm-10">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" name="total" placeholder="0" disabled required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah Bayar</label>

                            <div class="input-group col-sm-10">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" name="pay-total" placeholder="0" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="date" value="{{ date('d F Y') }}" disabled>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-stripped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kategori</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

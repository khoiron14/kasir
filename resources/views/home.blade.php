@extends('layouts.app')

@section('content')
<section class="hero is-fullheight" style="background-image: linear-gradient(to right bottom, #a5cad2, #97c0e5, #b5adea, #e690cb, #ff7b89);">
    @include('layouts.navbar')
    <div class="hero-body" style="padding-top: 100px">
        <div class="container">
            <div class="columns">
                <div class="column is-4">
                    <div class="box">
                        <h5 class="title is-5 has-text-centered">Pilih barang</h5>
                        <div class="is-divider"></div>
                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="item_id" id="itemId">
                            <div class="field has-addons">
                                <div class="control is-expanded has-icons-left">
                                    <input class="input modal-button is-rounded" type="text" id="itemName" placeholder="Pilih barang.." data-target="#modal" readonly>
                                    <span class="icon is-small is-left">
                                      <i class="fas fa-cubes"></i>
                                    </span>
                                </div>
                                <div class="control">
                                    <a class="button is-light modal-button is-rounded" data-target="#modal">Pilih</a>
                                    <div class="modal" id="modal">
                                        <div class="modal-background"></div>
                                        <div class="modal-content">
                                            <div class="box">
                                                <h5 class="title is-5 has-text-centered">Pilih Barang</h5>
                                                <table class="table is-fullwidth">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nama Barang</th>
                                                            <th scope="col">Kategori</th>
                                                            <th scope="col">Foto</th>
                                                            <th scope="col">Harga</th>
                                                            <th scope="col">Stok</th>
                                                            <th scope="col">Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($items as $item)
                                                            <tr>
                                                                <th>{{ $loop->iteration }}</th>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->category->name }}</td>
                                                                <td>
                                                                    <img src="{{ asset($item->image) }}" width="50px" height="50px">
                                                                </td>
                                                                <td>Rp {{ $item->price }}</td>
                                                                <td>{{ $item->stock }}</td>
                                                                <td>
                                                                    <button
                                                                        type="button"
                                                                        class="button is-info is-small addItemButton"
                                                                        data-dismiss="modal"
                                                                        onclick="
                                                                            $('#itemId').val('{{ $item->id }}')
                                                                            $('#itemName').val('{{ $item->name }}')
                                                                            $('#itemQty').attr('max', '{{ $item->stock }}')
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
                                        <button class="modal-close is-large" aria-label="close"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="field has-addons">
                                <div class="control is-expanded has-icons-left">
                                    <input class="input is-rounded" type="number" min="1" value="1" name="quantity" id="itemQty" placeholder="Find a repository">
                                    <span class="icon is-small is-left">
                                      <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div class="control">
                                    <a class="button is-rounded">Unit</a>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-text-right">
                                    <button type="submit" class="button is-info is-rounded">
                                        <i class="fas fa-shopping-cart"></i>
                                        &nbspTambah
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="column is-8">
                    <div class="box">
                        <h5 class="title is-5 has-text-centered">Pembayaran</h5>
                        <div class="is-divider"></div>
                        <form action="{{ route('transaction.store') }}" method="post">
                            @csrf
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Total Harga</label>
                                </div>
                                <div class="field-body">
                                    <div class="field has-addons">
                                        <div class="control">
                                            <a class="button is-rounded">Rp</a>
                                        </div>
                                        <div class="control is-expanded">
                                            <input
                                                type="number"
                                                class="input is-rounded"
                                                name="total"
                                                value="{{
                                                    $itemCarts->sum(function ($item) {
                                                        return $item->price * $item->cart->quantity;
                                                    })
                                                }}"
                                                placeholder="0"
                                                readonly
                                                required
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Total Bayar</label>
                                </div>
                                <div class="field-body">
                                    <div class="field has-addons">
                                        <div class="control">
                                            <a class="button is-rounded">Rp</a>
                                        </div>
                                        <div class="control is-expanded">
                                            <input
                                                type="number"
                                                class="input is-rounded"
                                                name="pay_total"
                                                placeholder="0"
                                                min="{{
                                                    $itemCarts->sum(function ($item) {
                                                        return $item->price * $item->cart->quantity;
                                                    })
                                                }}"
                                                required
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Tanggal</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control is-expanded has-icons-left">
                                            <input
                                                type="text"
                                                class="input is-rounded"
                                                name="date"
                                                value="{{ date('d F Y') }}"
                                                disabled
                                            >
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-text-right">
                                    <button type="submit" class="button is-info is-rounded">
                                        <i class="fas fa-dollar-sign"></i>
                                        &nbspBayar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="box">
                <h5 class="title is-5 has-text-centered">Keranjang</h5>
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th scope="col" class="has-text-centered">#</th>
                        <th scope="col" class="has-text-centered">Nama Barang</th>
                        <th scope="col" class="has-text-centered">Kategori</th>
                        <th scope="col" class="has-text-centered">Foto</th>
                        <th scope="col" class="has-text-centered">Harga</th>
                        <th scope="col" class="has-text-centered">Jumlah</th>
                        <th scope="col" class="has-text-centered">Subtotal</th>
                        <th scope="col" class="has-text-centered">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($itemCarts as $item)
                        <tr>
                            <th scope="row" class="has-text-centered">{{ $loop->iteration }}</th>
                            <td class="has-text-centered">{{ $item->name }}</td>
                            <td class="has-text-centered">{{ $item->category->name }}</td>
                            <td class="has-text-centered">
                                <img src="{{ asset($item->image) }}" width="50px" height="50px">
                            </td class="has-text-centered">
                            <td class="has-text-centered">Rp {{ $item->price }}</td>
                            <td class="has-text-centered">{{ $item->cart->quantity }}</td>
                            <td class="has-text-centered">Rp {{ $item->price * $item->cart->quantity }}</td>
                            <td>
                                <div class="field is-grouped is-grouped-centered">
                                    <div class="control">
                                        <button class="button is-warning modal-button is-rounded" data-target="#ubahJumlah{{ $loop->iteration }}">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </div>
                                    <div class="control">
                                        <form action="{{ route('cart.destroy', $item->cart) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button is-danger is-rounded">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal" id="ubahJumlah{{ $loop->iteration }}">
                                    <div class="modal-background"></div>
                                    <div class="modal-content">
                                        <div class="box">
                                            <h5 class="title is-5 has-text-centered">Ubah Jumlah '{{ $item->name }}'</h5>
                                            <form action="{{ route('cart.update', $item->cart) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="field has-addons">
                                                    <div class="control is-expanded has-icons-left">
                                                        <input
                                                            type="number"
                                                            min="1"
                                                            max="{{ $item->stock }}"
                                                            value="{{ $item->cart->quantity }}"
                                                            class="input is-rounded"
                                                            name="quantity"
                                                            placeholder="Masukkan jumlah..."
                                                            required
                                                        >
                                                        <span class="icon is-small is-left">
                                                                <i class="fas fa-plus"></i>
                                                            </span>
                                                    </div>
                                                    <div class="control">
                                                        <a class="button is-rounded">Unit</a>
                                                    </div>
                                                </div>
                                                <div class="field">
                                                    <div class="control has-text-right">
                                                        <button type="submit" class="button is-info is-rounded">Ubah</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <button class="modal-close is-large" aria-label="close"></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

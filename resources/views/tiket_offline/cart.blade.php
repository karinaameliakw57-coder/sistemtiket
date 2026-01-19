@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Keranjang Tiket Offline</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (count($cart) === 0)
        <p>Keranjang masih kosong</p>
        <a href="{{ route('tiket.offline.index') }}" class="btn btn-secondary">Kembali</a>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pertandingan</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp

                @foreach ($cart as $item)
                    @php
                        $subtotal = $item['harga'] * $item['qty'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['kategori'] }}</td>
                        <td>Rp {{ number_format($item['harga']) }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>Rp {{ number_format($subtotal) }}</td>
                        <td class="d-flex gap-1">
                            {{-- Form tambah qty --}}
                            <form action="{{ route('tiket.offline.cart.add') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="tiket_id" value="{{ $item['tiket_id'] }}">
                                <button type="submit" class="btn btn-primary btn-sm">+</button>
                            </form>

                            {{-- Form hapus tiket --}}
                            <form action="{{ route('tiket.offline.cart.remove') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="tiket_id" value="{{ $item['tiket_id'] }}">
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <th colspan="4">Total</th>
                    <th colspan="2">Rp {{ number_format($total) }}</th>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('tiket.offline.checkout') }}" method="POST">
            @csrf
            <button class="btn btn-success">
                Checkout & Simpan Transaksi
            </button>
              <a href="{{ route('tiket.offline.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    @endif
</div>
@endsection

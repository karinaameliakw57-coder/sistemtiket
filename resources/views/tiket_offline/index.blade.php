@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Pembelian Tiket Offline</h3>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tombol Keranjang --}}
        <div class="mb-3">
            <a href="{{ route('tiket.offline.cart') }}" class="btn btn-primary">
                🛒 Lihat Keranjang
            </a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pertandingan</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th width="220px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tikets as $tiket)
                    <tr>
                        <td>{{ $tiket->pertandingan->namaPertandingan }}</td>
                        <td>{{ $tiket->kategoriKursi }}</td>
                        <td>Rp {{ number_format($tiket->harga) }}</td>

                        <td>
                            <form action="{{ route('tiket.offline.cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="tiket_id" value="{{ $tiket->id }}">
                                <button class="btn btn-sm btn-primary">
                                    Tambah ke Keranjang
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Form Pembelian Tiket Offline</h3>

    <form action="{{ route('tiket.offline.store') }}" method="POST">
        @csrf

        <input type="hidden" name="tiket_id" value="{{ $tiket->id }}">

        <div class="mb-3">
            <label>Nama Pembeli</label>
            <input type="text" name="nama_pembeli" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jumlah Tiket</label>
            <input type="number" name="jumlah" class="form-control" min="1" required>
        </div>

        <button class="btn btn-primary">
            Simpan Pembelian
        </button>

        <a href="{{ route('tiket.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection

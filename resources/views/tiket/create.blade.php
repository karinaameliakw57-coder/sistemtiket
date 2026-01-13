@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Tiket</h2>

    <form action="{{ route('tiket.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Pertandingan</label>
        <select name="idPertandingan" class="form-control" required>
            <option value="">-- Pilih Pertandingan --</option>
            @foreach($pertandingan as $p)
                <option value="{{ $p->id }}">{{ $p->namaPertandingan }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jenis Tiket</label>
        <input type="text" name="kategoriKursi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="jumlahTersedia" class="form-control" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('tiket.index') }}" class="btn btn-secondary">Kembali</a>
</form>

</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2 class="mb-3">Tambah Stadion</h2>

    <form action="{{ route('stadion.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Stadion</label>
            <input type="text" name="namaStadion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('stadion.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>

@endsection

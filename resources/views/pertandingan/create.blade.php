@extends('layouts.app')
@section('content')
    <div class="container mt-4">

        <h3 class="mb-3">Tambah Pertandingan</h3>

        <form action="{{ route('pertandingan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Pertandingan</label>
                <input type="text" name="namaPertandingan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tim Home</label>
                <input type="text" name="timHome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tim Away</label>
                <input type="text" name="timAway" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Waktu</label>
                <input type="time" name="waktu" class="form-control" required>
            </div>



            <div class="mb-3">
                <label>Stadion</label>
                <select name="idStadion" class="form-control" required>
                    <option value="">-- Pilih Stadion --</option>
                    @foreach ($stadion as $s)
                        <option value="{{ $s->id }}">{{ $s->namaStadion }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="{{ route('pertandingan.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
@endsection

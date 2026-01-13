@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Tiket</h2>

    <form action="{{ route('tiket.update', $tiket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Pertandingan</label>
            <select name="pertandingan_id" class="form-control" required>
                @foreach($pertandingan as $p)
                    <option value="{{ $p->id }}" 
                        @if($p->id == $tiket->pertandingan_id) selected @endif>
                        {{ $p->namaPertandingan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ $tiket->harga }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Tiket</label>
            <input type="text" name="jenis_tiket" value="{{ $tiket->kategoriKursi}}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="{{ $tiket->jumlahTersedia }}" class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('tiket.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

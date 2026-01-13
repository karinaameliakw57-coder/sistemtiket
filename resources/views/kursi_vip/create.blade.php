@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Kursi VIP</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('kursi-vip.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Pertandingan</label>
            <select name="pertandingan_id" class="form-control" required>
                <option value="">-- Pilih --</option>
                @foreach($pertandingan as $p)
                    <option value="{{ $p->id }}">{{ $p->namaPertandingan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Baris Kursi (contoh: A)</label>
            <input type="text" name="baris" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jumlah Kursi</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <button class="btn btn-primary">Generate Kursi</button>
    </form>
</div>
@endsection

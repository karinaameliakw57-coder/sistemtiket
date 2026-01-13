@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Tiket VIP</h3>

    {{-- tampilkan error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tiket.vip.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Pertandingan</label>
            <select name="idPertandingan" class="form-control" required>
                <option value="">-- Pilih Pertandingan --</option>
                @foreach ($pertandingan as $p)
                    <option value="{{ $p->id }}">
                        {{ $p->namaPertandingan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Harga VIP</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan Tiket VIP</button>
        <a href="{{ route('tiket.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

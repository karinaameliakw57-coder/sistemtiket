@extends('layouts.app')
@section('content')


<div class="container mt-4">
    <h2 class="mb-3">Edit Stadion</h2>

    <form action="{{ route('stadion.update', $stadion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Stadion</label>
            <input type="text" name="namaStadion" class="form-control" value="{{ $stadion->namaStadion }}" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $stadion->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label>Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" value="{{ $stadion->kapasitas }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('stadion.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>

@endsection

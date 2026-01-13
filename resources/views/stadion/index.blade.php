@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Data Stadion</h2>

    @if (session('success'))    
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('stadion.create') }}" class="btn btn-primary mb-3">Tambah Stadion</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Stadion</th>
                <th>Alamat</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stadion as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->namaStadion }}</td>
                <td>{{ $s->alamat }}</td>
                <td>{{ $s->kapasitas }}</td>
                <td>
                    <a href="{{ route('stadion.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('stadion.destroy', $s->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus Stadion ini?')">Hapus</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

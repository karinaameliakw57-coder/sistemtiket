@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h3 class="mb-3">Data Pertandingan</h3>

    <a href="{{ route('pertandingan.create') }}" class="btn btn-primary mb-3">+ Tambah Pertandingan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>namaPertandingan</th>
                <th>Tim Home</th>
                <th>Tim Away</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Stadion</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($pertandingan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->namaPertandingan }}</td>
                <td>{{ $p->timHome }}</td>
                <td>{{ $p->timAway }}</td>
                <td>{{ $p->tanggal }}</td>
                <td>{{ $p->waktu }}</td>
                <td>{{ $p->stadion->namaStadion ?? '-' }}</td>

                <td>
                    <!-- BUTTON HAPUS -->
                    <form action="{{ route('pertandingan.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Yakin hapus pertandingan?')" 
                                class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection
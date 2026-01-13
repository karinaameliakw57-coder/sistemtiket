@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Kursi VIP</h2>

    <div class="mb-3">
        <a href="{{ route('kursi-vip.create') }}" class="btn btn-success">
            + Tambah Kursi VIP
        </a>

        <a href="{{ route('tiket.index') }}" class="btn btn-secondary">
            ← Kembali ke Tiket
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Pertandingan</th>
                <th>Nomor Kursi</th>
                <th>Status</th>
                <th width="120px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kursiVip as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->pertandingan->namaPertandingan }}</td>
                    <td>
                        <span class="badge bg-primary">
                            {{ $k->nomor_kursi }}
                        </span>
                    </td>
                    <td>
                        @if($k->status == 'tersedia')
                            <span class="badge bg-success">Tersedia</span>
                        @else
                            <span class="badge bg-danger">Dipesan</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('kursi-vip.destroy', $k->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus kursi ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($kursiVip->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">
                        Data kursi VIP belum ada
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Tiket</h2>

    <div class="mb-3 d-flex gap-2 flex-wrap">
        <a href="{{ route('tiket.create') }}" class="btn btn-primary">
            + Tambah Tiket Reguler
        </a>

        <a href="{{ route('tiket-vip.create') }}" class="btn btn-success">
            + Tambah Tiket VIP
        </a>

        <a href="{{ route('kursi-vip.index') }}" class="btn btn-info">
            Lihat Kursi VIP
        </a>

        {{-- ✅ PERBAIKAN ROUTE --}}
        <a href="{{ route('tiket.offline.index') }}" class="btn btn-dark">
            Pembelian Tiket Offline
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pertandingan</th>
                <th>Harga</th>
                <th>Jenis Tiket</th>
                <th>Stok Tersedia</th>
                <th width="320px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tiket as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>

                    <td>
                        {{ $ticket->pertandingan->namaPertandingan ?? '-' }}
                    </td>

                    <td>
                        Rp {{ number_format($ticket->harga, 0, ',', '.') }}
                    </td>

                    <td>
                        {{ $ticket->kategoriKursi }}
                    </td>

                    <td>
                        @if ($ticket->kategoriKursi === 'VIP')
                            {{ $ticket->stok_vip ?? 0 }} 
                        @else
                            {{ $ticket->jumlahTersedia }}
                        @endif
                    </td>

                    <td class="d-flex gap-1 flex-wrap">
                        <a href="{{ route('tiket.edit', $ticket->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        @if ($ticket->pertandingan_id)
                            <a href="{{ route('tiket.vip.halaman', ['pertandingan' => $ticket->pertandingan_id]) }}"
                               class="btn btn-success btn-sm">
                                Beli VIP
                            </a>

                            {{-- ✅ Beli Offline diarahkan ke index offline --}}
                            <a href="{{ route('tiket.offline.index') }}"
                               class="btn btn-secondary btn-sm">
                                Beli Offline
                            </a>
                        @endif

                        <form action="{{ route('tiket.destroy', $ticket->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus tiket?')">
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

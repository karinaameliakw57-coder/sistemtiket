@extends('layouts.app')

@section('content')
<div class="container">

    {{-- HEADER + FILTER + TOTAL --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <h3 class="mb-0">📊 Laporan Penjualan Tiket</h3>

        <form method="GET" action="{{ route('laporan.penjualan') }}" class="d-flex align-items-end gap-2">
            <div>
                <label class="form-label mb-1">Dari</label>
                <input type="date" name="start_date" class="form-control"
                    value="{{ request('start_date') }}">
            </div>

            <div>
                <label class="form-label mb-1">Sampai</label>
                <input type="date" name="end_date" class="form-control"
                    value="{{ request('end_date') }}">
            </div>

            <div>
                <button class="btn btn-primary">
                    🔍 Filter
                </button>
            </div>

            @if(request('start_date'))
            <div>
                <a href="{{ route('laporan.penjualan') }}" class="btn btn-secondary">
                    Reset
                </a>
            </div>
            @endif
        </form>

        <div class="card shadow-sm border-success">
            <div class="card-body py-2 px-3 text-end">
                <small class="text-muted">Total Semua Penjualan</small>
                <div class="fw-bold text-success fs-5">
                    Rp {{ number_format($grandTotal, 0, ',', '.') }}
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL --}}
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pertandingan</th>
                    <th>Detail Kursi</th>
                    <th class="text-end">Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y H:i') }}</td>
                    <td>
                        {{ $item->namaPertandingan }} <br>
                        <small class="text-muted">
                            {{ $item->timHome }} vs {{ $item->timAway }}
                        </small>
                    </td>
                    <td>{{ $item->detail_kursi }}</td>
                    <td class="text-end fw-semibold">
                        Rp {{ number_format($item->total_bayar, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Tidak ada data penjualan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

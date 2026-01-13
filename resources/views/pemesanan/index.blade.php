@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">🎟️ Pilih Tiket Pertandingan</h2>

    <div class="row">
        @forelse ($tiket as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $item->pertandingan->namaPertandingan ?? 'Tanpa Pertandingan' }}
                        </h5>

                        <p class="mb-1">
                            <strong>Jenis Tiket:</strong> {{ $item->kategoriKursi }}
                        </p>

                        <p class="mb-1">
                            <strong>Harga:</strong>
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </p>

                        <p>
                            <strong>Stok:</strong>
                            @if ($item->kategoriKursi === 'VIP')
                                Kursi tersedia
                            @else
                                {{ $item->jumlahTersedia }}
                            @endif
                        </p>

                        <a href="{{ route('pesan.form', $item->id) }}"
                           class="btn btn-primary w-100">
                            Pesan Tiket
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada tiket tersedia.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection

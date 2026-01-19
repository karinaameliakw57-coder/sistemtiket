@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>STRUK PEMBELIAN TIKET</h4>
            <small>Transaksi Offline</small>
        </div>

        <div class="card-body">
            <p><strong>ID Transaksi:</strong> {{ $pemesanan->id }}</p>
            <p><strong>Tanggal:</strong> {{ $pemesanan->created_at->format('d M Y H:i') }}</p>
            <p>
                <strong>Status:</strong>
                <span class="badge bg-success text-uppercase">
                    {{ $pemesanan->statusPemesanan }}
                </span>
            </p>

            {{-- ========================= --}}
            {{-- QR CODE ISI JSON (BUKAN LINK) --}}
            {{-- ========================= --}}
            @php
                $qrData = json_encode([
                    'id_transaksi' => $pemesanan->id,
                    'tanggal'      => $pemesanan->created_at->format('Y-m-d H:i:s'),
                    'status'       => $pemesanan->statusPemesanan,
                    'total'        => $pemesanan->details->sum('subtotal'),
                    'tiket'        => $pemesanan->details->map(function ($item) {
                        return [
                            'pertandingan' =>
                                optional($item->tiket->pertandingan)->timHome . ' vs ' .
                                optional($item->tiket->pertandingan)->timAway,
                            'kategori' => $item->tiket->kategoriKursi,
                            'qty'      => $item->kuantitas,
                            'harga'    => $item->tiket->harga,
                        ];
                    }),
                ], JSON_UNESCAPED_UNICODE);
            @endphp

            <div class="text-center my-3">
                {!! QrCode::size(150)->generate($qrData) !!}
                <p class="mt-1">
                    <small>Scan untuk melihat data transaksi (JSON)</small>
                </p>
            </div>

            <hr>

            @php $total = 0; @endphp

            @foreach ($pemesanan->details as $item)
                <p>
                    <strong>Pertandingan:</strong>
                    {{ optional($item->tiket->pertandingan)->timHome ?? '-' }}
                    vs
                    {{ optional($item->tiket->pertandingan)->timAway ?? '-' }}
                </p>

                <p><strong>Kategori:</strong> {{ $item->tiket->kategoriKursi ?? '-' }}</p>

                <p>
                    <strong>Harga:</strong>
                    Rp {{ number_format($item->tiket->harga ?? 0) }}
                </p>

                <p><strong>Jumlah:</strong> {{ $item->kuantitas }}</p>

                <p>
                    <strong>Subtotal:</strong>
                    Rp {{ number_format($item->subtotal) }}
                </p>

                <hr>

                @php $total += $item->subtotal; @endphp
            @endforeach

            <h5 class="text-end">
                Total Bayar:
                <strong>Rp {{ number_format($total) }}</strong>
            </h5>
        </div>

        <div class="card-footer text-center">
            <button onclick="window.print()" class="btn btn-primary">
                Cetak Struk
            </button>

            <a href="{{ route('tiket.offline.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Official Ticket</h1>
        <p class="text-muted">Beli tiket pertandingan sepak bola resmi</p>
    </div>

    <!-- LIST PERTANDINGAN -->
    <div class="row">
        @forelse ($pertandingan as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            {{ $item->tim_home }} vs {{ $item->tim_away }}
                        </h5>

                        <p class="mb-1">
                            🏟️ {{ $item->stadion->nama }}
                        </p>
                        <p class="mb-2">
                            📅 {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                        </p>

                        @auth
                            <a href="{{ route('tiket.show', $item->id) }}"
                               class="btn btn-success w-100">
                                Beli Tiket
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="btn btn-outline-success w-100">
                                Login untuk Beli Tiket
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada pertandingan tersedia</p>
            </div>
        @endforelse
    </div>

</div>
@endsection

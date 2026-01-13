@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Beli Tiket VIP</h3>

    <p>
        <strong>Pertandingan:</strong>
        {{ $pertandingan->namaPertandingan }}
    </p>

    <hr>

    <h5>Daftar Kursi VIP</h5>

    <div class="row">
        @foreach ($kursiVip as $kursi)
            <div class="col-2 mb-2">
                <button class="btn 
                    {{ $kursi->status == 'tersedia' ? 'btn-success' : 'btn-secondary' }}"
                    {{ $kursi->status != 'tersedia' ? 'disabled' : '' }}>
                    {{ $kursi->nomor_kursi }}
                </button>
            </div>
        @endforeach
    </div>
</div>
@endsection

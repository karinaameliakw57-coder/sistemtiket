@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Pilih Kursi VIP</h3>
    <p><strong>Pertandingan:</strong> {{ $pertandingan->namaPertandingan }}</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($kursi as $k)
            <div class="col-2 mb-3 text-center">
                @if($k->status == 'tersedia')
                    <form action="{{ route('tiket.vip.beli') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kursi_id" value="{{ $k->id }}">
                        <button class="btn btn-success w-100">
                            {{ $k->nomor_kursi }}
                        </button>
                    </form>
                @else
                    <button class="btn btn-secondary w-100" disabled>
                        {{ $k->nomor_kursi }}
                    </button>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection

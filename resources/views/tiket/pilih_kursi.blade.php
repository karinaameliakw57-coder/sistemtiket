@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Pilih Kursi VIP</h3>

    <form action="{{ route('tiket.vip.beli') }}" method="POST">
        @csrf
        <input type="hidden" name="pertandingan_id" value="{{ $pertandinganId }}">

        <div class="row">
            @foreach($kursi as $k)
                <div class="col-2 mb-2">
                    <label class="btn 
                        {{ $k->status == 'tersedia' ? 'btn-success' : 'btn-danger disabled' }}">
                        <input type="radio" name="kursi_id"
                               value="{{ $k->id }}"
                               {{ $k->status == 'dipesan' ? 'disabled' : '' }}>
                        {{ $k->nomor_kursi }}
                    </label>
                </div>
            @endforeach
        </div>

        <button class="btn btn-primary mt-3">Beli Tiket VIP</button>
    </form>
</div>
@endsection

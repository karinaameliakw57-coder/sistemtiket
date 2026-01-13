@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Tiket</h3>

    <ul>
        <li>ID Tiket: {{ $tiket->id }}</li>
        <li>Harga: {{ $tiket->harga }}</li>
        <li>Status: {{ $tiket->status }}</li>
    </ul>

    <a href="{{ route('tiket.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>
@endsection

@extends('layout')

@section('content')
<h3>Edit Pertandingan</h3>

<form action="{{ route('pertandingan.update', $pertandingan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Stadion</label>
        <select name="id_stadion" class="form-control">
            @foreach ($stadion as $s)
                <option value="{{ $s->id }}" 
                    {{ $pertandingan->id_stadion == $s->id ? 'selected' : '' }}>
                    {{ $s->nama_stadion }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tim Home</label>
        <input type="text" name="tim_home" class="form-control" 
               value="{{ $pertandingan->tim_home }}">
    </div>

    <div class="mb-3">
        <label>Tim Away</label>
        <input type="text" name="tim_away" class="form-control" 
               value="{{ $pertandingan->tim_away }}">
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" 
               value="{{ $pertandingan->tanggal }}">
    </div>

    <div class="mb-3">
        <label>Waktu</label>
        <input type="time" name="waktu" class="form-control" 
               value="{{ $pertandingan->waktu }}">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="belum mulai" {{ $pertandingan->status == 'belum mulai' ? 'selected' : '' }}>Belum Mulai</option>
            <option value="berlangsung" {{ $pertandingan->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
            <option value="selesai" {{ $pertandingan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection

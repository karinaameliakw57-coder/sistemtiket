@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Tiket App</a>
        <div>
            <a href="/pengguna" class="btn btn-light btn-sm">Pengguna</a>
            <a href="/stadion" class="btn btn-light btn-sm">Stadion</a>
            <a href="/pertandingan" class="btn btn-light btn-sm">Pertandingan</a>
            <a href="/tiket" class="btn btn-light btn-sm">Tiket</a>
            <a href="/pemesanan" class="btn btn-light btn-sm">Pemesanan</a>
            <a href="/pembayaran" class="btn btn-light btn-sm">Pembayaran</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>

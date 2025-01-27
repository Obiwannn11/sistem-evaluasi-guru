@extends('layouts.main')

@section('content')
<h1>Tambah Guru</h1>
<form action="{{ route('guru.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" name="nip" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="text" name="telepon" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="telepon" class="form-label">Password</label>
        <input type="password" name="telepon" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection

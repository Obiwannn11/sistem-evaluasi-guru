@extends('layouts.main')

@section('content')
<h1>Edit Guru</h1>
<form action="{{ route('guru.update', $guru->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" value="{{ $guru->nama }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" name="nip" value="{{ $guru->nip }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" value="{{ $guru->email }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="text" name="telepon" value="{{ $guru->telepon }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="text" name="password" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection

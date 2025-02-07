@extends('layouts.main')

@section('content')
<h1>Data Guru</h1>

<!-- Form untuk mengedit data guru -->
<form >
    @csrf
    @method('PUT') <!-- Menggunakan metode PUT untuk update -->
    <div class="mb-3 col-md-5">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" value="{{ $data['id'] }}" class="form-control" disabled required>
    </div>

    <div class="mb-3 col-md-5">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" value="{{ $data['nama'] }}" class="form-control" required>
    </div>

    <div class="mb-3 col-md-5">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" name="nip" value="{{ $data['nip'] }}" class="form-control" required>
    </div>

    <div class="mb-3 col-md-5">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" value="{{ $data['email'] }}" class="form-control" required>
    </div>

    <div class="mb-3 col-md-5">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="text" name="telepon" value="{{ $data['telepon'] }}" class="form-control" required>
    </div>

    <div class="d-flex justify-content-between mb-3 col-md-5">

        {{-- <a href="{{ route('user.guru.index') }}" class="btn btn-primary">Kembali</a> --}}
        <a href="{{ route('user.guru.edit', $data['id']) }}" class="btn btn-warning">Edit Data</a>
    </div>
</form>

@endsection

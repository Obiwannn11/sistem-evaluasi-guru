@extends('layouts.main')

@section('content')
<h1>Data Guru</h1>
<form action="{{ route('user.guru.update', $data['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 col-md-5">
        <label for="nama" class="form-label">ID</label>
        <input type="text" name="nama" value="{{ $data['id'] }}" class="form-control" required>
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
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection

@extends('layouts.main')

@section('content')
<h1>Edit Data Guru ({{ Auth::user()->nama }})</h1>
<form action="{{ route('user.guru.update', $data['id']) }}" method="POST">
    @csrf
    @method('PUT')
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
    <div class="mb-3 col-md-5">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" value="" class="form-control">
    </div>
    <div class="mb-3 col-md-5 d-flex justify-content-between">
        <a href="{{ route('user.guru.index') }}" class="btn btn-primary">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>
@endsection

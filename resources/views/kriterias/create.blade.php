@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Tambah Kriteria</h1>

    <!-- Form untuk menambah kriteria -->
    <form action="{{ route('kriterias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kriteria</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <label for="bobot" class="form-label">Bobot Kriteria</label>
            <input type="text" name="bobot" id="bobot" class="form-control" value="{{ old('bobot') }}" required>
            @error('bobot')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('kriterias.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

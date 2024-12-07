@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Edit Guru</h1>

    <form action="{{ route('gurus.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $guru->nama) }}" required>
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip', $guru->nip) }}" required>
            @error('nip')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bidangStudi" class="form-label">Bidang Studi</label>
            <input type="text" name="bidangStudi" id="bidangStudi" class="form-control" value="{{ old('bidangStudi', $guru->bidangStudi) }}" required>
            @error('bidangStudi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('gurus.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

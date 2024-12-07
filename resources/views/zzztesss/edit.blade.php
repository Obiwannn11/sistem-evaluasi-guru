@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Edit Penilaian</h1>

    <form action="{{ route('penilaians.update', $penilaian->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="guru_id" class="form-label">Guru</label>
            <select name="guru_id" id="guru_id" class="form-control">
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}" {{ old('guru_id', $penilaian->guru_id) == $guru->id ? 'selected' : '' }}>
                        {{ $guru->nama }}
                    </option>
                @endforeach
            </select>
            @error('guru_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kriteria_id" class="form-label">Kriteria</label>
            <select name="kriteria_id" id="kriteria_id" class="form-control">
                @foreach ($kriterias as $kriteria)
                    <option value="{{ $kriteria->id }}" {{ old('kriteria_id', $penilaian->kriteria_id) == $kriteria->id ? 'selected' : '' }}>
                        {{ $kriteria->nama }}
                    </option>
                @endforeach
            </select>
            @error('kriteria_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="number" step="0.01" name="nilai" id="nilai" class="form-control" value="{{ old('nilai', $penilaian->nilai) }}">
            @error('nilai')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('penilaians.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

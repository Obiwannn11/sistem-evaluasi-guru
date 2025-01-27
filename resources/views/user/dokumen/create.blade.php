@extends('layouts.main')

@section('content')
<h1>Unggah Dokumen</h1>
<form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="guru_id" class="form-label">Guru</label>
        <select name="guru_id" class="form-control" required>
            @foreach ($guru as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="kriteria_id" class="form-label">Kriteria</label>
        <select name="kriteria_id" class="form-control" required>
            @foreach ($kriteria as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="file_path" class="form-label">File</label>
        <input type="file" name="file_path" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Unggah</button>
</form>
@endsection

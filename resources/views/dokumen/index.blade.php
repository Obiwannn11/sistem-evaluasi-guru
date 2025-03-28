@extends('layouts.main')

@section('content')
<h1>Daftar Dokumen</h1>
<a href="{{ route('dokumen.create') }}" class="btn btn-primary">Unggah Dokumen</a>
<table class="table">
    <thead>
        <tr>
            <th>Guru</th>
            <th>Kriteria</th>
            <th>File</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dokumen as $item)
        <tr>
            <td>{{ $item->guru->nama }}</td>
            <td>{{ $item->kriteria->nama }}</td>
            <td><a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="btn btn-success"><i class="bi bi-file-earmark-text"></i> Lihat File</a></td>
            <td>
                <form action="{{ route('dokumen.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

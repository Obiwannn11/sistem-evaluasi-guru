@extends('layouts.main')

@section('content')
<h1>Dokumen Anda ({{ Auth::User()->nama }})</h1>
<a href="{{ route('dokumen.create') }}" class="btn btn-primary">Unggah Dokumen Baru</a>
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
        {{-- {{ dd($dokumen) }} --}}
        {{-- {{ dd(Auth::User()) }} --}}
        @foreach ($dokumen as $item)
        <tr>
            <td>{{ $item->guru->nama }}</td>
            <td>{{ $item->kriteria->nama }}</td>
            <td><a href="{{ asset('storage/' . $item->file_path) }}" target="_blank">Lihat File</a></td>
            <td>
                <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning">Edit</a>
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

@extends('layouts.main')

@section('content')
<h1>Dokumen Anda ({{ Auth::User()->nama }})</h1>
<a href="{{ route('user.dokumen.create') }}" class="mb-3 btn btn-primary">Unggah Dokumen Baru</a>


{{-- Area untuk menampilkan pesan error validasi --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


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
            <td><a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="btn btn-success" > <i class="bi bi-file-earmark-text"></i> Lihat File</a></td>
            <td>
                <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('user.dokumen.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" ">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

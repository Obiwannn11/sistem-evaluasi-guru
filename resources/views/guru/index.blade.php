@extends('layouts.main')

@section('content')
<h1>Daftar Guru</h1>
<a href="{{ route('guru.create') }}" class="btn btn-primary">Tambah Guru</a>
<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($guru as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nip }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->telepon }}</td>
            <td>
                <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('guru.destroy', $item->id) }}" method="POST" style="display:inline;">
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

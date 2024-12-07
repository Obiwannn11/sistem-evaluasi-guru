@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Kriteria</h1>
    <a href="{{ route('kriterias.create') }}" class="btn btn-primary">Tambah Kriteria</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriterias as $kriteria)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kriteria->nama_kriteria }}</td>
                    <td>{{ $kriteria->bobot }}</td>
                    <td>
                        <a href="{{ route('kriterias.edit', $kriteria->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kriterias.destroy', $kriteria->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

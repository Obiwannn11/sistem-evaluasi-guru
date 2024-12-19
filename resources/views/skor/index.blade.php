@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Skor</h1>
    <a href="{{ route('skors.create') }}" class="btn btn-primary">Tambah Skor</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Guru</th>
                <th>Kriteria</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($skors) }} --}}
                @foreach ($skors as $skor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $skor->guru }}</td>
                        <td>{{ $skor->kriteria }}</td>
                        <td>{{ $skor->nilai }}</td>
                        <td>
                        <a href="{{ route('skors.edit', $skor->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('skors.destroy', $skor->id) }}" method="POST" style="display: inline-block;">
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

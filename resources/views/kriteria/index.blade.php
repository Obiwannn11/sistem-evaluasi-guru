@extends('layouts.main')

@section('content')
<h1>Daftar Kriteria</h1>
<table class="table">
    <thead>
        <tr>
            <th>Nama Kriteria</th>
            {{-- <th>Jenis Nilai</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($kriteria as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            {{-- <td>{{ $item->tipe }}</td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

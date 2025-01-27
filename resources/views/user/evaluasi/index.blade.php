@extends('layouts.main')

@section('content')
<h1>Daftar Guru untuk Penilaian</h1>

<table class="table">
    <thead>
        <tr>
            <th>Nama Guru</th>
            <th>NIP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    {{-- {{ dd($evaluasi) }} --}}
        @foreach ($guru as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nip }}</td>
            <td>
                <a href="{{ route('evaluasi.show', $item->id) }}" class="btn btn-primary">Berikan Penilaian</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

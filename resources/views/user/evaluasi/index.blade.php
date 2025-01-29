@extends('layouts.main')

@section('content')
<h1>Detail Penilaian Guru: {{ Auth::User()->nama }}</h1>
<p>NIP: {{ Auth::User()->nip }}</p>

<table class="table">
    <thead>
        <tr>
            <th>Kriteria</th>
            <th>Nilai</th>
            <th>Komentar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($evaluasi as $e)
        <tr>
            <td>{{ $e->kriteria->nama }}</td> <!-- Asumsi ada relasi kriteria di model Evaluasi -->
            <td>{{ $e->nilai ?? 0 }}</td>
            <td>{{ $e->komentar ?? 'Tidak ada Komentar'}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="" class="btn btn-success"><i class="bi bi-printer"></i> Cetak Nilai</a>
@endsection

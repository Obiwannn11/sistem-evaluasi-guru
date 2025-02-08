@extends('layouts.main')

@section('content')
<h1>Detail Penilaian Guru: {{ Auth::User()->nama }}</h1>
{{-- <p>NIP: {{ Auth::User()->nip }}</p>
<p>Nilai Akhir: {{ $totalNilai }} / 100</p> --}}

<div class="mb-3 col-md-5">
    <table class="table table-md table-bordered ">
        <tbody>
            <tr>
                <th scope="row">Nama Guru</th>
                <td>: {{ Auth::User()->nama }}</td>
            </tr>
            <tr>
                <th scope="row">NIP</th>
                <td>: {{ Auth::User()->nip }}</td>
            </tr>
            <tr>
                <th scope="row">Nilai Akhir</th>
                <td>: {{ $totalNilai }} / 100</td>
            </tr>
        </tbody>
    </table>
</div>

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
            <td>{{ $e->kriteria->nama }}</td> <!--  ada relasi kriteria di model Evaluasi -->
            <td>{{ $e->nilai ?? 0 }}</td>
            <td>{{ $e->komentar ?? 'Tidak ada Komentar'}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mb-3 col-md-5">
    <label for="guru_id" class="form-label"><strong>Nilai Akhir Kamu ({{ Auth::User()->nama }})</strong></label>
    <input type="text" id="guru_id" class="form-control" name="guru_id" value="{{ $totalNilai }}" disabled>
</div>
<a href="" class="btn btn-success"><i class="bi bi-printer"></i> Cetak Nilai</a>
@endsection

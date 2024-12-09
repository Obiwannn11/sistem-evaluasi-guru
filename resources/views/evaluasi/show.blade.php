@extends('layouts.main')

@section('content')
<h1>Evaluasi Kinerja Guru: {{ $guru->nama }}</h1>
<form action="{{ route('evaluasi.store') }}" method="POST">
    @csrf
    <input type="hidden" name="guru_id" value="{{ $guru->id }}">

    <table class="table">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th>File</th>
                <th>Nilai</th>
                <th>Komentar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteria as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>
                    @php
                        $dokumen = $guru->dokumen->where('kriteria_id', $item->id)->first();
                    @endphp
                    @if ($dokumen)
                    <a href="{{ asset('storage/' . $dokumen->file_path) }}" target="_blank">Lihat File</a>
                    @else
                    <span class="text-danger">Belum Diunggah</span>
                    @endif
                </td>
                <td>
                    @if ($item->jenis_nilai === 'ordinal')
                    <select name="nilai[{{ $item->id }}]" class="form-control" required>
                        <option value="0">0 - Tidak Ada</option>
                        <option value="1">1 - Ada, Tidak Terlaksana</option>
                        <option value="2">2 - Ada, Terlaksana</option>
                    </select>
                    @elseif ($item->jenis_nilai === 'numerik' || $item->jenis_nilai === 'persentase')
                    <input type="number" name="nilai[{{ $item->id }}]" class="form-control" min="0" max="100" required>
                    @endif
                </td>
                <td>
                    <textarea name="komentar[{{ $item->id }}]" class="form-control" rows="2" placeholder="Tambahkan komentar..."></textarea>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="btn btn-success">Simpan Evaluasi</button>
</form>
@endsection

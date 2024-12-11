@extends('layouts.main')

@section('content')
<h1>Evaluasi Guru: {{ $guru->nama }}</h1>

<form action="{{ route('evaluasi.store') }}" method="POST">
    @csrf
    <input type="hidden" name="guru_id" value="{{ $guru->id }}">

    <table class="table">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th>Dokumen</th>
                <th>Nilai</th>
                <th>Komentar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteria as $k)
            <tr>
                <td>{{ $k->nama }}</td>
                <td>
                    @if ($guru->dokumen->where('kriteria_id', $k->id)->first())
                        <a href="{{ Storage::url($guru->dokumen->where('kriteria_id', $k->id)->first()->path) }}" target="_blank">Lihat Dokumen</a>
                    @else
                        <span class="text-danger">Belum Diunggah</span>
                    @endif
                </td>
                <td>
                    <input type="number" name="nilai[{{ $k->id }}]"
                        value="{{ $evaluasi->get($k->id)->nilai ?? '' }}"
                        min="0" max="100" class="form-control">
                </td>
                <td>
                    <textarea name="komentar[{{ $k->id }}]" class="form-control">{{ $evaluasi->get($k->id)->komentar ?? '' }}</textarea>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Disimpan',
            text: '{{ session('success') }}',
            showConfirmButton: true,
            timer: 3000 // Menampilkan notifikasi selama 3 detik
        });
    </script>
@endif

@endsection

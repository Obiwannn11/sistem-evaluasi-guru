@extends('layouts.main')

@section('index_evaluasi')
<div class="card shadow p-3">
    <h5><strong> Perencanaan</strong> Mata Pelajaran <strong>Kimia Kelas 11</strong></h5>
</div>

<div class="card shadow p-3">

    {{-- <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('materi.create') }}" role="button">Tambah</a>
    </div> --}}
        <div class="mb-3">
            <a class="btn btn-warning" href="" role="button"><strong>Kembali</strong></a>
            {{-- {{ dd($mapel) }} --}}
        </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered w-100" id="data-table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nama Program</th>
                    <th class="text-center">File</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1 ?>
                <?php foreach ($mapel as $mapels) : ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>

                        <td>Capaian Pembelajaran</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > {{ $mapels->cp }} </a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><strong>Edit</strong> </a>
                            {{-- <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a> --}}
                        </td>
                    </tr>


                    <tr>
                        <td class="text-center"><?= $i++; ?></td>

                        <td>Alur Tujuan Pembelajaran</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > {{ $mapels->atp }} </a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><strong>Edit</strong></a>
                            {{-- <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a> --}}
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center"><?= $i++; ?></td>

                        <td>Modul Ajar</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > {{ $mapels->ma }} </a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><strong>Edit</strong></a>
                            {{-- <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a> --}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>

                        <td>Program Semester</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > {{ $mapels->prosem}} </a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><strong>Edit</strong></a>
                            {{-- <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a> --}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>

                        <td>Program Tahunan</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > {{ $mapels->prota}} </a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><strong>Edit</strong></a>
                            {{-- <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a> --}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>

                        <td>Kriteria Ketercapaian Tujuan Pembelajaran</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > {{ $mapels->kktp }}</a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><strong>Edit</strong></a>
                            {{-- <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a> --}}
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center"><?= $i++; ?></td>

                        <td>Buku Bahan Ajar</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > {{ $mapels->bba}} </a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><strong>Edit</strong></a>
                            {{-- <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a> --}}
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center"><?= $i++; ?></td>

                        <td>Bonus</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > {{ $mapels->bonus }}</a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><strong>Edit</strong></a>
                            {{-- <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a> --}}
                        </td>
                    </tr>



                <?php endforeach ?>

            </tbody>
        </table>


    </div>

</div>


@endsection

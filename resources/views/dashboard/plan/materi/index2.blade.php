@extends('layouts.main')

@section('index_plan_materi')
<div class="card shadow p-3">
    <h5><strong> Perencanaan</strong> Metode Mengajar</h5>
</div>

<div class="card shadow p-3">

    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('materi.create') }}" role="button">Tambah</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered w-100" id="data-table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Judul File</th>
                    <th class="text-center">File</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1 ?>
                <?php //foreach ($file as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td>Fisika Kelas 11</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > fisika_11.pdf </a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><i class='bi bi-pencil-square'></i></a>
                            <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a>
                        </td>
                    </tr>


                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td>Biologi Kelas 11</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > biologi_11.pdf </a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><i class='bi bi-pencil-square'></i></a>
                            <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td>Matematika Kelas 12</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > matematika_12.pdf </a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><i class='bi bi-pencil-square'></i></a>
                            <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td>Sejarah Kelas 12</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > sejarah_12.pdf </a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><i class='bi bi-pencil-square'></i></a>
                            <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td>Kimia Kelas 12</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             <a href="/assets/uploads/file/" target="_blank" > kimia_12.pdf </a>
                        </td>
                        <td class="text-center text-nowrap">

                            {{-- route('dashboard.update', $materi->id) --}}
                            <a class="btn btn-warning me-1" href="{{ route('materi.index', ) }}" role="button"><i class='bi bi-pencil-square'></i></a>
                            <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a>
                        </td>
                    </tr>


                <?php //endforeach ?>

            </tbody>
        </table>
    </div>

</div>


@endsection

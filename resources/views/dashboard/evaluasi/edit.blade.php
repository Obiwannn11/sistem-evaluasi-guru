@extends('layouts.main')

@section('edit_evaluasi')

<form action="{{ route('file.index') }}">
@csrf

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
                <?php //foreach ($mapel as $mapels) : ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>

                        <td>Capaian Pembelajaran</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                            <a href="/assets/uploads/file/" target="_blank" > {{ $mapels->cp }} </a>
                        </td>
                        <td class="text-center text-nowrap">

                            <input class="form-control" type="file" id="upload" name="file" >
                            {{-- route('dashboard.update', $materi->id) --}}
                            {{-- <a class="btn btn-warning me-1" href="{{ route('file.edit', $mapels ) }}" role="button"><strong>Edit</strong> </a> --}}
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

                            <input class="form-control" type="file" id="upload" name="file" >
                            {{-- route('dashboard.update', $materi->id) --}}
                            {{-- <a class="btn btn-warning me-1" href="{{ route('file.edit', $mapels ) }}" role="button"><strong>Edit</strong></a> --}}
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

                            <input class="form-control" type="file" id="upload" name="file" >
                            {{-- route('dashboard.update', $materi->id) --}}
                            {{-- <a class="btn btn-warning me-1" href="{{ route('file.edit', $mapels ) }}" role="button"><strong>Edit</strong></a> --}}
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

                            <input class="form-control" type="file" id="upload" name="file" >
                            {{-- route('dashboard.update', $materi->id) --}}
                            {{-- <a class="btn btn-warning me-1" href="{{ route('file.edit', $mapels ) }}" role="button"><strong>Edit</strong></a> --}}
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

                            <input class="form-control" type="file" id="upload" name="file" >
                            {{-- route('dashboard.update', $materi->id) --}}
                            {{-- <a class="btn btn-warning me-1" href="{{ route('file.edit', $mapels ) }}" role="button"><strong>Edit</strong></a> --}}
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

                            <input class="form-control" type="file" id="upload" name="file" >
                            {{-- route('dashboard.update', $materi->id) --}}
                            {{-- <a class="btn btn-warning me-1" href="{{ route('file.edit', $mapels ) }}" role="button"><strong>Edit</strong></a> --}}
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

                            <input class="form-control" type="file" id="upload" name="file" >
                            {{-- route('dashboard.update', $materi->id) --}}
                            {{-- <a class="btn btn-warning me-1" href="{{ route('file.edit', $mapels ) }}" role="button"><strong>Edit</strong></a> --}}
                            {{-- <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a> --}}
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center"><?= $i++; ?></td>

                        <td>Bonus</td>

                        <td class="text-center">
                            <!-- <img src="/assets/uploads/file/ $row['isi_file']; ?>" alt=" //$row['judul_file'];" width="70"> -->
                             {{-- <a href="/assets/uploads/file/" target="_blank" > {{ $mapels->bonus }}</a> --}}
                             <input type="text" class="form-control" id="no_telpon" name="no_telpon" required value="{{ $mapels->bonus }}">

                             {{-- <div class="mb-3">
                                <label for="no_telpon" class="form-label">No Telepon <span class="text-danger">*</span></label>
                            </div> --}}

                        </td>
                        <td class="text-center text-nowrap">

                            <input class="form-control" type="file" id="upload" name="file" >
                            {{-- route('dashboard.update', $materi->id) --}}
                            {{-- <a class="btn btn-warning me-1" href="{{ route('file.edit', $mapels ) }}" role="button"><strong>Edit</strong></a> --}}
                            {{-- <a class="btn btn-danger button-delete" href="admin/file/hapus.php?id=" role="button"><i class='bi bi-trash'></i></a> --}}
                        </td>
                    </tr>



                <?php //endforeach ?>

            </tbody>
        </table>


    </div>


    <div class="m-3 d-flex justify-content-between">
            <a href="{{ route('file.index') }}" class="btn btn-warning" > Kembali </a>

            <button type="submit" id="simpan1" name="submit" class="btn btn-primary" > Simpan </button>
        </div>
</form>

@endsection

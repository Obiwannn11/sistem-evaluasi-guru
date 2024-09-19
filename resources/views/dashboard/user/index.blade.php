@extends('layouts.main')

@section('index_user')


<div class="card shadow p-3">
    <h5>User</h5>
</div>

<div class="card shadow p-3">

    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('user.create') }}" role="button">Tambah</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered w-100" id="data-table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1 ?>
                <?php foreach ($users as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td class="text-center"><?= $row['email']; ?></td>
                        <td class="text-start"><?= $row['name']; ?></td>
                        <td class="text-center"><?= $row['role'] ?></td>
                        <td class="text-center">
                            <?php if ($row['foto']) : ?>
                                <img src="{{ asset('images/setting/noprofil.png') }}" alt="<?= $row['nama']; ?>" width="70">
                            <?php else : ?>
                                <img src="assets/img/noprofil.png" alt="<?= $row['nama']; ?>" width="70">
                            <?php endif ?>
                        </td>
                        <td class="text-center text-nowrap">
                            <a class="btn btn-warning me-1" href="{{ route('user.edit', $row->id) }}" role="button"><i class='bi bi-pencil-square'></i></a>
                            <a class="btn btn-danger button-delete" href="" role="button"><i class='bi bi-trash'></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>

</div>



@endsection

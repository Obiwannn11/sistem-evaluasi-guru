@extends("layouts.main")

@section('edit_user')

<div class="card shadow p-3">
    <h5>Halaman Edit User</h5>
</div>

<div class="card shadow p-3">

    <form action="{{ route('user.update', $user->id) }}" method="put" id="form" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input class="form-control" type="file" id="upload" name="foto">
                </div>

                <?php if (true) : ?>
                    <img src="{{ asset('images/setting/noprofil.png') }}" alt="" id="preview" class="rounded w-100 ">
                <?php else : ?>
                    <img src="{{ asset('images/setting/noprofil.png') }}" alt="" id="preview" class="rounded w-100 ">
                <?php endif ?>

            </div>

            <div class="col-md-8">
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="email" name="email" required value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password </label>
                    <input type="password" class="form-control" id="password" name="password" minlength="8">
                </div>
                <div class="mb-3">
                    <label for="passwordconfirm" class="form-label">Konfirmasi Password </label>
                    <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm" minlength="8" data-parsley-equalto="#password">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama" name="nama" required value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="1"  {{ $user->role === "guru" ? 'selected' : '' }}  >Guru</option>
                        <option value="2"  {{ $user->role === "superguru" ? 'selected' : '' }}  >Superguru</option>
                    </select>
                </div>
            </div>

        </div>


        <a class="btn btn-warning" href="{{ route('user.index') }}" role="button">Cancel</a>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

</div>


@endsection

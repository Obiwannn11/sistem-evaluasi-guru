@extends('layouts.main')

@section('edit_plan_materi');

<div class="card shadow p-3">
    <h5>Halaman Edit File</h5>
</div>

<div class="card shadow p-3">

    <form action="" method="post" id="form" enctype="multipart/form-data">

        @csrf
        <div class="row mb-3">

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="isi_file" class="form-label">File Asli<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="upload" name="isi_file">
                </div>
                <img src="assets/uploads/file/" alt="" id="preview" class="rounded w-100 ">
            </div>

            <div class="col-md-8">
                <div class="mb-3">
                    <label for="judul_file" class="form-label">Judul file <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="judul_file" name="judul_file" value="Judul File Materi 1" required>
                </div>


            </div>

        </div>

        <a class="btn btn-warning" href="admin/file" role="button">Cancel</a>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php //$pengaturan['appname']; ?></title>
    <meta content="<?php //$pengaturan['description']; ?>" name="description">
    <meta content="<?php //$pengaturan['keyword']; ?>" name="keywords">
    <meta content="<?php //$pengaturan['author']; ?>" name="author">

    <!-- Favicons -->
    <link href="assets/img/" rel="icon">
    <link href="assets/img/" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- plugins CSS Files -->

    {{-- bootstrap  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- bootstrap icons  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    {{-- simple datatables  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">



    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    {{-- pesan berhasil atau gagal  --}}
    <div id="pesan-berhasil" data-pesan="<?= isset($_SESSION['berhasil']) ? $_SESSION['berhasil'] : ""; ?>"></div>
    <div id="pesan-gagal" data-pesan="<?= isset($_SESSION['gagal']) ? $_SESSION['gagal'] : ""; ?>"></div>

    <?php unset($_SESSION['berhasil']) ?>
    <?php unset($_SESSION['gagal']) ?>


    @include('components.navbar')


    @include('components.sidebar')


    <main id="main" class="main">

    @yield('content')
    @yield('index_profil')
    @yield('ubah_profil')

    @yield('index_user')
    @yield('tambah_user')
    @yield('edit_user')
    @yield('hapus_user')

    @yield('index_plan')
    @yield('tambah_plan')
    @yield('edit_plan')
    @yield('hapus_plan')

    @yield('index_plan_materi')
    @yield('create_plan_materi')
    @yield('edit_plan_materi')
    @yield('delete_plan_materi')





    </main>
    <!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer card">
    <div class="copyright fw-bold">
        <?php //$pengaturan['copyright']; ?>
    </div>

</footer><!-- End Footer -->

@include('components.modal_exit')


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

{{-- jquery  --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
{{-- validasi js  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- sweetalert  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- data tables -->
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<!-- plugins JS Files -->

{{-- boostrap js  --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


<!-- Template Main JS File -->
<script src="{{ asset('js/main.js') }}"></script>

<script>
    $('#form').parsley({
        errorClass: 'is-invalid text-red',
        successClass: 'is-valid',
        errorsWrapper: '<span class="invalid-feedback"></span>',
        errorTemplate: '<span></span>',
        trigger: 'change'
    });

    let pesanBerhasil = $('#pesan-berhasil').data('pesan')
    if (pesanBerhasil) {
        Swal.fire({
            title: "Good job!",
            text: pesanBerhasil,
            icon: "success"
        });
    }

    let pesanGagal = $('#pesan-gagal').data('pesan')
    if (pesanGagal) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: pesanGagal,
        });
    }

    $('#data-table').on('click', '.button-delete', function(e) {

        e.preventDefault()
        let href = $(this).attr('href')

        Swal.fire({
            title: "Anda yakin?",
            text: "Data akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus data!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href
            }
        });
    })



    $('#upload').on('change', function(event) {
        $('#preview').attr('src', URL.createObjectURL(event.target.files[0]))
    })

    new DataTable('#data-table');
</script>

</body>

</html>

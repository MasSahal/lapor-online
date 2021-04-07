<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Lapor Online</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/toastr/toastr.min.css') ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/summernote/summernote-bs4.min.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('/public/favicon.ico') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('/public/favicon.ico') ?>" type="image/x-icon">
    <?= $this->renderSection('css'); ?>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark bg-dark border-bottom-0">
            <div class="container">
                <a href="<?= base_url('/user'); ?>" class="navbar-brand px-2">
                    <!-- <!-- <img src="<?= base_url('/public/img/logo-white.svg') ?>" alt="" class="img-fluid" style="width:30px"> -->
                    <span class="brand-text font-weight-bold">Lapor</span> Online <sup><small>ID</small></sup>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url('/user') ?>" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/user/pengaduan-saya') ?>" class="nav-link">Pengaduan</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/user/syarat-ketentuan') ?>" class="nav-link">Ketentuan Layanan</a>
                        </li>
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">

                            <span>Halo, <?= session()->nama; ?> <i class="fa fa-user fa-fw"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header font-weight-bold">Halo, <?= session()->nama; ?></span>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('/user/pengaduan-saya') ?>" class="dropdown-item">
                                <i class="fa fa-file-alt fa-fw mr-2"></i> Pengaduan Saya
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('/user/profile') ?>" class="dropdown-item">
                                <i class="fa fa-user-cog fa-fw mr-2"></i> Ubah Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer bg-danger" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <?= $this->renderSection('content'); ?>

            <!-- /.content -->
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="text-center">
                <strong>Copyright &copy; 2021 <a href="<?= base_url() ?>">Lapor Online</a>.</strong> All rights reserved.
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->


    <!-- Modal Logout-->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog border-radius-0" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-body">
                    <div class="text-center p-3 m-3">
                        <h4>Yakin mau mengakhiri sesi?</h4>
                        <br>
                        <button class="btn rounded-0 btn-outline-secondary" data-dismiss="modal" aria-label="Close">Tidak</button>
                        &nbsp;
                        <a class="btn rounded-0 btn-danger" href="<?= base_url('/user/log-out') ?>">Akhiri sekarang!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Modal -->
    <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5>Tata cara pelaporan pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Untuk mengirim aduan melalui aplikasi Lapor Online!, baik di android maupun iOS, masyarakat mesti melakukan sejumlah langkah sebagaimana perincian berikut ini.
                    </p>
                    <ul>
                        <li>
                            Pertama, untuk login ke aplikasi Lapor Online, masyarakat harus mendaftar terlebih dahulu menggunakan NIK.
                        </li>
                        <li>
                            Kedua, mengisi form pengaduan dengan bahasa Indonesia yang baik dan benar, tidak disarankan menggunakan bahasa daerah yang multi tafsir maupun kalimat yang terbelit belit.
                        </li>
                        <li>
                            Ketiga, masyarakat diharuskan memilih kategori secara spesifik. Pada tahap ini, masyarakat bisa memilih kategori pengaduan agar pengaduan dapat terarah dengan baik.
                        </li>
                        <li>
                            Keempat, masyarakat wajib mengirim bukti foto/lampiran pengaduan supaya pengaduan dapat di tindak lanjuti sesuai data yang valid
                        </li>
                        <li>
                            Kelima, jika semua kolom di aplikasi Lapor! sudah terisi, masyarakat dapat mengirimkan aduan atau laporannya.
                        </li>
                    </ul>
                    <p>
                        Setelah menuliskan pengaduan dokumen masyarakat akan diverifikasi dan di tindak lanjuti serta mendapatkan tanggapan dari pihak berwenang.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src=" <?= base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('public/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('public/plugins/chart.js/Chart.min.js') ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('public/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('public/plugins/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('public/plugins/daterangepicker/daterangepicker.js') ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
    <!-- Summernote -->
    <script src="<?= base_url('public/plugins/summernote/summernote-bs4.min.js') ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('public/dist/js/adminlte.js') ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url('public/plugins/toastr/toastr.min.js') ?>"></script>
    <script src="<?= base_url('public/plugins/toastr/toastr-opt.js') ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('public/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>


    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-center',
                showConfirmButton: true,
                timer: 5000
            });
            <?php if (isset($_SESSION['msg_suc'])) { ?>
                swal.fire({
                    icon: 'success',
                    title: '<?= $_SESSION['msg_suc']; ?>'
                })
            <?php } elseif (isset($_SESSION['msg_err'])) { ?>
                swal.fire({
                    icon: 'error',
                    title: '<?= $_SESSION['msg_err']; ?>'
                })
            <?php } ?>
        })
    </script>
    <?= $this->renderSection('js'); ?>
</body>

</html>
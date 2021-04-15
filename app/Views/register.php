<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar | Lapor Online</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= base_url() ?>https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/dist/css/background.css') ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/toastr/toastr.min.css') ?>">
    <?= $this->renderSection('css'); ?>
</head>

<body class="hold-transition register-page">
    <div class="register-box">


        <div class="card">
            <div class="card-body box-card-body">
                <div class="register-logo mb-4">
                    <a href="<?= base_url() ?>"><b>Lapor </b>Online</a>
                </div>
                <form action="<?= base_url('/register-member') ?>" method="post" id="form-validate">
                    <div class="form-group mb-3">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control rounded-0" name="nik" id="nik" pattern="[0-9]{16}" title="Masukan NIK dengan benar!">
                    </div>

                    <div class="form-group mb-3">
                        <label for="username">Nama</label>
                        <input type="text" class="form-control rounded-0" name="username" id="username">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control rounded-0" name="password" id="password">
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="terms" name='terms' value="agree">
                                <label for="terms" class="custom-control-label">
                                    I agree to the <a href="#" data-toggle="modal" data-target="#aboutTerms">terms</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="social-auth-links text-center">
                        <button type="submit" class="btn btn-block btn-primary rounded-0">
                            Daftar
                        </button>
                    </div>
                </form>


                <span>Sudah memiliki akun? <a href="<?= base_url('/') ?>" class="text-center">Masuk</a></span>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- ./wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="aboutTerms" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms of service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ol>
                        <li style="text-align:justify"><span style="font-size:12pt"><span style="font-family:Arial,sans-serif">Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional (SP4N) - Layanan Aspirasi dan Pengaduan Online Rakyat (LAPOR!) adalah layanan penyampaian semua aspirasi dan pengaduan masyarakat Indonesia melalui beberapa kanal pengaduan yaitu website<a href="http://www.lapor.go.id/">&nbsp;www.lapor.go.id,&nbsp;</a>SMS 1708, twitter @lapor1708, aplikasi Android, dan aplikasi iOS.</span></span>
                        </li>
                        <li style="text-align:justify"><span style="font-size:12pt"><span style="font-family:Arial,sans-serif">Lembaga pengelola SP4N-LAPOR! adalah Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi (Kementerian PANRB) sebagai Pembina Pelayanan Publik, Kantor Staf Presiden (KSP) sebagai Pengawas Program Prioritas Nasional dan Ombudsman Republik Indonesia sebagai Pengawas Pelayanan Publik. LAPOR! telah ditetapkan sebagai Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional (SP4N) berdasarkan Peraturan Presiden Nomor 76 Tahun 2013 dan Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 3 Tahun 2015.</span>&nbsp;</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('public/dist/js/adminlte.min.js') ?>"></script>
    <!-- jquery-validation -->
    <script src="<?= base_url('public/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('public/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
    <script src="<?= base_url('public/plugins/jquery-validation/validasi-register.js') ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('public/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url('public/plugins/toastr/toastr.min.js') ?>"></script>
    <script src="<?= base_url('public/plugins/toastr/toastr-opt.js') ?>"></script>
    <script>
        <?php if (isset($_SESSION['msg_suc'])) { ?>
            toastr.success('<?= $_SESSION['msg_suc']; ?>')
        <?php } elseif (isset($_SESSION['msg_err'])) { ?>
            toastr.error('<?= $_SESSION['msg_err']; ?>')
        <?php } ?>
    </script>
</body>

</html>
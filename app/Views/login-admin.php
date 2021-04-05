<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Lapor Online</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= base_url() ?>https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/dist/css/background.css') ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/toastr/toastr.min.css') ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">

</head>

<body class="hold-transition login-page">
    <div class="login-box">


        <?php if (isset($_SESSION['msg_suc'])) { ?>
            <div class="alert alert-success alert-dismissible fade show mb-2 rounded-0" role="alert">
                <?= session()->msg_suc; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } elseif (isset($_SESSION['msg_err'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show mb-2 rounded-0" role="alert">
                <?= session()->msg_err; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body rounded-sm">
                <div class="mb-4 text-center">
                    <div class="login-logo mb-0">
                        <a href="<?= base_url() ?>"><b>Lapor </b>Online</a>
                    </div>
                    <small>Admin Login</small>
                </div>

                <form action="<?= base_url('/admin/auth') ?>" method="post" id="form-validate">
                    <div class="form-group mb-3">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" setFocus name="email" id="email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <p class="mb-1">
                        <a href="<?= base_url('/forgot-password') ?>">Lupa password</a>
                    </p>
                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            Sign in
                        </button>
                    </div>
                </form>
                <p class="mb-0">
                    <a href="<?= base_url() ?>" class="text-center">Login sebagai user</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- ./wrapper -->

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
    <script src="<?= base_url('public/plugins/jquery-validation/validasi-login-admin.js') ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url('public/plugins/toastr/toastr.min.js') ?>"></script>
    <script src="<?= base_url('public/plugins/toastr/toastr-opt.js') ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('public/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <!-- 
    <script>
        <?php if (isset($_SESSION['msg_suc'])) { ?>
            toastr.success('<?= $_SESSION['msg_suc']; ?>')
        <?php } elseif (isset($_SESSION['msg_err'])) { ?>
            toastr.error('<?= $_SESSION['msg_err']; ?>')
        <?php } ?>
    </script> -->

</body>

</html>
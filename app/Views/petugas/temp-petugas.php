<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title; ?></title>

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
	<!-- Toastr -->
	<link rel="stylesheet" href="<?= base_url('public/plugins/toastr/toastr.min.css') ?>">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= base_url('public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
	<link rel="shortcut icon" href="<?= base_url('/public/favicon.ico') ?>" type="image/x-icon">
	<link rel="icon" href="<?= base_url('/public/favicon.ico') ?>" type="image/x-icon">
	<?= $this->renderSection('css'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-dark bg-secondary text-sm border-bottom-0">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="<?= base_url() ?>#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<span>Hi, <?= session()->nama; ?></span>
						<i class="fa fa-user mx-2"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<strong class="dropdown-item" disabled>Hi, <?= session()->nama; ?>
						</strong>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('/petugas/my-profile') ?>" class="dropdown-item">
							<i class="fa fa-user-edit mr-2"></i>
							Ubah Profile
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('/petugas/logout') ?>#" class="dropdown-item dropdown-footer bg-secondary">Log-out</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary sidebar-dark-info text-sm align-center">
			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('public/img/logo.svg') ?>" alt="User Image">
					</div>
					<div class="info">
						<a href="<?= base_url('/petugas/dashboard') ?>" class="d-block h4">Lapor Online</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="<?= base_url('petugas/dashboard') ?>" class="nav-link <?= ($act == "Dashboard") ? "active" : "" ?>">
								<i class="nav-icon fa fa-home" aria-hidden="true"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-header">LAPORAN</li>
						<li class="nav-item">
							<a href="<?= base_url('petugas/pengaduan') ?>" class="nav-link <?= ($act == "Pengaduan") ? "active" : "" ?>">
								<i class="nav-icon fas fa-file-archive    "></i>
								<p>
									Pengaduan
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('petugas/kategori') ?>" class="nav-link <?= ($act == "Kategori") ? "active" : "" ?>">
								<i class="nav-icon fa fa-server" aria-hidden="true"></i>
								<p>
									Kategori
								</p>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper p-2">
			<div class="content-header">
				<div class="container-fluid">
					<?= $this->renderSection('breadcrumb'); ?>
				</div>
			</div>

			<section class="content">
				<div class="container-fluid">
					<?php $this->renderSection('content'); ?>
				</div>
			</section>
		</div>

		<footer class="main-footer text-sm">
			<strong>Copyright &copy; 2021 <a href="<?= base_url('petugas/dashboard') ?>">Lapor Online</a>.</strong>
			All rights reserved.
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 1.0
			</div>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
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

	<!-- jQuery -->
	<script src="<?= base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?= base_url('public/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?= base_url('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
	<!-- overlayScrollbars -->
	<script src="<?= base_url('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('public/dist/js/adminlte.js') ?>"></script>
	<!-- SweetAlert2 -->
	<script src="<?= base_url('public/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
	<script>
		$(function() {
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
			<?php } elseif (isset($_SESSION['msg_war'])) { ?>
				swal.fire({
					icon: 'warning',
					title: '<?= $_SESSION['msg_war']; ?>',
					text: '<?= $_SESSION['msg_war_info']; ?>'
				})
			<?php } ?>
		});
	</script>
	<?php $this->renderSection('script'); ?>
</body>

</html>
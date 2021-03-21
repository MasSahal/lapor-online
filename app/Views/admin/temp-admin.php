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
	<?= $this->renderSection('css'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-dark bg-gradient-lightblue text-sm">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="<?= base_url('public/') ?>#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?= base_url('public/') ?>index3.html" class="nav-link">Lapor Online</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?= base_url('public/') ?>#" class="nav-link">About</a>
				</li>
			</ul>

			<!-- SEARCH FORM -->
			<form class="form-inline ml-3">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="<?= base_url('public/') ?>#">
						<i class="far fa-comments"></i>
						<span class="badge badge-danger navbar-badge">3</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<a href="<?= base_url('public/') ?>#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?= base_url('public/dist/img/user1-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Brad Diesel
										<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">Call me whenever you can...</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('public/') ?>#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?= base_url('public/dist/img/user8-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										John Pierce
										<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">I got your message bro</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('public/') ?>#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?= base_url('public/dist/img/user3-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Nora Silvester
										<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">The subject goes here</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('public/') ?>#" class="dropdown-item dropdown-footer">See All Messages</a>
					</div>
				</li>
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="<?= base_url('public/') ?>#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('public/') ?>#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('public/') ?>#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="fa fa-user mr-2"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<strong class="dropdown-item" disabled>Hai, Mas Sahal
						</strong>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fa fa-user-edit mr-2"></i>
							Ubah Profile
						</a>
						<a href="#" class="dropdown-item">
							<i class="fa fa-cogs mr-2" aria-hidden="true"></i>
							Pengaturan
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('public/') ?>#" class="dropdown-item dropdown-footer bg-secondary">Log-out</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary sidebar-dark-olive text-sm align-center">
			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('public/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="<?= base_url('public/') ?>#" class="d-block">Lapor Online</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= ($act == "Dashboard") ? "active" : "" ?>">
								<i class="nav-icon fa fa-home" aria-hidden="true"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<!-- <li class="nav-item">
							<a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= ($act == "Dashboard") ? "active" : "" ?>">
								<i class="nav-icon fa fa-home" aria-hidden="true"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li> -->
						<li class="nav-header">ACCOUNT</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/account/users') ?>" class="nav-link <?= ($act == "Masyarakat") ? "active" : "" ?>"">
								<i class=" nav-icon fa fa-users"></i>
								<p>
									Masyarakat
									<span class="right badge badge-green">New</span>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/account/petugas') ?>" class="nav-link <?= ($act == "Petugas") ? "active" : "" ?>"">
								<i class=" nav-icon fa fa-user-friends"></i>
								<p>
									Petugas
									<span class="right badge badge-green">New</span>
								</p>
							</a>
						</li>
						<li class="nav-header">LAPORAN</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/laporan/user') ?>" class="nav-link <?= ($act == "Laporan") ? "active" : "" ?>">
								<i class="nav-icon fa fa-file-alt"></i>
								<p>
									Laporan
									<!-- <span class="right badge badge-success">10</span> -->
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/account/petugas') ?>" class="nav-link <?= ($act == "Profile") ? "active" : "" ?>">
								<i class=" nav-icon fa fa-document"></i>
								<p>
									Laporan Export
									<span class="right badge badge-green">New</span>
								</p>
							</a>
						</li>
						<!-- <li class="nav-item menu-open">
							<a href="<?= base_url('public/') ?>#" class="nav-link active">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Account
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('public/') ?>./index.html" class="nav-link active">
										<i class="far fa-circle nav-icon"></i>
										<p>Dashboard v1</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('public/') ?>./index2.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Dashboard v2</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('public/') ?>./index3.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Dashboard v3</p>
									</a>
								</li>
							</ul>
						</li> -->
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<div class="content-header">
				<div class="container-fluid">
					<?= $this->renderSection('breadcrumb'); ?>
				</div><!-- /.container-fluid -->
			</div>

			<section class="content">
				<div class="container-fluid">
					<?php $this->renderSection('content'); ?>
				</div>
			</section>
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer text-sm">
			<strong>Copyright &copy; 2021 <a href="<?= base_url('public/') ?>https://adminlte.io">Lapor Online</a>.</strong>
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

	<?php $this->renderSection('script'); ?>
</body>

</html>
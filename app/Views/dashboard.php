<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Dashboard</title>

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
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url('public/plugins/summernote/summernote-bs4.min.css') ?>">
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
								<img src="<?= base_url('public/') ?>dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
								<img src="<?= base_url('public/') ?>dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
								<img src="<?= base_url('public/') ?>dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
						<strong> Halo, Mas Sahal</strong>

					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fa fa-user mr-2"></i> Hai, Mas Sahal
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('public/') ?>#" class="dropdown-item dropdown-footer">Log-out</a>
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

				<!-- SidebarSearch Form -->
				<!-- <div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div> -->

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-header">EXAMPLES</li>
						<li class="nav-item menu-open">
							<a href="<?= base_url('public/') ?>#" class="nav-link active">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
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
						</li>
						<li class="nav-item">
							<a href="<?= base_url('public/') ?>pages/widgets.html" class="nav-link">
								<i class="nav-icon fas fa-th"></i>
								<p>
									Widgets
									<span class="right badge badge-danger">New</span>
								</p>
							</a>
						</li>
						<li class="nav-header">EXAMPLES</li>
						<li class="nav-item">
							<a href="<?= base_url('public/') ?>pages/calendar.html" class="nav-link">
								<i class="nav-icon far fa-calendar-alt"></i>
								<p>
									Calendar
									<span class="badge badge-info right">2</span>
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Dashboard</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right text-sm">
								<li class="breadcrumb-item"><a href="<?= base_url('public/') ?>#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard v1</li>
								<li class="breadcrumb-item active">Dashboard v1</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Info boxes -->
					<div class="row">
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box">
								<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">CPU Traffic</span>
									<span class="info-box-number">
										10
										<small>%</small>
									</span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Likes</span>
									<span class="info-box-number">41,410</span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->

						<!-- fix for small devices only -->
						<div class="clearfix hidden-md-up"></div>

						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Sales</span>
									<span class="info-box-number">760</span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">New Members</span>
									<span class="info-box-number">2,000</span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
					<div class="row">
						<div class="col-6">
							<div class="card">
								<div class="card-header border-0">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Online Store Visitors</h3>
										<a href="javascript:void(0);">View Report</a>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<span class="text-bold text-lg">820</span>
											<span>Visitors Over Time</span>
										</p>
										<p class="ml-auto d-flex flex-column text-right">
											<span class="text-success">
												<i class="fas fa-arrow-up"></i> 12.5%
											</span>
											<span class="text-muted">Since last week</span>
										</p>
									</div>
									<!-- /.d-flex -->

									<div class="position-relative mb-4">
										<canvas id="visitors-chart" height="200"></canvas>
									</div>

									<div class="d-flex flex-row justify-content-end">
										<span class="mr-2">
											<i class="fas fa-square text-primary"></i> This Week
										</span>

										<span>
											<i class="fas fa-square text-gray"></i> Last Week
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="card">
								<div class="card-header border-0">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Online Store Visitors</h3>
										<a href="javascript:void(0);">View Report</a>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<span class="text-bold text-lg">820</span>
											<span>Visitors Over Time</span>
										</p>
										<p class="ml-auto d-flex flex-column text-right">
											<span class="text-success">
												<i class="fas fa-arrow-up"></i> 12.5%
											</span>
											<span class="text-muted">Since last week</span>
										</p>
									</div>
									<!-- /.d-flex -->

									<div class="position-relative mb-4">
										<canvas id="visitors-chart" height="200"></canvas>
									</div>

									<div class="d-flex flex-row justify-content-end">
										<span class="mr-2">
											<i class="fas fa-square text-primary"></i> This Week
										</span>

										<span>
											<i class="fas fa-square text-gray"></i> Last Week
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
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
	<!-- AdminLTE for demo purposes
	<script src="<?= base_url('public/dist/js/demo.js') ?>"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<!-- <script src="<?= base_url('public/dist/js/pages/dashboard.js') ?>"></script> -->
</body>

</html>
<?php $this->extend('petugas/temp-petugas'); ?>

<!-- Content Header (Page header) -->

<?= $this->section('breadcrumb'); ?>
<div class="row mb-2">
	<div class="col-sm-6">
		<h1 class="m-0">Dashboard <?= level(session()->role_login); ?></h1>
	</div><!-- /.col -->
	<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item active"><a href="<?= base_url('petugas/dashboard') ?>">Dashboard</a></li>
		</ol>
	</div><!-- /.col -->
</div><!-- /.row -->
<?= $this->endsection('breadcrumb'); ?>

<?php $this->section('content'); ?>

<div class="row">
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box">
			<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file-alt"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Laporan</span>
				<span class="info-box-number">
					<?= $jml_laporan; ?>
				</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-users"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Masyarakat</span>
				<span class="info-box-number"><?= $jml_user; ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->

	<!-- fix for small devices only -->
	<div class="clearfix hidden-md-up"></div>

	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-shield"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Admin</span>
				<span class="info-box-number"><?= $jml_admin; ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-friends"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Petugas</span>
				<span class="info-box-number"><?= $jml_petugas; ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-12">
		<div class="card card-outline card-info">
			<div class="card-body">
				<h3 class="text-info font-weight-bold">Selamat Datang di Aplikasi Layanan Pengaduan Online - LAPOR</h3>
				<span class="text-dark-50">Hi, <?= session()->nama; ?></span>
				<hr class="my-2">
				<p class="lead">
					Lapor Online adalah aplikasi pengaduan masyarakat online yang sangat mudah digunakan dan terhubung ke instansi berwenang.
					<!-- Kemudahan dalam menyampaikan pengaduan di Lapor Online sangatlah mudah. Kunjungi sekarang dan laporkan pengaduanmu!. -->
				</p>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->
<?php $this->endsection(); ?>
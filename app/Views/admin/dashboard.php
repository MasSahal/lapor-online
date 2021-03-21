<?php $this->extend('admin/temp-admin'); ?>
<?php $this->section('content'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Dashboard <?= level(session()->role_login); ?></h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right text-sm">
					<li class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
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
					<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file-alt"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Laporan</span>
						<span class="info-box-number">
							10,234,238
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
<?php $this->endsection(); ?>
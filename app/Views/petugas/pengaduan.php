<?php $this->extend('petugas/temp-petugas'); ?>


<?= $this->section('css'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">

<?= $this->endsection('css'); ?>

<?php $this->section('breadcrumb'); ?>
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Laporan Pengaduan</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('/petugas/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Laporan Pengaduan</li>
        </ol>
    </div>
</div>
<!-- /.content-header -->
<?php $this->endsection('breadcrumb'); ?>

<?php $this->section('content'); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body box-card-body">
                <div class="table-responsive">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pengirim</th>
                                    <th>Subjek - Isi</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                <?php foreach ($pengaduan as $p) :; ?>
                                    <tr class="<?php #($p->status == 'selesai') ? 'bg-soft-success' : '' 
                                                ?>">
                                        <td><?= $no += 1; ?></td>
                                        <td class="mailbox-name"><?= $p->nama; ?></td>
                                        <td class="mailbox-subject">
                                            <a href="<?= base_url('/petugas/pengaduan/' . $p->id_pengaduan . '/detail') ?>" class="text-dark text-link">
                                                <b>
                                                    <?= get_small_char($p->subjek_pengaduan, 45); ?>
                                                </b> - <?= get_small_char($p->isi_laporan, 25); ?>
                                            </a>
                                        </td>
                                        <td class="mailbox-star text-left">
                                            <?php if ($p->status == 'terkirim') { ?>
                                                <span class="text-info">Terkirim</span>

                                                <!-- // -->
                                            <?php  } elseif ($p->status == 'terverifikasi') { ?>
                                                <span class="text-warning">Terverifikasi</span>

                                                <!-- // -->
                                            <?php  } elseif ($p->status == 'diproses') { ?>
                                                <span class="text-primary">Sedang Diproses</span>

                                                <!-- // -->
                                            <?php  } elseif ($p->status == 'selesai') { ?>
                                                <span class="text-success">Selesai</span>

                                                <!-- // -->
                                            <?php  } elseif ($p->status == 'ditolak') { ?>
                                                <span class="text-danger">Ditolak</span>

                                                <!-- // -->
                                            <?php  } ?>
                                        </td>
                                        <td class="mailbox-date"><?= date('d M Y', strtotime($p->tgl_pengaduan)); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->endsection('content'); ?>

<?= $this->section('script'); ?>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- Toastr -->
<script src="<?= base_url('public/plugins/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/toastr/toastr-opt.js') ?>"></script>
<script>
    $('.table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
</script>
<?= $this->endsection('script'); ?>
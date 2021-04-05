<?php $this->extend('admin/temp-admin'); ?>


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
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
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
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle rounded-0"><i class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm rounded-0">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm rounded-0">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm rounded-0">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm rounded-0">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <div class="float-right">
                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm rounded-0">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm rounded-0">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <?php foreach ($pengaduan as $p) :; ?>
                                    <tr>
                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="<?= $p->id_pengaduan; ?>">
                                                <label for="<?= $p->id_pengaduan; ?>">
                                                    &nbsp;&nbsp;&nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="<?= base_url('/admin/account/user/' . $p->nik . '/detail') ?>" class="text-link"><?= $p->nama; ?></a></td>
                                        <td class="mailbox-subject">
                                            <a href="<?= base_url('/admin/pengaduan/' . $p->id_pengaduan . '/detail') ?>" class="text-dark text-link">
                                                <b>
                                                    <?= get_small_char($p->subjek_pengaduan, 25); ?>
                                                </b> - <?= get_small_char($p->isi_laporan, 40); ?>
                                            </a>
                                        </td>
                                        <?php if ($p->foto != null) :; ?>
                                            <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                        <?php endif ?>
                                        <td class="mailbox-date"><?= time_ago($p->tgl_pengaduan); ?></td>
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
<!-- jquery-validation -->
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
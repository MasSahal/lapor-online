<?php $this->extend('admin/temp-admin'); ?>


<?= $this->section('css'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('/public') ?>/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?= base_url('/public') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="<?= base_url('/public') ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?= base_url('/public') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('/public') ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('/public') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?= base_url('/public') ?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="<?= base_url('/public') ?>/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="<?= base_url('/public') ?>/plugins/dropzone/min/dropzone.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url('/public') ?>/dist/css/adminlte.min.css">



<?= $this->endsection('css'); ?>

<?php $this->section('breadcrumb'); ?>
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Generate Laporan Pengaduan</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/pengaduan') ?>">Laporan</a></li>
            <li class="breadcrumb-item active">Generate Laporan</li>
        </ol>
    </div>
</div>
<!-- /.content-header -->
<?php $this->endsection('breadcrumb'); ?>

<?php $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card rounded-0">
            <div class="card-header">
                <h2 class="text-center display-4">Cari Data</h2>
                <br>
                <form method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_awal">Tanggal Awal</label>
                                <input type="date" class="form-control float-right" name="date_awal" id="date_awal" placeholder="Tanggal Awal">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_akhir">Tanggal Akhir</label>
                                <input type="date" class="form-control float-right" name="date_akhir" id="date_akhir" placeholder="Tanggal Akhir">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">Status Pengaduan</label>
                                <select class="form-control" name="status" id="status">
                                    <option value=""> Status </option>
                                    <option value=" terkirim">Terkirim</option>
                                    <option value="terverifikasi">Terverifikasi</option>
                                    <option value="diproses">Diproses</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">&nbsp;</label>
                                <input type="hidden" name="search" value="">
                                <button type="submit" class="btn btn-default btn-block">
                                    <i class="fa fa-search"></i> <span>Cari Data</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php if (isset($_GET['search'])) {; ?>
                <div class="card-body">
                    <table class="table table-hover table-striped table-responsive" width="100%">
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
                                <tr>
                                    <td><?= $no += 1; ?></td>
                                    <td>
                                        <?= $p->nama; ?></td>
                                    <td class="mailbox-subject">
                                        <a href="<?= base_url('/admin/pengaduan/' . $p->id_pengaduan . '/detail') ?>" class="text-dark text-link">
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
                <div class="card-footer">
                    <a href=" <?= base_url('/admin/pengaduan/print?date_awal=' . $date_awal . '&date_akhir=' . $date_akhir . '&status=' . $status) ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                </div>
            <?php }; ?>

        </div>
    </div>
</div>
<?php $this->endsection('content'); ?>
<?php $this->section('js'); ?>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- InputMask -->
<script src="<?= base_url('public/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/inputmask/jquery.inputmask.min.js') ?>"></script>
<!-- date-range-picker -->
<!-- <script src="<?= base_url('public/plugins/daterangepicker/daterangepicker.js') ?>"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="<?= base_url('/public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script> -->

<script src="<?= base_url('/public') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('/public') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('/public') ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url('/public') ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url('/public') ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('/public') ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('/public') ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('/public') ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('/public') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url('/public') ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?= base_url('/public') ?>/plugins/bs-stepper/js/bs-stepper.min.js"></script>
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
<script>
    $(function() {
        $('#reservation').daterangepicker();
        $('#status').select2();

        $('#date_awal').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });

        $('#date_akhir').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })


        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        );
    });
</script>
<?php $this->endsection('js'); ?>
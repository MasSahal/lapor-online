<?= $this->extend('petugas/temp-petugas'); ?>

<?= $this->section('css'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<!-- Toastr -->
<link rel="stylesheet" href="<?= base_url('public/plugins/toastr/toastr.min.css') ?>">
<?= $this->endsection('css'); ?>


<?= $this->section('breadcrumb'); ?>
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Data Kategori Pengaduan</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('/petugas/home') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Kategori Pengaduan</li>
        </ol>
    </div>
</div>
<?= $this->endsection('breadcrumb'); ?>


<?= $this->section('content'); ?>


<div class="row">
    <div class="col-12">
        <div class="card rounded-0">
            <div class="card-body">
                <table class="table table-stripped" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($kategori as $k) { ?>
                            <tr>
                                <td><?= $i += 1; ?></td>
                                <td><?= $k->kategori ?></td>
                                <td>
                                    <button type="button" class="badge badge-warning border-0" data-toggle="modal" data-target="#edit_<?= $k->id_kategori; ?>">Edit</button>
                                    <button type="button" class="badge badge-danger border-0" data-toggle="modal" data-target="#hapus_<?= $k->id_kategori; ?>">Hapus</button>
                                </td>
                            </tr>

                            <!-- modal hapus -->
                            <div class="modal fade" id="hapus_<?= $k->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog border-radius-0" role="document">
                                    <div class="modal-content rounded-0">
                                        <div class="modal-body">
                                            <form action="<?= base_url('/petugas/kategori/delete') ?>" method="post">
                                                <div class="text-center p-3 m-3">
                                                    <strong>Yakin ingin menghapus kategori "<span class="text-muted"><?= $k->kategori ?></span>" ?</strong>
                                                    <br>
                                                    <small>Tidakan tidak dapat diurungkan!</small>
                                                    <br><br>
                                                    <input type="hidden" name="id_kategori" value="<?= $k->id_kategori; ?>">
                                                    <button class="btn btn-outline-secondary" data-dismiss="modal" aria-label="Close">Batalkan</button>
                                                    &nbsp;
                                                    <button type="submit" class="btn btn-danger">Hapus Sekarang</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- modal edit -->
                            <div class="modal fade" id="edit_<?= $k->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-0">
                                        <form action="<?= base_url('/petugas/kategori/edit') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <label for="kategori">Nama Kategori</label>
                                                    <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $k->kategori; ?>" required>
                                                    <input type="hidden" class="form-control" name="id_kategori" value="<?= $k->id_kategori; ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Batalkan</button>
                                                <button type="submit" class="btn btn-primary btn-md">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Tambah</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add kategori-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/petugas/kategori/insert') ?>" method="post" id="form-validate">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori">Nama Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="kategori" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endsection('content'); ?>


<?= $this->section('script'); ?>
<!-- jquery-validation -->
<script src="<?= base_url('public/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/jquery-validation/validasi-kategori.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- Toastr -->
<script src="<?= base_url('public/plugins/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/toastr/toastr-opt.js') ?>"></script>

<script>
    $(function() {
        $('#table').dataTable({
            responsive: true,
        });
    })
</script>
<?= $this->endsection('script'); ?>
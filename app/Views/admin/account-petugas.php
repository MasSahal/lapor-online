<?= $this->extend('admin/temp-admin'); ?>

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
        <h1 class="m-0">Data Akun Petugas</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('/admin/account/petugas') ?>">Account</a></li>
            <li class="breadcrumb-item active">Petugas</li>
        </ol>
    </div>
</div>
<?= $this->endsection('breadcrumb'); ?>


<?= $this->section('content'); ?>


<div class="row">
    <div class="col-12">
        <div class="card rounded-0">
            <div class="card-header bg-light">
                <span>Data Petugas</span>
                <button type="button" class="btn btn-sm text-muted float-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Tambah</button>
            </div>
            <div class="card-body">
                <table class="table table-stripped table-head-fixed" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach ($admins as $a) { ?>
                            <tr>
                                <td><?= $i += 1; ?></td>
                                <td><?= $a->nama_petugas ?></td>
                                <td><?= $a->username ?></td>
                                <td><?= $a->email ?></td>
                                <td><?= $a->telp ?></td>
                                <td>
                                    <button type="button" class="badge badge-warning border-0" data-toggle="modal" data-target="#edit_<?= $a->id_petugas; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                                    <button type="button" class="badge badge-danger border-0" data-toggle="modal" data-target="#hapus_<?= $a->id_petugas; ?>">Hapus</button>
                                </td>
                            </tr>

                            <!-- modal hapus -->
                            <div class="modal fade" id="hapus_<?= $a->id_petugas ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog border-radius-0" role="document">
                                    <div class="modal-content rounded-0">
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/account/petugas/delete') ?>" method="post">
                                                <div class="text-center p-3 m-3">
                                                    <strong>Yakin ingin menghapus petugas : <span class="text-muted"><?= $a->nama_petugas ?></span> ?</strong>
                                                    <br>
                                                    <small>Tidakan tidak dapat diurungkan!</small>
                                                    <br><br>
                                                    <input type="hidden" name="id_petugas" value="<?= $a->id_petugas; ?>">
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
                            <div class="modal fade" id="edit_<?= $a->id_petugas ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content rounded-0">
                                        <form action="<?= base_url('/admin/account/edit-petugas') ?>" method="post" id="form-validate">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="name">Nama</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?= $a->nama_petugas; ?>">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" name="email" id="email" value="<?= $a->email; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control" name="username" id="username" value="<?= $a->username; ?>">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="telp">Phone</label>
                                                            <input type="number" class="form-control" name="telp" id="telp" value="<?= $a->telp; ?>">
                                                            <input type="hidden" name="id_petugas" value="<?= $a->id_petugas ?>">
                                                            <input type="hidden" name="role" value="petugas">
                                                        </div>
                                                    </div>
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

        </div>
    </div>
</div>

<!-- Modal Add Petugas-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Akun Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/admin/account/register-petugas') ?>" method="post" id="form-validate">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="telp">Phone</label>
                                <input type="number" class="form-control" name="telp" id="telp">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <input type="hidden" value="petugas" name="role">
                        </div>
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
<script src="<?= base_url('public/plugins/jquery-validation/validasi-register-admin.js') ?>"></script>
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
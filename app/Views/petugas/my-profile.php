<?php $this->extend('petugas/temp-petugas'); ?>

<!-- Content Header (Page header) -->

<?= $this->section('breadcrumb'); ?>
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Ubah Profile Saya</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('/petugas/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile Saya</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
<?= $this->endsection('breadcrumb'); ?>

<?php $this->section('content'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="card rounded-0">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('/public/img/user.svg') ?>" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $profile->nama_petugas; ?></h3>

                <p class="text-muted text-center"><?= $profile->username; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right"><?= $profile->email; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Telepon</b> <a class="float-right"><?= $profile->telp; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Level</b> <a class="float-right"><?= $profile->level; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card rounded-0">
            <form action="<?= base_url('/petugas/my-profile/edit') ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= $profile->nama_petugas; ?>" required>
                        <input type="hidden" name="id_petugas" id="id_petugas" class="form-control" value="<?= $profile->id_petugas; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $profile->username; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= $profile->email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telepon</label>
                        <input type="text" name="telp" id="telp" class="form-control" value="<?= $profile->telp; ?>" required>
                    </div>
                    <div class="text-link">
                        <a href="#" class="badge badge-info" data-toggle="modal" data-target="#ubah_pw">Ubah Password</a>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success float-right">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ubah_pw" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('/petugas/my-profile/change-pass') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pass">Masukan Password Baru</label>
                        <input type="text" name="pass" id="pass" class="form-control" required>
                        <input type="hidden" name="id_petugas" id="id_petugas" class="form-control" value="<?= $profile->id_petugas; ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.content -->
<?php $this->endsection(); ?>
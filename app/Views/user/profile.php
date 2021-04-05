<?php $this->extend('user/temp-user'); ?>
<?php $this->section('css'); ?>
<style>
    .content-header {
        background: #3c8dbc;
        background: url(<?= base_url('/public/bg.png') ?>) no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: fixed;
        border-bottom: 0;
    }

    .header-user {
        background: url('<?= base_url('/public/img/bg-user.jpg') ?>') no-repeat center center scroll;
    }
</style>
<?php $this->endsection('css'); ?>
<?php $this->section('content'); ?>

<section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-widget widget-user rounded-0">
                    <div class="widget-user-header text-white rounded-0 header-user bg-info">
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="<?= base_url('/public/img/user.svg') ?>" alt="User">
                    </div>
                    <div class="card-footer">
                        <h3 class="profile-username text-center font-weight-bold"><?= $profile->nama; ?></h3>
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card rounded-0">
                    <div class="card-body box-profile">
                        <div class="bg-dark p-2 px-3">
                            <strong>Identitas</strong>
                        </div>
                        <div class="p-2 px-3">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>NIK</b> <a class="float-right"><?= $profile->nik; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Username</b> <a class="float-right"><?= $profile->username; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right"><?= $profile->email; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Telepon</b> <a class="float-right"><?= $profile->telp; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Jumlah Pengaduan</b> <a class="float-right"><?= $jml_all; ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card rounded-0">
                    <form action="<?= base_url('/user/profile/edit') ?>" method="post">
                        <div class="card-header">
                            <strong>Edit Profile</strong>
                            <i class="fas fa-pen fa-fw float-right"></i>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control rounded-0" value="<?= $profile->nama; ?>" required>
                                <input type="hidden" name="nik" id="nik" class="form-control" value="<?= $profile->nik; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control rounded-0" value="<?= $profile->username; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control rounded-0" value="<?= $profile->email; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telp">No Telepon</label>
                                <input type="text" name="telp" id="telp" class="form-control rounded-0" value="<?= $profile->telp; ?>" required>
                            </div>
                            <div class="text-link">
                                <a href="#" class="badge badge-info rounded-0" data-toggle="modal" data-target="#ubah_pw">Ubah Password</a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success float-right rounded-0">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal ubah pw -->
            <div class="modal fade" id="ubah_pw" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title">Ganti Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?= base_url('/user/profile/change-pass') ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="pass">Masukan Password Baru</label>
                                    <input type="text" name="pass" id="pass" class="form-control rounded-0" required>
                                    <input type="hidden" name="nik" id="nik" class="form-control" value="<?= $profile->nik; ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Batalkan</button>
                                <button type="submit" class="btn btn-info rounded-0">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php $this->endsection('content'); ?>
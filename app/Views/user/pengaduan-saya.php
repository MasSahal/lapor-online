<?php $this->extend('user/temp-user'); ?>
<?php $this->section('css'); ?>
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?= base_url('/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
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


<section class="p-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card card-widget widget-user rounded-0">
                    <div class="widget-user-header text-white rounded-0 header-user">
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="<?= base_url('/public/img.jpg') ?>" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <h3 class="profile-username text-center font-weight-bold">Mas Sahal</h3>
                        <p class="text-muted text-center">@mas_sahal</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card rounded-0">
                    <div class="card-body box-profile">
                        <!-- <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('/public/favicon.ico') ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">Mas Sahal</h3>

                        <p class="text-muted text-center">Software Engineer</p> -->
                        <div class="bg-dark p-2">
                            <strong>Status Pengaduan</strong>
                        </div>
                        <div class="p-2">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Terkirim</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Terverifikasi</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tindak Lanjut</b> <a class="float-right">1,387</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Selesai</b> <a class="float-right">127</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="card rounded-0">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link rounded-0 active" href="#all" data-toggle="tab">Semua</a></li>
                            <li class="nav-item"><a class="nav-link rounded-0" href="#terverifikasi" data-toggle="tab">Terverifikasi</a></li>
                            <li class="nav-item"><a class="nav-link rounded-0" href="#tindaklanjut" data-toggle="tab">Ditindak Lanjut</a></li>
                            <li class="nav-item"><a class="nav-link rounded-0" href="#selesai" data-toggle="tab">Selesai</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="all">
                                <h3>Semua Laporan Pengaduan</h3>
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control rounded-0" placeholder="Search Mail">
                                            <div class="input-group-append">
                                                <div class="btn btn-primary rounded-0">
                                                    <i class="fas fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
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
                                                        <td class="mailbox-name"><a href="read-mail.html"><?= $p->nama; ?></a></td>
                                                        <td class="mailbox-subject"><b><?= get_small_char($p->subjek_pengaduan, 25); ?></b> - <?= get_small_char($p->isi_laporan, 40); ?>
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
                                    <!-- /.mail-box-messages -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer p-0">
                                    <div class="mailbox-controls">
                                        <!-- Check all button -->
                                        <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                            <i class="far fa-square"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-reply"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                        <!-- /.btn-group -->
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                        <div class="float-right">
                                            1-50/200
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm">
                                                    <i class="fas fa-chevron-left"></i>
                                                </button>
                                                <button type="button" class="btn btn-default btn-sm">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </div>
                                            <!-- /.btn-group -->
                                        </div>
                                        <!-- /.float-right -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="terverifikasi">
                                <h3>Laporan Pengaduan Terverifikasi</h3>
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" placeholder="Search Mail">
                                            <div class="input-group-append">
                                                <div class="btn btn-primary">
                                                    <i class="fas fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
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
                                                    <?php if ($p->status == 'terverifikasi') :; ?>
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
                                                            <td class="mailbox-name"><a href="read-mail.html"><?= $p->nama; ?></a></td>
                                                            <td class="mailbox-subject"><b><?= get_small_char($p->subjek_pengaduan, 25); ?></b> - <?= get_small_char($p->isi_laporan, 40); ?>
                                                            </td>
                                                            <?php if ($p->foto != null) :; ?>
                                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                            <?php endif ?>
                                                            <td class="mailbox-date"><?= time_ago($p->tgl_pengaduan); ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer p-0">
                                    <div class="mailbox-controls">
                                        <!-- Check all button -->
                                        <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                            <i class="far fa-square"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-reply"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                        <!-- /.btn-group -->
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                        <div class="float-right">
                                            1-50/200
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm">
                                                    <i class="fas fa-chevron-left"></i>
                                                </button>
                                                <button type="button" class="btn btn-default btn-sm">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </div>
                                            <!-- /.btn-group -->
                                        </div>
                                        <!-- /.float-right -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tindaklanjut">
                                <h3>Laporan Pengaduan Ditindak Lanjut</h3>
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" placeholder="Search Mail">
                                            <div class="input-group-append">
                                                <div class="btn btn-primary">
                                                    <i class="fas fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
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
                                                    <?php if ($p->status == 'proses') :; ?>
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
                                                            <td class="mailbox-name"><a href="read-mail.html"><?= $p->nama; ?></a></td>
                                                            <td class="mailbox-subject"><b><?= get_small_char($p->subjek_pengaduan, 25); ?></b> - <?= get_small_char($p->isi_laporan, 40); ?>
                                                            </td>
                                                            <?php if ($p->foto != null) :; ?>
                                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                            <?php endif ?>
                                                            <td class="mailbox-date"><?= time_ago($p->tgl_pengaduan); ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer p-0">
                                    <div class="mailbox-controls">
                                        <!-- Check all button -->
                                        <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                            <i class="far fa-square"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-reply"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                        <!-- /.btn-group -->
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                        <div class="float-right">
                                            1-50/200
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm">
                                                    <i class="fas fa-chevron-left"></i>
                                                </button>
                                                <button type="button" class="btn btn-default btn-sm">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </div>
                                            <!-- /.btn-group -->
                                        </div>
                                        <!-- /.float-right -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="selesai">
                                <h3>Laporan Pengaduan Selesai</h3>
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" placeholder="Search Mail">
                                            <div class="input-group-append">
                                                <div class="btn btn-primary">
                                                    <i class="fas fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
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
                                                    <?php if ($p->status == 'selesai') :; ?>
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
                                                            <td class="mailbox-name"><a href="read-mail.html"><?= $p->nama; ?></a></td>
                                                            <td class="mailbox-subject"><b><?= get_small_char($p->subjek_pengaduan, 25); ?></b> - <?= get_small_char($p->isi_laporan, 40); ?>
                                                            </td>
                                                            <?php if ($p->foto != null) :; ?>
                                                                <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                            <?php endif ?>
                                                            <td class="mailbox-date"><?= time_ago($p->tgl_pengaduan); ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer p-0">
                                    <div class="mailbox-controls">
                                        <!-- Check all button -->
                                        <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                            <i class="far fa-square"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-reply"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                        <!-- /.btn-group -->
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                        <div class="float-right">
                                            1-50/200
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm">
                                                    <i class="fas fa-chevron-left"></i>
                                                </button>
                                                <button type="button" class="btn btn-default btn-sm">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </div>
                                            <!-- /.btn-group -->
                                        </div>
                                        <!-- /.float-right -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->endsection('content'); ?>
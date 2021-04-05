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
                        <img class="img-circle" src="<?= base_url('/public/img/user.svg') ?>" alt="User">
                    </div>
                    <div class="card-footer">
                        <h3 class="profile-username text-center font-weight-bold"><?= session()->nama; ?></h3>
                        <p class="text-muted text-center">@<?= session()->username; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">

                <div class="card rounded-0 mb-3">
                    <div class="card-body box-profile">
                        <div class="bg-dark p-2 px-3">
                            <strong>Status Pengaduan</strong>
                        </div>
                        <div class="p-2 px-3">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Terkirim</b> <a class="float-right"><?= $jml_kirim; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Terverifikasi</b> <a class="float-right"><?= $jml_verif; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tindak Lanjut</b> <a class="float-right"><?= $jml_proses; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Selesai</b> <a class="float-right"><?= $jml_selesai; ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (isset($_GET['detail'])) {; ?>
                <?php foreach ($pengaduan as $p) :; ?>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">

                                <a href="<?= base_url('/user/pengaduan-saya') ?>" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i> Kembali</a>

                                <div class="float-right">
                                    <span class="text-muted"><?= $p->tgl_pengaduan; ?></span>
                                </div>
                                <div class="card-tools">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mailbox-read-info pt-0">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12">
                                            <table class="table table-borderless table-sm">
                                                <tr>
                                                    <th>Dari</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $p->nama; ?>
                                                    </td>
                                                </tr>
                                                <tr class="py-2">
                                                    <th>Subjek</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $p->subjek_pengaduan; ?>
                                                    </td>
                                                </tr>
                                                <tr class="py-4">
                                                    <th>Status</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php if ($p->status == 'terkirim') { ?>
                                                            <span class="text-danger">Terkirim</span>

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
                                                        <?php  } ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="mailbox-read-message">
                                    <h4 class="h4"><?= $p->subjek_pengaduan; ?></h4>
                                    <p><?= str_break($p->isi_laporan); ?></p>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <ul class="mailbox-attachments d-flex align-items-stretch clearfix" style="padding:10px">

                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#detail">
                                            <span class="mailbox-attachment-icon has-img"><img src="<?= base_url('/public/img/pengaduan/' . $p->foto) ?>" alt="Attachment"></span>
                                        </a>
                                        <div class="mailbox-attachment-info">
                                            <a href="#" class="mailbox-attachment-name" data-toggle="modal" data-target="#detail"><i class="fas fa-image "></i> Image.jpg</a>
                                            <span class="mailbox-attachment-size clearfix mt-1">
                                                <span><?= format_size(filesize(ROOTPATH . 'public/img/pengaduan/' . $p->foto)) ?>b</span>
                                                <a href="<?= base_url('/public/img/pengaduan/' . $p->foto) ?>" download="<?= $p->foto; ?>" class="btn btn-default btn-sm float-right" id="download" title="Download Image">
                                                    <i class="fas fa-cloud-download-alt"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </li>

                                    <!-- Modal -->
                                    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content rounded-0">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Foto Pengaduan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-header">
                                                    <img data-dismiss="modal" aria-label="Close" src="<?= base_url('/public/img/pengaduan/' . $p->foto) ?>" class="img-fluid" alt="<?= $p->foto ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </ul>
                            </div>

                            <!-- button print dan delete -->
                            <div class="card-footer">
                                <?php if ($p->status == 'terkirim') { ?>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#hapus"><i class="far fa-trash-alt"></i> Delete</button>

                                    <!-- Modal tandai selesai -->
                                    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class=" modal-dialog border-radius-0" role="document">
                                            <div class="modal-content rounded-0">
                                                <div class="modal-body">
                                                    <form action="<?= base_url('user/pengaduan/delete') ?>" method="post">
                                                        <div class="text-center p-3">
                                                            <h4>Hapus pengaduan ini?</h4>
                                                            <small>Tidakan tidak dapat diurungkan!</small>
                                                            <br><br>
                                                            <input type="hidden" name="id_pengaduan" value="<?= $p->id_pengaduan; ?>">
                                                            <button class="btn btn-outline-secondary rounded-0" data-dismiss="modal" aria-label="Close">Batalkan</button>
                                                            &nbsp;
                                                            <button type="submit" class="btn btn-danger rounded-0">Hapus Sekarang!</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }; ?>
                                <a href="<?= base_url('/user/pengaduan/' . $p->id_pengaduan . '/print') ?>" class="btn btn-default" raeget="_blank"><i class="fas fa-print"></i> Print</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                    </div>
                <?php endforeach ?>
            <?php } else { ?>
                <div class="col-md-9 col-sm-12">
                    <div class="card rounded-0">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link rounded-0 active" href="#terkirim" data-toggle="tab">Terkirim</a></li>
                                <li class="nav-item"><a class="nav-link rounded-0" href="#terverifikasi" data-toggle="tab">Terverifikasi</a></li>
                                <li class="nav-item"><a class="nav-link rounded-0" href="#tindaklanjut" data-toggle="tab">Ditindak Lanjut</a></li>
                                <li class="nav-item"><a class="nav-link rounded-0" href="#selesai" data-toggle="tab">Selesai</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="terkirim">
                                    <h3>Laporan Pengaduan Terkirim</h3>
                                    <div class="card-body p-0">
                                        <div class="table-responsive mailbox-messages">
                                            <table class="table table-hover table-striped" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Aksi</th>
                                                        <th>Nama</th>
                                                        <th colspan="2">Subjek</th>
                                                        <th>Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pengaduan['terkirim'] as $p) :; ?>
                                                        <tr>
                                                            <td>
                                                                <a class="btn" data-toggle="modal" data-target="#del_<?= $p->id_pengaduan ?>"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                            <td class="mailbox-name">
                                                                <a href="#" class="text-link"><?= $p->nama; ?></a>
                                                            </td>
                                                            <td class="mailbox-subject">
                                                                <a href="<?= base_url('/user/pengaduan-saya?detail=' . $p->id_pengaduan) ?>" class="text-link">
                                                                    <b><?= get_small_char($p->subjek_pengaduan, 25); ?></b> - <?= get_small_char($p->isi_laporan, 40); ?>
                                                                </a>
                                                            </td>
                                                            <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                            <td class="mailbox-date"><?= time_ago($p->tgl_pengaduan); ?></td>
                                                        </tr>

                                                        <div class="modal fade" id="del_<?= $p->id_pengaduan ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                            <div class=" modal-dialog border-radius-0" role="document">
                                                                <div class="modal-content rounded-0">
                                                                    <div class="modal-body">
                                                                        <form action="<?= base_url('user/pengaduan/delete') ?>" method="post">
                                                                            <div class="text-center p-3">
                                                                                <h4>Ingin menghapus pengaduan <span class="text-muted">"<?= get_small_char($p->subjek_pengaduan, 25); ?>"</span> ?</h4>
                                                                                <small>Tidakan tidak dapat diurungkan!</small>
                                                                                <br><br>
                                                                                <input type="hidden" name="id_pengaduan" value="<?= $p->id_pengaduan; ?>">
                                                                                <button class="btn btn-outline-secondary rounded-0" data-dismiss="modal" aria-label="Close">Batalkan</button>
                                                                                &nbsp;
                                                                                <button type="submit" class="btn btn-danger rounded-0">Hapus Sekarang!</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class=" tab-pane" id="terverifikasi">
                                    <h3>Laporan Pengaduan Terverifikasi</h3>
                                    <div class="card-body p-0">
                                        <div class="table-responsive mailbox-messages">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th colspan="2">Subjek</th>
                                                        <th>Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pengaduan['terverifikasi'] as $p) :; ?>
                                                        <tr>
                                                            <td>
                                                                <a href="#" class="text-link"><?= $p->nama; ?></a>
                                                            </td>
                                                            <td class="mailbox-subject">
                                                                <a href="<?= base_url('/user/pengaduan-saya?detail=' . $p->id_pengaduan) ?>" class="text-link">
                                                                    <b><?= get_small_char($p->subjek_pengaduan, 25); ?></b> - <?= get_small_char($p->isi_laporan, 40); ?>
                                                                </a>
                                                            </td>
                                                            <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                            <td class="mailbox-date"><?= time_ago($p->tgl_pengaduan); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tindaklanjut">
                                    <h3>Laporan Pengaduan Ditindak Lanjut</h3>
                                    <div class="card-body p-0">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th colspan="2">Subjek</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pengaduan['diproses'] as $p) :; ?>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-link"><?= $p->nama; ?></a>
                                                        </td>
                                                        <td class="mailbox-subject">
                                                            <a href="<?= base_url('/user/pengaduan-saya?detail=' . $p->id_pengaduan) ?>" class="text-link">
                                                                <b><?= get_small_char($p->subjek_pengaduan, 25); ?></b> - <?= get_small_char($p->isi_laporan, 40); ?>
                                                            </a>
                                                        </td>
                                                        <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                        <td class="mailbox-date"><?= time_ago($p->tgl_pengaduan); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="selesai">
                                    <h3>Laporan Pengaduan Selesai</h3>
                                    <div class="card-body p-0">
                                        <div class="table-responsive mailbox-messages">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th colspan="2">Subjek</th>
                                                        <th>Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pengaduan['selesai'] as $p) :; ?>
                                                        <tr>
                                                            <td class="mailbox-name"><a href="#"><?= $p->nama; ?></a></td>
                                                            <td class="mailbox-subject">
                                                                <a href="<?= base_url('/user/pengaduan-saya?detail=' . $p->id_pengaduan) ?>" class="text-link">
                                                                    <b><?= get_small_char($p->subjek_pengaduan, 25); ?></b> - <?= get_small_char($p->isi_laporan, 40); ?>
                                                                </a>
                                                            </td>
                                                            <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
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
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php $this->endsection('content'); ?>

<?php $this->section('js'); ?>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    })
</script>
<?php $this->endsection('js'); ?>
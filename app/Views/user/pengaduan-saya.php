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
                        <p class="text-muted text-center"><?= session()->username; ?></p>
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
                                <li class="list-group-item">
                                    <b>Ditolak</b> <a class="float-right"><span class="text-danger"><?= $jml_ditolak; ?></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (isset($_GET['detail'])) {; ?>

                <div class="col-md-9">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 <?= ($pengaduan->status == "selesai") ? "bg-soft-success" : "" ?> <?= ($pengaduan->status == "ditolak") ? "bg-soft-danger" : "" ?>">

                            <a href="<?= base_url('/user/pengaduan-saya') ?>" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i> Kembali</a>

                            <div class="float-right">
                                <span class="text-muted"><?= $pengaduan->tgl_pengaduan; ?></span>
                            </div>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mailbox-read-info pt-0">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <th>Pelapor</th>
                                                <td>:</td>
                                                <td>
                                                    <?= $pengaduan->nama; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td>:</td>
                                                <td>
                                                    <?= $pengaduan->nik; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Kategori</th>
                                                <td>:</td>
                                                <td>
                                                    <?= $pengaduan->kategori; ?>
                                                </td>
                                            </tr>
                                            <tr class="py-4">
                                                <th>Status</th>
                                                <td>:</td>
                                                <td>
                                                    <?php if ($pengaduan->status == 'terkirim') { ?>
                                                        <span class="text-info">Terkirim</span>

                                                        <!-- // -->
                                                    <?php  } elseif ($pengaduan->status == 'terverifikasi') { ?>
                                                        <span class="text-warning">Terverifikasi</span>

                                                        <!-- // -->
                                                    <?php  } elseif ($pengaduan->status == 'diproses') { ?>
                                                        <span class="text-primary">Sedang Diproses</span>

                                                        <!-- // -->
                                                    <?php  } elseif ($pengaduan->status == 'selesai') { ?>
                                                        <span class="text-success">Selesai</span>

                                                        <!-- // -->
                                                    <?php  } elseif ($pengaduan->status == 'ditolak') { ?>
                                                        <span class="text-danger">Pengaduan Ditolak</span>

                                                        <!-- // -->
                                                    <?php  } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="mailbox-read-message">
                                <h4 class="h4"><?= $pengaduan->subjek_pengaduan; ?></h4>
                                <p><?= str_break($pengaduan->isi_laporan); ?></p>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <ul class="mailbox-attachments d-flex align-items-stretch clearfix" style="padding:10px">

                                <li>
                                    <a href="#" data-toggle="modal" data-target="#detail">
                                        <span class="mailbox-attachment-icon has-img"><img src="<?= base_url('/public/img/pengaduan/' . $pengaduan->foto) ?>" alt="Attachment"></span>
                                    </a>
                                    <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name" data-toggle="modal" data-target="#detail"><i class="fas fa-image "></i> Image.jpg</a>
                                        <span class="mailbox-attachment-size clearfix mt-1">
                                            <span><?= format_size(filesize(ROOTPATH . 'public/img/pengaduan/' . $pengaduan->foto)) ?>b</span>
                                            <a href="<?= base_url('/public/img/pengaduan/' . $pengaduan->foto) ?>" download="<?= $pengaduan->foto; ?>" class="btn btn-default btn-sm float-right" id="download" title="Download Image">
                                                <i class="fas fa-cloud-download-alt"></i>
                                            </a>
                                        </span>
                                    </div>
                                </li>

                                <!-- Modal -->
                                <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content rounded-0">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Foto Pengaduan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class="modal-header">
                                                <img data-dismiss="modal" aria-label="Close" src="<?= base_url('/public/img/pengaduan/' . $pengaduan->foto) ?>" class="img-fluid" alt="<?= $pengaduan->foto ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>

                        <?php if ($pengaduan->status == 'selesai') { ?>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <th>Ditanggapi Oleh</th>
                                                <td>:</td>
                                                <td><?= $tanggapan->nama_petugas; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal</th>
                                                <td>:</td>
                                                <td><?= $tanggapan->tgl_tanggapan; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card p-3 shadow-none">
                                    <p><?= str_break($tanggapan->tanggapan); ?></p>
                                </div>
                            </div>
                            <hr class="m-0">
                        <?php } elseif ($pengaduan->status == 'ditolak') { ?>
                            <div class="card-footer bg-soft-danger">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <th>Alasan</th>
                                                <td>:</td>
                                                <td>Pengaduan tidak sesuai dengan ketentuan layanan pengaduan yang berlaku.
                                                    <a href="<?= base_url('/user/syarat-ketentuan') ?>">Syarat dan ketentuan</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-0">
                        <?php }; ?>

                        <!-- button print dan delete -->
                        <?php if ($pengaduan->status == 'terkirim') { ?>
                            <div class="card-footer">
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
                                                        <input type="hidden" name="id_pengaduan" value="<?= $pengaduan->id_pengaduan; ?>">
                                                        <button class="btn btn-outline-secondary rounded-0" data-dismiss="modal" aria-label="Close">Batalkan</button>
                                                        &nbsp;
                                                        <button type="submit" class="btn btn-danger rounded-0">Hapus Sekarang!</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }; ?>
                        <!-- /.card-footer -->
                    </div>
                </div>

            <?php } else { ?>
                <div class="col-md-9 col-sm-12">
                    <div class="card rounded-0">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link rounded-0 active" href="#terkirim" data-toggle="tab">Terkirim</a></li>
                                <li class="nav-item"><a class="nav-link rounded-0" href="#terverifikasi" data-toggle="tab">Terverifikasi</a></li>
                                <li class="nav-item"><a class="nav-link rounded-0" href="#tindaklanjut" data-toggle="tab">Ditindak Lanjut</a></li>
                                <li class="nav-item"><a class="nav-link rounded-0" href="#selesai" data-toggle="tab">Selesai</a></li>
                                <li class="nav-item"><a class="nav-link rounded-0" href="#ditolak" data-toggle="tab">Ditolak</a></li>
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
                                                                <?= $p->nama; ?>
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
                                                            <td class="mailbox-name">
                                                                <?= $p->nama; ?>
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
                                                        <td class="mailbox-name">
                                                            <?= $p->nama; ?>
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
                                                            <td class="mailbox-name">
                                                                <?= $p->nama; ?>
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
                                <div class="tab-pane" id="ditolak">
                                    <h3>Laporan Pengaduan Ditolak</h3>
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
                                                    <?php foreach ($pengaduan['ditolak'] as $p) :; ?>
                                                        <tr class="bg-soft-danger">
                                                            <td>
                                                                <a class="btn" data-toggle="modal" data-target="#del_<?= $p->id_pengaduan ?>"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                            <td class="mailbox-name">
                                                                <?= $p->nama; ?>
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
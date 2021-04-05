<?= $this->extend('user/temp-user'); ?>

<?= $this->section('content'); ?>
<?php foreach ($pengaduan as $p) :; ?>
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
                        <div class="bg-dark p-2">
                            <strong>Status Pengaduan</strong>
                        </div>
                        <div class="p-2">
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
                    <!-- /.card-body -->
                </div>
                <a href="<?= base_url('/user/pengaduan-saya') ?>" class="btn btn-info btn-block mb-3 rounded-0">Kembali</a>
            </div>
            <div class="col-md-9">
                <div class="card">
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
                                    </table>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <span class="mailbox-read-time float-right"><?= $p->tgl_pengaduan; ?></span>
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
                    <!-- /.card-footer -->
                    <div class="card-footer">
                        <?php if ($p->status == 'terkirim') { ?>
                            <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>

                        <?php }; ?>
                        <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endsection('content'); ?>

<?= $this->section('js'); ?>
<?= $this->endsection('js'); ?>
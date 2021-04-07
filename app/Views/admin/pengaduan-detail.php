<?= $this->extend('admin/temp-admin'); ?>

<?= $this->section('breadcrumb'); ?>
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Detail Pengaduan</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('/admin/home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('/admin/pengaduan') ?>ase">Pengaduan</a></li>
            <li class="breadcrumb-item active">Pengaduan ID <?= $pengaduan->id_pengaduan; ?></li>
        </ol>
    </div>
</div>
<?= $this->endsection('breadcrumb'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card rounded-0">
            <div class="card-header rounded-0 <?= ($pengaduan->status == "selesai") ? "bg-soft-success" : "" ?> <?= ($pengaduan->status == "ditolak") ? "bg-soft-danger" : "" ?>">

                <a href="<?= base_url('/admin/pengaduan') ?>" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i> Kembali</a>
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
                    <h4><?= $pengaduan->subjek_pengaduan; ?></h4>
                    <p><?= str_break($pengaduan->isi_laporan) ?></p>
                </div>
            </div>
            <div class="card-footer bg-white">
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix" style="padding:10px;">
                    <li>
                        <a href="#" data-toggle="modal" data-target="#detail">
                            <span class="mailbox-attachment-icon has-img"><img src="<?= base_url('/public/img/pengaduan/' . $pengaduan->foto) ?>" alt="Attachment"></span>
                        </a>

                        <div class="mailbox-attachment-info">
                            <a href="#" class="mailbox-attachment-name" data-toggle="modal" data-target="#detail"><i class="fas fa-image "></i> Image.jpg</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span><?= format_size(filesize(ROOTPATH . 'public/img/pengaduan/' . $pengaduan->foto)) ?></span>
                                <a href="<?= base_url('/public/img/pengaduan/' . $pengaduan->foto) ?>" download="<?= $pengaduan->foto; ?>" class="btn btn-default btn-sm float-right" id="download" data-toggle="tooltip" data-placement="right" title="Download Image">
                                    <i class="fas fa-cloud-download-alt"></i>
                                </a>
                            </span>
                        </div>
                    </li>

                    <!-- Modal detail foto -->
                    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Foto Pengaduan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="modal-body w-auto">
                                    <img data-dismiss="modal" aria-label="Close" src="<?= base_url('/public/img/pengaduan/' . $pengaduan->foto) ?>" class="img-fluid" alt="<?= $pengaduan->foto ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                </ul>
            </div>
            <?php if ($pengaduan->status == 'terkirim') {; ?>
                <div class="card-footer">
                    <a href="<?= base_url('/admin/pengaduan/' . $pengaduan->id_pengaduan . '/print') ?>" target="_blank" class="btn btn-default"><i class="fa fa-print fa-fw"></i> Print</a>
                    <div class="float-right">
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#tolak"><i class="fa fa-times" aria-hidden="true"></i> Tolak</button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#verifikasi"><i class="fas fa-shield-alt fa-fw"></i> Verifikasi</button>
                    </div>
                    <!-- <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button> -->

                    <div class="modal fade" id="verifikasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class=" modal-dialog border-radius-0" role="document">
                            <div class="modal-content rounded-0">
                                <div class="modal-body">
                                    <form action="<?= base_url('admin/pengaduan/verifikasi') ?>" method="post">
                                        <div class="text-center p-3">
                                            <strong>Yakin ingin memverifikasi pengaduan <span class="text-muted">"<?= get_small_char($pengaduan->subjek_pengaduan, 30); ?>"</span> ?</strong>
                                            <br>
                                            <small>Tidakan tidak dapat diurungkan!</small>
                                            <br><br>
                                            <input type="hidden" name="id_pengaduan" value="<?= $pengaduan->id_pengaduan; ?>">
                                            <button class="btn btn-outline-secondary" data-dismiss="modal" aria-label="Close">Batalkan</button>
                                            &nbsp;
                                            <button type="submit" class="btn btn-success">Verifikasi Sekarang!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="tolak" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog border-radius-0" role="document">
                            <div class="modal-content rounded-0">
                                <div class="modal-body">
                                    <form action="<?= base_url('admin/pengaduan/tolak') ?>" method="post">
                                        <div class="text-center p-3 m-3">
                                            <strong>Yakin ingin menolak pengaduan <span class="text-muted">"<?= get_small_char($pengaduan->subjek_pengaduan, 25); ?>"</span> ?</strong>
                                            <br>
                                            <small>Tidakan tidak dapat diurungkan!</small>
                                            <br><br>
                                            <input type="hidden" name="id_pengaduan" value="<?= $pengaduan->id_pengaduan; ?>">
                                            <button class="btn btn-outline-secondary" data-dismiss="modal" aria-label="Close">Batalkan</button>
                                            &nbsp;
                                            <button type="submit" class="btn btn-danger">Tolak Pengaduan ini!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // -->

                </div>
            <?php } elseif ($pengaduan->status == 'terverifikasi') { ?>
                <div class="card collapsed-card rounded-0 m-0 shadow-none card-light">
                    <div class="card-header">
                        <a href="<?= base_url('/admin/pengaduan/' . $pengaduan->id_pengaduan . '/print') ?>" target="_blank" class="btn btn-default"><i class="fa fa-print fa-fw"></i> Print</a>
                        <div class="card-tools">
                            <button type="button" class="btn btn-success" data-card-widget="collapse"><i class="fa fa-share fa-fw"></i> Berikan Tanggapan</button>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/admin/pengaduan/kirim-tanggapan') ?>" method="post">
                            <div class="form-group">
                                <label for="tanggapan" class="h5">Tanggapan</label>
                                <textarea class="form-control" name="tanggapan" id="tanggapan" rows="7"></textarea>

                                <!--  -->
                                <input type="hidden" name="id_pengaduan" value="<?= $pengaduan->id_pengaduan; ?>">
                            </div>
                            <button type="submit" class="btn btn-success px-5">Kirim Tanggapan</button>
                        </form>
                    </div>
                </div>
            <?php } elseif ($pengaduan->status == 'diproses') {; ?>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
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
                    <div class="card p-3 shadow-none border">
                        <p><?= str_break($tanggapan->tanggapan); ?></p>
                    </div>
                </div>
                <hr class="m-0">
                <div class=" card-footer">
                    <a href=" <?= base_url('/admin/pengaduan/' . $pengaduan->id_pengaduan . '/print') ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                    <div class="float-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#selesai"><i class="fa fa-check fa-fw"></i> Tandai Telah Selesai</button>
                    </div>

                    <!-- Modal tandai selesai -->
                    <div class="modal fade" id="selesai" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class=" modal-dialog border-radius-0" role="document">
                            <div class="modal-content rounded-0">
                                <div class="modal-body">
                                    <form action="<?= base_url('admin/pengaduan/selesaikan') ?>" method="post">
                                        <div class="text-center p-3">
                                            <strong>Tandai telah diselesaikan pengaduan <span class="text-muted">"<?= get_small_char($pengaduan->subjek_pengaduan, 30); ?>"</span> ?</strong>
                                            <br>
                                            <small>Tidakan tidak dapat diurungkan!</small>
                                            <br><br>
                                            <input type="hidden" name="id_pengaduan" value="<?= $pengaduan->id_pengaduan; ?>">
                                            <button class="btn btn-outline-secondary" data-dismiss="modal" aria-label="Close">Batalkan</button>
                                            &nbsp;
                                            <button type="submit" class="btn btn-success">Selesaikan Sekarang!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } elseif ($pengaduan->status == 'selesai') { ?>
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
                <div class=" card-footer">
                    <a href="<?= base_url('/admin/pengaduan/' . $pengaduan->id_pengaduan . '/print') ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                </div>
            <?php } elseif ($pengaduan->status == 'ditolak') { ?>
                <div class="card-footer bg-soft-danger">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th>Alasan</th>
                                    <td>:</td>
                                    <td>Pengaduan tidak sesuai dengan ketentuan layanan pengaduan yang berlaku.
                                        <a href="#">Syarat dan ketentuan</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <hr class="m-0">
            <?php }; ?>

        </div>
    </div>
</div>

<?= $this->endsection('content'); ?>

<?= $this->section('js'); ?>
<script>
    $('#downlaod').tooltip(options)
</script>
<?= $this->endsection('js'); ?>
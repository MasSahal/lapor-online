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

    .content-indo {
        background: url(<?= base_url('/public/indo.svg') ?>) no-repeat scroll;
        /* -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover; */
        min-height: 250px;
        background-size: cover;
        border: 0;
    }

    .line {
        width: 2px;
        height: 30px;
        background: darkgray;
        margin: 0 auto;
    }

    @media (min-width: 1080px) {

        .content-indo {
            min-height: 700px;
        }
    }
</style>
<link rel="stylesheet" href="<?= base_url('/public/dist/css/timeline.css') ?>">
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('/public/plugins/select2/css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('/public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
<?php $this->endsection('css'); ?>

<?php $this->section('content'); ?>
<section class=" content content-header p-0">
    <div class="container-fluid">
        <div class="p-5 text-center">
            <h4 class="display-4 d-inline-flex">Layanan Pengaduan Masyarakat - Lapor Online</h4>
            <p class="text-md">Sampaikan pengaduan Anda langsung kepada instansi pemerintah berwenang</p>
            <div style="width:70px; height:10px; margin:0 auto; background:darkgray"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-sm-10 pb-4">
                <div class="card shadow-lg p-4 rounded-0 mb-5">
                    <div class="card bg-info rounded-0">
                        <h4 class="m-3">Sampaikan Pengaduan Anda</h4>
                    </div>
                    <small class="text-center">Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar <span><button type="button" data-toggle="modal" data-target="#info" class="btn btn-sm btn-outline-info btn-flat font-weight-bold">?</button></span></small>
                    <br>
                    <form action="<?= base_url('/user/do-pengaduan') ?>" method="post" enctype="multipart/form-data" id="form-validate">
                        <div class="form-group">
                            <label for="subjek">Judul Pengaduan</label>
                            <input type="hidden" name="nik" value="<?= session()->nik; ?>">
                            <input type="text" name="subjek" id="subjek" class="form-control form-control-lg rounded-0">
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Pengaduan</label>
                            <textarea class="form-control rounded-0" name="isi" id="isi" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori Pengaduan</label>
                            <select class="form-control form-control-lg rounded-0" name="kategori" id="kategori">
                                <option value="null">- Pilih Kategori Pengaduan -</option>
                                <?php foreach ($kategori as $k) :; ?>
                                    <option value="<?= $k->id_kategori; ?>"><?= $k->kategori; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="custom-file ">
                                    <label class="custom-file-label rounded-0" for="file" name="file"></label>
                                    <input type="file" class="custom-file-input rounded-0" id="file">
                                    <small class="help-block">Max. 2MB | JPG-PNG</small>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="btn btn-default btn-file rounded-0">
                                        <i class="fas fa-paperclip"></i> Lampiran Pendukung
                                        <input type="file" name="file">
                                    </div>
                                    <p class="help-block">Max. 2MB</p>
                                </div> -->
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 col-sm-12">
                                <button type="submit" name="" id="" class="btn btn-info btn-md btn-block rounded-0">Lapor!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- info alur pengaduan -->
    <div class="card rounded-0 border-0 m-0 px-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="hori-timeline mt-5" dir="ltr">
                    <ul class="list-inline events">
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                                <div class="event-date bg-primary text-dark rounded-0"><i class="fa fa-edit" aria-hidden="true"></i></div>
                                <h5 class="font-size-16">Tulis Laporan</h5>
                                <p class="text-muted">Laporkan pengaduan Anda dengan jelas ,lengkap dan sesuai prosedur.</p>
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                                <div class="event-date bg-info text-dark rounded-0"><i class="fas fa-file-import    "></i></div>
                                <h5 class="font-size-16">Proses Verifikasi</h5>
                                <p class="text-muted">Dalam 3 hari, laporan Anda akan ditinjau dan diverifikasi.</p>
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                                <div class="event-date bg-danger text-dark rounded-0"><i class="fa fa-comments" aria-hidden="true"></i></div>
                                <h5 class="font-size-16">Proses Tindak Lanjut</h5>
                                <p class="text-muted">Dalam 5 hari, instansi akan menindaklanjuti laporan Anda.</p>
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-4">
                                <div class="event-date bg-success text-dark rounded-0"><i class="fa fa-check" aria-hidden="true"></i></div>
                                <h5 class="font-size-16">Selesai</h5>
                                <p class="text-muted">Laporan Anda akan terus ditindaklanjuti hingga terselesaikan.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <br>
                <center class="pb-4">
                    <a href="<?= base_url('/user/about') ?>" class="btn btn-flat btn-outline-info">Pelajari Lebih Lanjut</a>
                </center>
                <br>
            </div>
        </div>

    </div>
</section>

<!-- info jumlah INDONESIA -->
<div class="card content-indo rounded-0 border-0 m-0 bg-light">
    <h2 class="text-center mt-4 text-info font-weight-bold">Tersebar luas ke segala plosok daerah</h2>
</div>


<!-- info jumlah pengaduan -->
<div class="card rounded-0 p-4 text-center border-0 bg-info mb-0">
    <div class="m-md-4">
        <h4 style="font-family:sans-serif">JUMLAH PENGADUAN SAAT INI</h4>
        <h2 class="font-weight-bold counter display-3"><?= number_format(24999); ?></h2>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5>Tata cara pelaporan pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Untuk mengirim aduan melalui aplikasi LAPOR!, baik di android maupun iOS, masyarakat mesti melakukan sejumlah langkah sebagaimana perincian berikut ini.
                </p>
                <p>
                    Pertama, untuk login ke aplikasi LAPOR! milik Kementerian ATR/BPN, masyarakat harus mendaftar terlebih dahulu menggunakan email, facebook atau twitter.
                </p>
                Kedua, selanjutnya pilih jenis laporan sesuai kebutuhan, baik berupa pengaduan, aspirasi ataupun permintaan informasi, yang akan diteruskan ke instansi terkait.
                <p>
                    Ketiga, mengisi blangko dengan bahasa Indonesia yang baik dan benar.
                </p>
                <p>
                    Keempat, selanjutnya warga pelapor akan mendapatkan tracking id untuk memantau laporan yang diajukan.
                </p>
                <p>
                    Kelima, warga pelapor pun diperkenankan memilih kategori secara spesifik. Pada tahap ini, warga bisa memilih kategori "anonim" jika tidak ingin diketahui namanya, atau memilih kategori "rahasia" apabila aduan berisi identitas atau alamat pribadi.
                </p>
                <p>
                    Keenam, jika ada lampiran yang hendak dikirim oleh warga, aplikasi Lapor! menyediakan kolom untuk mengunggah lampiran.
                </p>
                <p>
                    Ketujuh, jika semua kolom di aplikasi Lapor! sudah terisi, warga dapat mengirimkan aduan atau laporannya.
                </p>
                <p>
                    Setelah menuliskan pengaduan, keluhan atau aspirasi, dokumen masyarakat akan diverifikasi dan diteruskan kepada instansi yang berwenang menanganinya dalam waktu tiga hari.
                </p>
                <p>
                    Kemudian, dalam 5 hari, instansi terkait akan menindaklanjuti dan membalas laporan yang telah diajukan oleh warga. Setelah ada balasan, warga dapat menanggapi lagi balasan dari instansi itu, dalam waktu 10 hari. Laporan akan terus ditindaklanjuti sampai terselesaikan.
                </p>
            </div>
        </div>
    </div>
</div>
<?php $this->endsection('content'); ?>

<?php $this->section('js'); ?>
<!-- counterup JS 
============================================ -->
<script src="<?= base_url("public/dist/js/counterup/jquery.counterup.min.js") ?>"></script>
<script src="<?= base_url("public/dist/js/counterup/jquery.waypoints.min.js") ?>"></script>
<script src="<?= base_url("public/dist/js/counterup/counterup-active.js") ?>"></script>
<!-- jquery-validation -->
<script src="<?= base_url('public/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/jquery-validation/validasi-pengaduan.js') ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('public/plugins/select2/js/select2.full.min.js') ?>"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('public/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<script>
    //Initialize Select2 Elements
    $('.kategori').select2({
        theme: 'bootstrap4'
    });
    $(function() {
        bsCustomFileInput.init();
    });
</script>

<?php $this->endsection('js'); ?>
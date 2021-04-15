<?php $this->extend('petugas/temp-petugas'); ?>

<?= $this->section('breadcrumb'); ?>
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Syarat dan Ketentuan Layanan</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('/petugas/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Syarat dan Ketentuan</li>
        </ol>
    </div>
</div>
<?= $this->endsection('breadcrumb'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="card rounded-0">
        <div class="card-header rounded-0">Syarat Dan Ketentuan</div>
        <div class="card-body rounded-0">
            <div class="mb-2" id="sk">
                <strong>
                    Syarat Penggunaan
                </strong>
                <ul>
                    <li>
                        Aplikasi Lapor Online hanya digunakan untuk menyampaikan pengaduan masyarakat. Pengguna berhak memiliki akun dalam menggunakan layanan pengaduan ini.
                    </li>
                    <li>
                        Pengguna tidak diperbolehkan untuk menggunakan identitas pribadi milik orang lain untuk menggunakan layanan Lapor Online dan wajib menjaga kerahasiaan informasi yang didapatkan di aplikasi Lapor Online.
                    </li>
                    <li>
                        Pengguna tidak diperkenankan menyalahgunakan data dan informasi yang terdapat dalam layanan aplikasi Lapor Online untuk tujuan yang merugikan pihak lain serta melanggar peraturan perundang-undangan yang berlaku.
                    </li>
                    <li>
                        Pengguna tidak diperbolehkan memberikan pengaduan dan informasi yang mengandung unsur diskriminasi atau berpotensi menimbulkan konflik suku, agama, ras, dan antar- golongan (SARA), menistakan, melecehkan, dan/atau menodai nilai-nilai agama.
                    </li>
                    <li>
                        Penggunaan layanan Lapor Online adalah untuk kepentingan pribadi, non-komersial, dan tidak boleh digunakan untuk tujuan yang merugikan pihak lain.
                    </li>
                    <li>
                        Penyedia layanan tidak memungut biaya apapun terhadap penggunaan layanan.
                    </li>
                </ul>
            </div>
            <div class="mb-2" id="data-pengguna">
                <strong>
                    Kerahasiaan dan Informasi Pribadi
                </strong>
                <ul>
                    <li>
                        Dengan menggunakan layanan pengaduan ini, pengguna setuju dan memahami bahwa informasi yang terkait dengan data pribadi dan data pengaduan atau aspirasi dari pengguna akan diberikan kepada pihak terkait yang berhubungan dengan aduan yang disampaikan oleh pengguna. Namun demikian, pengelola layanan memberikan jaminan kerahasiaan data dan informasi pada Lapor Online
                    </li>
                    <li>
                        Layanan Lapor Online mengumpulkan data pribadi pengguna sebagai jaminan keabsahan dari aduan yang disampaikan. Adapun data pribadi yang dikumpulkan adalah sebagai berikut:
                        <ul>
                            <li>Nama pengguna sebagai pengenal identitas</li>
                            <li>No Identitas berupa NIK sebagai pengenal identitas</li>
                            <li>No telepon dan email pengguna untuk informasi notifikasi laporan</li>
                        </ul>
                    </li>
                    <li>
                        Pengguna dapat mengganti kata sandi dan informasi akun miliknya.
                    </li>
                    <li>
                        Jika diminta oleh pengguna, pengelola layanan dapat membantu pengguna untuk mengoperasikan akun tersebut dalam batas yang wajar. Dalam hal demikian, pengelola layanan dapat mengakses akun pengguna dan menjalankan akun tersebut sejauh yang diperlukan untuk menyediakan bantuan.
                    </li>
                </ul>
            </div>
            <div class="mb-2" id="hak-pengguna">
                <strong>
                    Hak-hak Pengguna
                </strong>
                <ul>
                    <li>
                        Pengguna berhak memiliki akun dalam menggunakan layanan pengaduan ini.
                    </li>
                    <li>
                        Pengguna berhak memanfaatkan fitur yang terdapat dalam layanan Lapor Online!
                    </li>
                    <li>
                        Pengguna dapat mengganti kata sandi dan informasi akun miliknya.
                    </li>
                    <li>
                        Jika diminta oleh pengguna, pengelola layanan dapat membantu pengguna untuk mengoperasikan akun tersebut dalam batas yang wajar. Dalam hal demikian, pengelola layanan dapat mengakses akun pengguna dan menjalankan akun tersebut sejauh yang diperlukan untuk menyediakan bantuan.
                    </li>
                </ul>
            </div>
            <div class="mb-2" id="kewajiban-pengguna">
                <strong>
                    Kewajiban Pengguna
                </strong>
                <ul>
                    <li>
                        Pengguna wajib menggunakan data pribadi milik sendiri.
                    </li>
                    <li>
                        Pengguna wajib menjaga kerahasiaan data pribadinya saat menggunakan layanan pengaduan.
                    </li>
                    <li>
                        Pengguna wajib menyampaikan laporan secara jelas.
                    </li>
                    <li>
                        Jika akun pengguna diretas atau dicuri sehingga pengguna kehilangan kontrol atas akunnya, maka pengguna wajib memberitahu pengelola layanan sesegera mungkin agar pengelola layanan dapat menonaktifkan akun pengguna dan melakukan tindak pencegahan lainnya.
                    </li>
                </ul>
            </div>
            <div class="mb-2" id="pelanggaran">
                <strong>
                    Pelanggaran terhadap syarat dan ketentuan
                </strong>
                <p>
                    Penyalahgunaan penggunaan layanan, memalsukan identitas atau memberikan pengaduan palsu akan diberikan sanksi tegas. Jika pengaduan telah dikirim dan berisi data yang tidak valid dan/atau berisi hoak maka pengaduan akan ditolak serta tidak dapat di tindak lanjuti.
                </p>
            </div>
        </div>
    </div>
</div>
<?php $this->endsection('content'); ?>
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
        <h1 class="m-0">Data Akun Masyarakat</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('/admin/account/users') ?>">Account</a></li>
            <li class="breadcrumb-item active">Masyarakat</li>
        </ol>
    </div>
</div>
<?= $this->endsection('breadcrumb'); ?>


<?= $this->section('content'); ?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body box-card-body">
                <div class="table-responsive" id="users_data">
                    <table class="table table-stripped table-head-fixed" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ($users as $u) { ?>
                                <tr>
                                    <td><?= $i += 1; ?></td>
                                    <td>
                                        <?= $u->nik ?>
                                    </td>
                                    <td><?= $u->nama ?></td>
                                    <td><?= $u->email ?></td>
                                    <td><?= $u->telp ?></td>
                                    <!-- <td>
                                        <a href="#" class="badge badge-warning" id="edit" data-nik="<?= $u->nik; ?>">Edit</a>
                                        <a href="#" class="badge badge-danger" id="hapus" data-nik="<?= $u->nik; ?>" onclick="return confirm('yakin hapus ?')">Hapus</a>
                                    </td> -->
                                </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add User-->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/register-member') ?>" method="post" id="form-validate">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="nik">NIK</label>
                                <input type="number" class="form-control" name="nik" id="nik">
                                <div id="result"></div>
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
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="username">Nama</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-md">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Terms-->
<div class="modal fade" id="aboutTerms" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terms of service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li style="text-align:justify"><span style="font-size:12pt"><span style="font-family:Arial,sans-serif">Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional (SP4N) - Layanan Aspirasi dan Pengaduan Online Rakyat (LAPOR!) adalah layanan penyampaian semua aspirasi dan pengaduan masyarakat Indonesia melalui beberapa kanal pengaduan yaitu website<a href="http://www.lapor.go.id/">&nbsp;www.lapor.go.id,&nbsp;</a>SMS 1708, twitter @lapor1708, aplikasi Android, dan aplikasi iOS.</span></span>
                    </li>
                    <li style="text-align:justify"><span style="font-size:12pt"><span style="font-family:Arial,sans-serif">Lembaga pengelola SP4N-LAPOR! adalah Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi (Kementerian PANRB) sebagai Pembina Pelayanan Publik, Kantor Staf Presiden (KSP) sebagai Pengawas Program Prioritas Nasional dan Ombudsman Republik Indonesia sebagai Pengawas Pelayanan Publik. LAPOR! telah ditetapkan sebagai Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional (SP4N) berdasarkan Peraturan Presiden Nomor 76 Tahun 2013 dan Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 3 Tahun 2015.</span>&nbsp;</span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection('content'); ?>


<?= $this->section('script'); ?>
<!-- jquery-validation -->
<script src="<?= base_url('public/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/jquery-validation/validasi-register.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- <script src="<?= base_url('public/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script> -->
<!-- Toastr -->
<script src="<?= base_url('public/plugins/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url('public/plugins/toastr/toastr-opt.js') ?>"></script>

<!-- Page specific script -->
<script>
    function get_users() {
        $.ajax({
            type: "get",
            url: "<?= base_url('/admin/account/table/users') ?>",
            cache: false,
            success: function(data) {
                console.log(data);
                $('#users_data').html(data);
            }
        });
    }

    $(document).ready(function() {
        $(".table").DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Rincian data ' + data[2];
                        }
                    }),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            "lengthChange": true,
            "autoWidth": false,
            // "buttons": [{
            //         extend: 'pdf',
            //         className: 'btn-secondary'
            //     },
            //     {
            //         extend: 'excel',
            //         className: 'btn-secondary'
            //     },
            //     {
            //         extend: 'print',
            //         className: 'btn-secondary'
            //     },
            //     {
            //         text: 'Tambah',
            //         action: function(e, dt, node, config) {
            //             $('#add_user').modal('show');
            //         },
            //         className: "btn-info"
            //     }
            // ],
            "lengthMenu": [
                [5, 10, 25],
                [5, 10, 25]
            ],
        }).buttons().container().appendTo('.btn-users');

        //panggil data tables users
        get_users();
    });

    //hapus data
    $('#hapus').on('click', function() {
        var nik = $(this).attr("data-nik");
        $.ajax({
            type: "post",
            url: "<?= base_url('/admin/account/user') ?>" + "/" + nik + "/delete",
            dataType: "JSON",
            data: {
                nik: nik
            },
            success: function() {
                get_users();
            },
        });

    });
</script>
<?= $this->endsection('script'); ?>
<form action="<?= base_url('/register-member') ?>" method="post" id="form-validate">
    <div class="input-group mb-3">
        <input type="number" class="form-control" placeholder="NIK" name="nik" id="nik">
        <div class=" input-group-append">
            <div class="input-group-text">
                <span class="fas fa-address-card"></span>
            </div>
        </div>
        <div id="result"></div>
    </div>
    <small id="alert" class="text-danger"></small>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Full name" name="username" id="username">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Retype password" name="password2" id="password2">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                    I agree to the <a href="#" data-toggle="modal" data-target="#aboutTerms">terms</a>
                </label>
            </div>
        </div>
    </div>
</form>

public function ajax_users()
// {
// $request = Services::request();
// if ($request->getMethod(true) == 'POST') {
// $lists = $this->userModel->get_datatables();
// $data = [];
// $no = $request->getPost("start");
// foreach ($lists as $list) {
// $no++;
// $row = [];
// $row[] = $no;
// $row[] = $list->kode_icd;
// $row[] = $list->nama_icd;
// $data[] = $row;
// }
// $output = [
// "draw" => $request->getPost('draw'),
// "recordsTotal" => $this->userModel->count_all(),
// "recordsFiltered" => $this->userModel->count_filtered(),
// "data" => $data
// ];
// echo json_encode($output);
// }
// }


public function table_users()
{
$data = ([
'users' => $this->userModel->orderBy('nama', 'asc')->findAll()
]);
return view('admin/data/users', $data);
// echo json_encode(array('status' => 200));
}

<table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Pengaduan</th>
            <th>Status Pengaduan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Pengaduan</th>
            <th>Status Pengaduan</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
    <tbody>
        <?php $no = 0; ?>
        <?php foreach ($laporan as $l) :; ?>
            <tr>
                <td><?= $no += 1;; ?></td>
                <td><?= $l->nama ?></td>
                <td><?= $l->tgl_pengaduan ?></td>
                <td><?= $l->status; ?></td>
                <td>
                    <button type="button" class="badge badge-warning shadow-lg border-0">Edit</button>
                    <a href="<?= base_url('/admin/pengaduan/' . $l->id_pengaduan . '/delete') ?>" class="badge badge-danger shadow-lg border-0" onclick="return confirm('Ingin menghapus penagduan ini?')">
                        Hapus
                    </a>
                    <a href="<?= base_url('/admin/pengaduan/' . $l->id_pengaduan . '/detail') ?>" class="badge badge-info shadow-lg border-0">
                        Detail
                    </a>

                    <?php if ($l->status != 0 && $l->status != 'terverifikasi') :; ?>
                        <button type="button" class="badge badge-success shadow-lg border-0 disabled" disabled style="opacity:0.5">
                            Terverifikasi
                        </button>
                    <?php else :; ?>
                        <a href="#" class="badge badge-success shadow-lg border-0" data-toggle="modal" data-target="#verif_<?= $l->id_pengaduan; ?>">
                            Verifikasi
                        </a>
                    <?php endif; ?>
                    <!-- Modal -->
                    <div class="modal fade" id="verif_<?= $l->id_pengaduan; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body text-center py-4">
                                    <h3 class="mb-3">Yakin ingin memverifikasi pengaduan <?= $l->nama; ?> dengan ID <?= $l->id_pengaduan; ?></h3>
                                    <div class="form-group mt-3">
                                        <form action="<?= base_url('/admin/pengaduan/verifikasi') ?>">
                                            <input type="hidden" name="id_pengaduan">
                                            <button type="button" class="btn btn-outline-dark mr-2" data-dismiss="modal" aria-label="Close">Batal</button>
                                            <button type="submit" class="btn btn-info">Verifikasi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-center',
            showConfirmButton: true,
            timer: 10000
        });
        // Toast.fire({
        //     icon: 'success',
        //     title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        // })
        <?php if (isset($_SESSION['msg_suc'])) { ?>
            toastr.success('<?= $_SESSION['msg_suc']; ?>')
            // swal.fire({
            //     icon: 'success',
            //     title: '<?= $_SESSION['msg_suc']; ?>'
            // })
        <?php } elseif (isset($_SESSION['msg_err'])) { ?>
            toastr.error('<?= $_SESSION['msg_err']; ?>')
            // swal.fire({
            //     icon: 'success',
            //     title: '<?= $_SESSION['msg_err']; ?>'
            // })
        <?php } ?>
    });
</script>






<div class="col-md-9">
    <div class="card rounded-0">

        <!-- jika sudah pengaduan selesai -->
        <?php if ($p->status == 'selesai') {; ?>
            <div class="ribbon-wrapper ribbon-xl">
                <div class="ribbon-bg bg-success text-lg">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <strong>Selesai</strong>
                </div>
            </div>
        <?php } ?>
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
                        <a href="#" class="mailbox-attachment-name" data-toggle="modal" data-target="#detail"><i class="fas fa-camera"></i> photo1.png</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                            <span>2.67 MB</span>
                            <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                        </span>
                    </div>
                </li>

                <!-- Modal -->
                <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <img data-dismiss="modal" aria-label="Close" src="<?= base_url('/public/img/pengaduan/' . $p->foto) ?>" class="img-fluid" alt="<?= $p->foto ?>">
                        </div>
                    </div>
                </div>

            </ul>
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
            <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
        </div>
        <!-- /.card-footer -->
    </div>
</div>
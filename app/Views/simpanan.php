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
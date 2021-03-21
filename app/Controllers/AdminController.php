<?php

namespace App\Controllers;

use Dompdf\Dompdf;


class AdminController extends BaseController
{
    private $session;
    private $userModel;
    private $adminModel;
    private $roleSession;

    public function __construct()
    {
        $this->session          = \Config\Services::session();
        $this->adminModel     = new \App\Models\Admin();
        $this->userModel        = new \App\Models\User();
    }

    public function index()
    {
        $data = ([
            'act'           => 'Dashboard',
            'title'         => "Dashboard - " . level($this->session->role_login),
            'jml_user'      => $this->userModel->countAll(),
            'jml_petugas'   => $this->adminModel->where('level', 'petugas')->countAll(),
            'jml_admin'     => $this->adminModel->where('level', 'admin')->countAll()
        ]);
        return view('admin/dashboard', $data);
    }

    public function account_users()
    {
        $data = ([
            'act'   => 'Masyarakat',
            'title' => "Data Users - Lapor Online",
            'users' => $this->userModel->orderBy('nama', 'asc')->findAll()
        ]);
        return view('admin/account-users', $data);
    }

    public function delete_user()
    {
        $nik = $this->request->getPost('nik');
        $this->userModel->where('nik', $nik)->delete();
        return redirect()->to(previous_url());
    }

    //account admin
    public function account_petugas()
    {
        $data = ([
            'act'    => 'Petugas',
            'title'  => "Data Petugas dan Admins - Lapor Online",
            'admins' => $this->adminModel->orderBy('nama_petugas', 'asc')->findAll()
        ]);
        return view('admin/account-petugas', $data);
    }

    public function do_register()
    {
        $name       = $this->request->getPost('name');
        $username   = $this->request->getPost('username');
        $email      = $this->request->getPost('email');
        $password   = $this->request->getPost('password');
        $telp       = $this->request->getPost('telp');
        $role       = $this->request->getPost('role');

        $data = ([
            'nama_petugas'  => $name,
            'username'      => $username,
            'email'         => $email,
            'password'      => password_hash($password, PASSWORD_BCRYPT),
            'telp'          => $telp,
            'level'         => $role
        ]);
        // dd($data);
        $add = $this->adminModel->insert($data);

        if ($add) {
            $this->session->setFlashdata('msg', 'Berhasil menambahkan ' . $role);
            return redirect()->to(previous_url());
        } else {
            $this->session->setFlashdata('msg', 'Gagal menambahkan ' . $role);
            return redirect()->to(previous_url());
        }
    }

    public function data_laporan()
    {
        $laporan = $this->adminModel->findAll();
        $data = ([
            'title' => 'Laporan Pengaduan - ' . $this->roleSession,
            'laporan' => $laporan
        ]);
        return view('admin/laporan');
    }

    public function export()
    {

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('Halo ini pdf mas sahal');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}

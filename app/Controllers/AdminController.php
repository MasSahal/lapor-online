<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    private $session;
    private $userModel;
    private $adminModel;
    private $kategoriModel;
    private $pengaduanModel;
    private $tanggapanModel;
    private $db;

    public function __construct()
    {
        $this->session          = \Config\Services::session();
        $this->adminModel     = new \App\Models\Admin();
        $this->pengaduanModel     = new \App\Models\Pengaduan();
        $this->kategoriModel     = new \App\Models\Kategori();
        $this->tanggapanModel     = new \App\Models\Tanggapan();
        $this->userModel        = new \App\Models\User();
        $this->db        = \Config\Database::connect();
    }

    public function index()
    {
        $data = ([
            'act'           => 'Dashboard',
            'title'         => "Dashboard - " . level($this->session->role_login),
            'jml_user'      => $this->userModel->countAll(),
            'jml_laporan'   => $this->pengaduanModel->countAll(),
            'jml_petugas'   => $this->adminModel->where('level', 'petugas')->countAllResults(),
            'jml_admin'     => $this->adminModel->where('level', 'admin')->countAllResults()
        ]);
        return view('admin/dashboard', $data);
    }

    public function account_users()
    {
        $data = ([
            'act'   => 'Masyarakat',
            'title' => "Data Akun Masyarakat - Lapor Online",
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
            'title'  => "Data Akun Petugas - Lapor Online",
            'admins' => $this->adminModel->orderBy('nama_petugas', 'asc')->where('level', 'petugas')->findAll()
        ]);
        return view('admin/account-petugas', $data);
    }

    public function account_admin()
    {
        $data = ([
            'act'    => 'Admin',
            'title'  => "Data Akun Admin - Lapor Online",
            'admins' => $this->adminModel->orderBy('nama_petugas', 'asc')->where('level', 'admin')->findAll()
        ]);
        return view('admin/account-admin', $data);
    }

    public function do_register()
    {
        $name       = $this->request->getPost('name');
        $username   = $this->request->getPost('username');
        $email      = $this->request->getPost('email');
        $password   = $this->request->getPost('password');
        $telp       = $this->request->getPost('telp');
        $role       = $this->request->getPost('role');

        $cek_email = $this->adminModel->where('email', $email)->first();
        if (!$cek_email) {
            $data = ([
                'nama_petugas'  => $name,
                'username'      => $username,
                'email'         => $email,
                'password'      => password_hash($password, PASSWORD_BCRYPT),
                'telp'          => $telp,
                'level'         => $role
            ]);

            $add = $this->adminModel->insert($data);

            if ($add) {
                $this->session->setFlashdata('msg_suc', 'Berhasil menambahkan ' . $role);
                return redirect()->to(previous_url());
            } else {
                $this->session->setFlashdata('msg_err', 'Gagal menambahkan ' . $role);
                return redirect()->to(previous_url());
            }
        } else {
            $this->session->setFlashdata('msg_err', 'Maaf, Email telah terdaftar');
            return redirect()->to(previous_url());
        }
    }

    public function do_edit_account()
    {
        $id_petugas  = $this->request->getPost('id_petugas');
        $name       = $this->request->getPost('name');
        $username   = $this->request->getPost('username');
        $email      = $this->request->getPost('email');
        $telp       = $this->request->getPost('telp');
        $role       = $this->request->getPost('role');

        $data = ([
            'nama_petugas'  => $name,
            'username'      => $username,
            'email'         => $email,
            'telp'          => $telp,
            'level'         => $role
        ]);

        $add = $this->adminModel->update($id_petugas, $data);

        if ($add) {
            $this->session->setFlashdata('msg_suc', 'Berhasil mengubah akun ' . $role);
            return redirect()->to(previous_url());
        } else {
            $this->session->setFlashdata('msg_err', 'Gagal mengubah akun ' . $role);
            return redirect()->to(previous_url());
        }
    }

    public function delete_petugas()
    {
        $id_petugas = $this->request->getPost('id_petugas');

        //cek petugas apakah pernah mengkonfir pengaduan
        $cek = $this->tanggapanModel->where('id_petugas', $id_petugas)->first();

        if (!$cek) {
            $del = $this->adminModel->delete($id_petugas);

            if ($del) {
                $this->session->setFlashdata("msg_suc", "Selamat, Akun berhasil di hapus!");
                return redirect()->to(previous_url());
            } else {
                $this->session->setFlashdata("msg_err", "Maaf, Akun tidak berhasil di hapus!");
                return redirect()->to(previous_url());
            }

            //
        } else {
            $this->session->setFlashdata("msg_war", "Warning!");
            $this->session->setFlashdata("msg_war_info", "Akun tidak dapat dihapus!");
            return redirect()->to(previous_url());
        }
    }


    //pengaduan
    public function data_pengaduan()
    {
        $pengaduan = $this->pengaduanModel->getPengaduan();
        $data = ([
            'act'           => 'Pengaduan',
            'title'         => 'Data Laporan Pengaduan Masyarakat- Lapor Online',
            'pengaduan'     => $pengaduan
        ]);
        return view('admin/pengaduan', $data);
    }

    public function detail_pengaduan($id)
    {
        $pengaduan = $this->pengaduanModel->getPengaduan($id);
        if ($pengaduan) {

            $data = ([
                'act'           => 'Pengaduan',
                'title'         => 'Detail Pengaduan ID ' . $id . ' - Lapor Online',
                'pengaduan'     => $pengaduan
            ]);
            $cek_tanggapan = $this->tanggapanModel->getTanggapanWithPetugas($id);
            if ($cek_tanggapan) {

                $data['tanggapan'] = $cek_tanggapan;
                return view('admin/pengaduan-detail', $data);
            } else {
                $data['tanggapan'] = false;
                return view('admin/pengaduan-detail', $data);
            }
        } else {
            return redirect()->to(base_url('/admin/pengaduan'));
        }
    }

    public function hapus_pengaduan($id)
    {
        $cek = $this->pengaduanModel->where('id_pengaduan', $id)->first();

        //hapus gambar
        unlink(ROOTPATH . '/public/img/pengaduan' . $cek->foto);

        $hapus = $this->pengaduanModel->delete($id);

        if ($hapus) {
            $this->session->setFlashdata("msg_suc", "Data pengaduan berhasil dihapus!");
            return redirect()->to(base_url('/admin/pengaduan'));
        } else {
            $this->session->setFlashdata("msg_suc", "Data pengaduan tidak berhasil dihapus!");
            return redirect()->to(base_url('/admin/pengaduan'));
        }
    }

    public function tolak_pengaduan()
    {
        $id_pengaduan = $this->request->getPost('id_pengaduan');
        $data = (["status" => 'ditolak']);
        $upp = $this->pengaduanModel->update($id_pengaduan, $data);

        if ($upp) {
            $this->session->setFlashdata("msg_suc", "Selamat, Pengaduan berhasil ditolak !");
            return redirect()->to(base_url('/admin/pengaduan/' . $id_pengaduan . '/detail'));
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Pengaduan tidak berhasil ditolak !");
            return redirect()->to(base_url('/admin/pengaduan/' . $id_pengaduan . '/detail'));
        }
    }

    public function verifikasi_pengaduan()
    {
        $id_pengaduan = $this->request->getPost('id_pengaduan');
        $data = (["status" => 'terverifikasi']);
        $upp = $this->pengaduanModel->update($id_pengaduan, $data);

        if ($upp) {
            $this->session->setFlashdata("msg_suc", "Selamat, Pengaduan berhasil di verifikasi !");
            return redirect()->to(base_url('/admin/pengaduan/' . $id_pengaduan . '/detail'));
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Pengaduan tidak berhasil di verifikasi !");
            return redirect()->to(base_url('/admin/pengaduan/' . $id_pengaduan . '/detail'));
        }
    }

    public function selesaikan_pengaduan()
    {
        $id_pengaduan = $this->request->getPost('id_pengaduan');
        $data = (["status" => 'selesai']);
        $upp = $this->pengaduanModel->update($id_pengaduan, $data);

        if ($upp) {
            $this->session->setFlashdata("msg_suc", "Selamat, Pengaduan berhasil diselesaikan !");
            return redirect()->to(base_url('/admin/pengaduan/' . $id_pengaduan . '/detail'));
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Pengaduan tidak berhasil diselesaikan !");
            return redirect()->to(base_url('/admin/pengaduan/' . $id_pengaduan . '/detail'));
        }
    }

    protected function filter_pengaduan($status = false, $awal = false, $akhir = false)
    {
        $tgl_awal = date('Y-m-d H:i:s', strtotime($awal . " 00:00:00")); //filter ke date
        $tgl_akhir = date('Y-m-d H:i:s', strtotime($akhir . " 23:59:59")); //filter ke date

        if ($status == 'terkirim') {
            $status = "Terkirim";
        } elseif ($status == 'terverifikasi') {
            $status = "Terverifikasi";
        } elseif ($status == 'diproses') {
            $status = "Diproses";
        } elseif ($status == 'selesai') {
            $status = "Selesai";
        }
        # Jika semua di isi nilai
        if ($status != "" && $awal != "" && $akhir != "") {
            $judul              = "Data Pengaduan " . $status . " dari " . tanggal($tgl_awal) . " sampai " . tanggal($tgl_akhir);
            $pengaduan            = $this->pengaduanModel->getDataByDateStatus($tgl_awal, $tgl_akhir, $status);
            $tanggal            = "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');

            # Jika status kosong
        } else if ($status == "" && $awal != "" && $akhir != "") {
            $judul              = "Data Pengaduan " . tanggal($tgl_awal) . " sampai " . tanggal($tgl_akhir);
            $pengaduan            = $this->pengaduanModel->getDataByDate($tgl_awal, $tgl_akhir,);
            $tanggal            = "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');

            # Jika tanggal kosong
        } else if ($status != "" && $awal == "" && $akhir == "") {

            $judul              = "Data Pengaduan " . $status;
            $pengaduan            = $this->pengaduanModel->getDataByStatus($status);
            $tanggal            = "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');

            # Jika tidak ada sama sekali
        } else {
            $judul                 = "Data Seluruh Pengaduan";
            $pengaduan             = $this->pengaduanModel->getPengaduan();
            $tanggal               = "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');
        }

        return array('judul' => $judul, 'pengaduan' => $pengaduan, 'tanggal' => $tanggal);
    }

    public function generate_pengaduan()
    {
        $status     = $this->request->getGet('status');
        $date_awal  = $this->request->getGet('date_awal');
        $date_akhir = $this->request->getGet('date_akhir');

        $filter = $this->filter_pengaduan($status, $date_awal, $date_akhir);

        $data = ([
            'act'   => 'Laporan',
            'title' => "Genrate Laporan Pengaduan - Lapor Online",
            'date_awal' => $date_awal,
            'date_akhir' => $date_akhir,
            'status' => $status,
            'pengaduan' => $filter['pengaduan'],
        ]);
        return view('admin/pengaduan-generate', $data);
    }

    public function print_detail_pengaduan($id_pengaduan)
    {
        $pengaduan = $this->pengaduanModel->getPengaduan($id_pengaduan);
        if ($pengaduan) {
            $data = ([
                'act'   => 'Laporan',
                'pengaduan' => $pengaduan
            ]);
            return view('admin/data/detail-pengaduan-print', $data);
        } else {
            return redirect()->to(base_url('/admin/dashboard'));
        }
    }

    public function print_pengaduan()
    {
        $status     = $this->request->getGet('status');
        $date_awal  = $this->request->getGet('date_awal');
        $date_akhir = $this->request->getGet('date_akhir');

        $filter = $this->filter_pengaduan($status, $date_awal, $date_akhir);
        $data = ([
            'act'   => 'Laporan',
            'title' => $filter['judul'],
            'tanggal' => $filter['tanggal'],
            'pengaduan' => $filter['pengaduan'],
        ]);
        return view('admin/data/pengaduan-print', $data);
    }


    //tanggapan
    public function kirim_tanggapan()
    {
        $id_pengaduan = $this->request->getPost('id_pengaduan');
        $tanggapan = $this->request->getPost('tanggapan');
        $id_petugas = $this->session->id_petugas;

        $data = ([
            'id_pengaduan' => $id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d H:i:s'),
            'tanggapan' => $tanggapan,
            'id_petugas' => $id_petugas,
        ]);

        //update status ke di proses
        $upp = $this->pengaduanModel->update($id_pengaduan, ['status' => 'diproses']);

        if ($upp) {
            $tanggapan = $this->tanggapanModel->insert($data);
            if ($tanggapan) {
                $this->session->setFlashdata("msg_suc", "Selamat, Pengaduan berhasil ditanggapi !");
                return redirect()->to(base_url('/admin/pengaduan/' . $id_pengaduan . '/detail'));
            } else {
                $this->session->setFlashdata("msg_err", "Maaf, Pengaduan tidak berhasil ditanggapi !");
                return redirect()->to(base_url('/admin/pengaduan/' . $id_pengaduan . '/detail'));
            }
            //
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Pengaduan tidak berhasil ditanggapi !");
            return redirect()->to(base_url('/admin/pengaduan/' . $id_pengaduan . '/detail'));
        }
        return redirect()->to(base_url('/admin/pengaduan/' . $id_pengaduan . '/detail'));
    }


    //kategori
    public function kategori()
    {
        $id_kategori = $this->db->query('select id_kategori from pengaduan')->getResultObject();

        $data = ([
            'act'    => 'Kategori',
            'title'  => "Data Kategori Pengaduan - Lapor Online",
            'kategori' => $this->kategoriModel->findAll(),
            'id_kategori' => $id_kategori
        ]);

        return view('admin/kategori', $data);
    }

    public function insert_kategori()
    {
        $kat = $this->request->getPost('kategori');

        $add = $this->kategoriModel->insert(['kategori' => $kat]);
        if ($add) {
            $this->session->setFlashdata("msg_suc", "Selamat, Kategori berhasil ditambahkan !");
            return redirect()->to(base_url('/admin/kategori'));
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Kategori tidak berhasil ditambahkan !");
            return redirect()->to(base_url('/admin/kategori'));
        }
    }

    public function edit_kategori()
    {
        $id_kat = $this->request->getPost('id_kategori');
        $kat = $this->request->getPost('kategori');

        $upd = $this->kategoriModel->update($id_kat, ['kategori' => $kat]);
        if ($upd) {
            $this->session->setFlashdata("msg_suc", "Selamat, Kategori berhasil diubah !");
            return redirect()->to(base_url('/admin/kategori'));
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Kategori tidak berhasil diubah !");
            return redirect()->to(base_url('/admin/kategori'));
        }
    }

    public function delete_kategori()
    {
        $id_kat = $this->request->getPost('id_kategori');

        //cek kategori apakah sedang di pakai
        $cek = $this->pengaduanModel->where('id_kategori', $id_kat)->first();
        if (!$cek) {

            $del = $this->kategoriModel->delete($id_kat);
            if ($del) {
                $this->session->setFlashdata("msg_suc", "Selamat, Kategori berhasil dihapus !");
                return redirect()->to(base_url('/admin/kategori'));
            } else {
                $this->session->setFlashdata("msg_err", "Maaf, Kategori tidak berhasil dihapus !");
                return redirect()->to(base_url('/admin/kategori'));
            }

            // 
        } else {
            $this->session->setFlashdata("msg_war", "Warning!");
            $this->session->setFlashdata("msg_war_info", "Kategori sedang digunakan!");
            return redirect()->to(base_url('/admin/kategori'));
        }
    }


    //profile admin
    public function profile()
    {
        $id = $this->session->id_petugas;

        $profile = $this->adminModel->where('id_petugas', $id)->first();
        $data = ([
            'act'    => 'Profile',
            'title'  => "Profile Saya - Lapor Online",
            'profile' => $profile
        ]);

        return view('admin/my-profile', $data);
    }

    public function do_edit_profile()
    {
        $id_petugas  = $this->request->getPost('id_petugas');
        $name       = $this->request->getPost('name');
        $username   = $this->request->getPost('username');
        $email      = $this->request->getPost('email');
        $telp       = $this->request->getPost('telp');

        $data = ([
            'nama_petugas'  => $name,
            'username'      => $username,
            'email'         => $email,
            'telp'          => $telp
        ]);

        $upp = $this->adminModel->update($id_petugas, $data);

        if ($upp) {
            $this->session->setFlashdata('msg_suc', 'Berhasil memperbarui profile!');
            return redirect()->to(base_url('/admin/my-profile'));
        } else {
            $this->session->setFlashdata('msg_err', 'Gagal memperbarui profile! ');
            return redirect()->to(base_url('/admin/my-profile'));
        }
    }

    public function ganti_password_profile()
    {
        $id_petugas  = $this->request->getPost('id_petugas');
        $pass       = $this->request->getPost('pass');

        // dd($pass);
        $data = ([
            'password'  => password_hash($pass, PASSWORD_BCRYPT)
        ]);

        $upp = $this->adminModel->update($id_petugas, $data);

        if ($upp) {
            $this->session->setFlashdata('msg_suc', 'Selamat, Password berhasil diubah!');
            return redirect()->to(base_url('/admin/my-profile'));
        } else {
            $this->session->setFlashdata('msg_err', 'Maaf, Password tidak berhasil diubah ');
            return redirect()->to(base_url('/admin/my-profile'));
        }
    }
}

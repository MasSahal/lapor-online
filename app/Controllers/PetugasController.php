<?php

namespace App\Controllers;

class PetugasController extends BaseController
{
    private $session;
    private $userModel;
    private $adminModel;
    private $pengaduanModel;
    private $tanggapanModel;
    private $kategoriModel;
    private $db;

    public function __construct()
    {
        $this->session          = \Config\Services::session();
        $this->adminModel     = new \App\Models\Admin();
        $this->pengaduanModel     = new \App\Models\Pengaduan();
        $this->tanggapanModel     = new \App\Models\Tanggapan();
        $this->userModel        = new \App\Models\User();
        $this->kategoriModel        = new \App\Models\Kategori();
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
        return view('petugas/dashboard', $data);
    }

    public function account_users()
    {
        $data = ([
            'act'   => 'Masyarakat',
            'title' => "Data Akun Masyarakat - Lapor Online",
            'users' => $this->userModel->orderBy('nama', 'asc')->findAll()
        ]);
        return view('petugas/account-users', $data);
    }

    public function delete_user()
    {
        $nik = $this->request->getPost('nik');
        $this->userModel->where('nik', $nik)->delete();
        return redirect()->to(previous_url());
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


    //pengaduan
    public function data_pengaduan()
    {
        $pengaduan = $this->pengaduanModel->getPengaduan();
        $data = ([
            'act'           => 'Pengaduan',
            'title'         => 'Data Laporan Pengaduan Masyarakat- Lapor Online',
            'pengaduan'     => $pengaduan
        ]);
        return view('petugas/pengaduan', $data);
    }

    public function detail_pengaduan($id)
    {
        $pengaduan = $this->pengaduanModel->getPengaduan($id);
        if ($pengaduan) {

            $data = ([
                'act'           => 'Pengaduan',
                'title'         => 'Detail Pengaduan ID ' . $id . '- Lapor Online',
                'pengaduan'     => $pengaduan
            ]);
            $cek_tanggapan = $this->tanggapanModel->getTanggapanWithPetugas($id);
            if ($cek_tanggapan) {

                $data['tanggapan'] = $cek_tanggapan;
                return view('petugas/pengaduan-detail', $data);
            } else {
                $data['tanggapan'] = false;
                return view('petugas/pengaduan-detail', $data);
            }
        } else {
            return redirect()->to(base_url('/petugas/pengaduan'));
        }
    }

    public function print_detail_pengaduan($id_pengaduan)
    {
        $pengaduan = $this->pengaduanModel->getPengaduan($id_pengaduan);
        if ($pengaduan) {
            $data = ([
                'act'   => 'Laporan',
                'pengaduan' => $pengaduan
            ]);
            return view('petugas/data/detail-pengaduan-print', $data);
        } else {
            return redirect()->to(base_url('/petugas/dashboard'));
        }
    }


    public function tolak_pengaduan()
    {
        $id_pengaduan = $this->request->getPost('id_pengaduan');
        $data = (["status" => 'ditolak']);
        $upp = $this->pengaduanModel->update($id_pengaduan, $data);

        if ($upp) {
            $this->session->setFlashdata("msg_suc", "Selamat, Pengaduan berhasil ditolak !");
            return redirect()->to(base_url('/petugas/pengaduan/' . $id_pengaduan . '/detail'));
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Pengaduan tidak berhasil ditolak !");
            return redirect()->to(base_url('/petugas/pengaduan/' . $id_pengaduan . '/detail'));
        }
    }

    public function verifikasi_pengaduan()
    {
        $id_pengaduan = $this->request->getPost('id_pengaduan');
        $data = (["status" => 'terverifikasi']);
        $upp = $this->pengaduanModel->update($id_pengaduan, $data);

        if ($upp) {
            $this->session->setFlashdata("msg_suc", "Selamat, Pengaduan berhasil di verifikasi !");
            return redirect()->to(base_url('/petugas/pengaduan/' . $id_pengaduan . '/detail'));
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Pengaduan tidak berhasil di verifikasi !");
            return redirect()->to(base_url('/petugas/pengaduan/' . $id_pengaduan . '/detail'));
        }
    }

    public function selesaikan_pengaduan()
    {
        $id_pengaduan = $this->request->getPost('id_pengaduan');
        $data = (["status" => 'selesai']);
        $upp = $this->pengaduanModel->update($id_pengaduan, $data);

        if ($upp) {
            $this->session->setFlashdata("msg_suc", "Selamat, Pengaduan berhasil diselesaikan !");
            return redirect()->to(base_url('/petugas/pengaduan/' . $id_pengaduan . '/detail'));
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Pengaduan tidak berhasil diselesaikan !");
            return redirect()->to(base_url('/petugas/pengaduan/' . $id_pengaduan . '/detail'));
        }
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
            } else {
                $this->session->setFlashdata("msg_err", "Maaf, Pengaduan tidak berhasil ditanggapi !");
            }
            //
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Pengaduan tidak berhasil ditanggapi !");
        }
        return redirect()->to(base_url('/petugas/pengaduan/' . $id_pengaduan . '/detail'));
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

        return view('petugas/kategori', $data);
    }

    public function insert_kategori()
    {
        $kat = $this->request->getPost('kategori');

        $add = $this->kategoriModel->insert(['kategori' => $kat]);
        if ($add) {
            $this->session->setFlashdata("msg_suc", "Selamat, Kategori berhasil ditambahkan !");
            return redirect()->to(base_url('/petugas/kategori'));
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Kategori tidak berhasil ditambahkan !");
            return redirect()->to(base_url('/petugas/kategori'));
        }
    }

    public function edit_kategori()
    {
        $id_kat = $this->request->getPost('id_kategori');
        $kat = $this->request->getPost('kategori');

        $upd = $this->kategoriModel->update($id_kat, ['kategori' => $kat]);
        if ($upd) {
            $this->session->setFlashdata("msg_suc", "Selamat, Kategori berhasil diubah !");
            return redirect()->to(base_url('/petugas/kategori'));
        } else {
            $this->session->setFlashdata("msg_err", "Maaf, Kategori tidak berhasil diubah !");
            return redirect()->to(base_url('/petugas/kategori'));
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
                return redirect()->to(base_url('/petugas/kategori'));
            } else {
                $this->session->setFlashdata("msg_err", "Maaf, Kategori tidak berhasil dihapus !");
                return redirect()->to(base_url('/petugas/kategori'));
            }

            // 
        } else {
            $this->session->setFlashdata("msg_war", "Warning!");
            $this->session->setFlashdata("msg_war_info", "Kategori sedang digunakan!");
            return redirect()->to(base_url('/petugas/kategori'));
        }
    }


    //profile petugas
    public function profile()
    {
        $id = $this->session->id_petugas;

        $profile = $this->adminModel->where('id_petugas', $id)->first();
        $data = ([
            'act'    => 'Profile',
            'title'  => "Profile Saya - Lapor Online",
            'profile' => $profile
        ]);

        return view('petugas/my-profile', $data);
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

            // perbarui sesi
            $ses = ([
                'nama'             => $name,
                'username'         => $username,
                'email'            => $email
            ]);
            // perbarui sesi
            $this->session->set($ses);
            $this->session->setFlashdata('msg_suc', 'Berhasil memperbarui profile!');
            return redirect()->to(base_url('/petugas/my-profile'));
        } else {
            $this->session->setFlashdata('msg_err', 'Gagal memperbarui profile! ');
            return redirect()->to(base_url('/petugas/my-profile'));
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
            return redirect()->to(base_url('/petugas/my-profile'));
        } else {
            $this->session->setFlashdata('msg_err', 'Maaf, Password tidak berhasil diubah ');
            return redirect()->to(base_url('/petugas/my-profile'));
        }
    }


    //syarat dan ketentuan
    public function ketentuan()
    {
        $data['act'] = "Ketentuan";
        $data['title'] = "Syarat Dan Ketentuan - Lapor Online";
        return view('petugas/syarat-ketentuan', $data);
    }
}

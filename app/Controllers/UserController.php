<?php

namespace App\Controllers;

class UserController extends BaseController
{
    private $session;
    private $userModel;
    private $pengaduanModel;
    private $kategoriModel;
    private $tanggapanModel;

    public function __construct()
    {
        $this->session          = \Config\Services::session();
        $this->pengaduanModel     = new \App\Models\Pengaduan();
        $this->kategoriModel     = new \App\Models\Kategori();
        $this->tanggapanModel     = new \App\Models\Tanggapan();
        $this->userModel        = new \App\Models\User();
    }

    public function index()
    {
        $data = ([
            'act' => 'Home',
            'kategori' => $this->kategoriModel->findAll(),
            'jml_pengaduan' => $this->pengaduanModel->countAll(),
        ]);
        return view('user/dashboard', $data);
    }

    public function pengaduan_saya()
    {
        $nik = $this->session->nik;

        $id_pengaduan = $this->request->getGet('detail');
        if (isset($id_pengaduan)) {
            $cek = $this->pengaduanModel->getPengaduan($id_pengaduan);

            //cek tanggapan
            $cek_tanggapan = $this->tanggapanModel->getTanggapanWithPetugas($id_pengaduan);
            if (!$cek_tanggapan) {
                // echo "tanggapan gada";
                $tanggapan = false;
                // return redirect()->to(base_url('/user/pengaduan-saya'));
            }

            if (!$cek) {
                // echo "ditolak sakit";
                return redirect()->to(base_url('/user/pengaduan-saya'));
            }

            //replace data
            $pengaduan = $cek;
            $tanggapan = $cek_tanggapan;

            //jika gk di set get detail
        } else {
            //data pengaduan
            $pengaduan = ([
                'terkirim'      =>  $this->pengaduanModel->getPengaduanNik($nik, 'terkirim'),
                'terverifikasi' =>  $this->pengaduanModel->getPengaduanNik($nik, 'terverifikasi'),
                'diproses'      =>  $this->pengaduanModel->getPengaduanNik($nik, 'diproses'),
                'selesai'       =>  $this->pengaduanModel->getPengaduanNik($nik, 'selesai'),
                'ditolak'       =>  $this->pengaduanModel->getPengaduanNik($nik, 'ditolak')
            ]);

            $tanggapan = false;
        }

        $data = ([
            'act'           => 'Pengaduan Saya',
            'pengaduan'     => $pengaduan,
            'tanggapan'     => $tanggapan,
            'jml_all'       => $this->pengaduanModel->countData($nik),
            'jml_kirim'     => $this->pengaduanModel->countData($nik, 'terkirim'),
            'jml_verif'     => $this->pengaduanModel->countData($nik, 'terverifikasi'),
            'jml_proses'    => $this->pengaduanModel->countData($nik, 'diproses'),
            'jml_selesai'   => $this->pengaduanModel->countData($nik, 'selesai'),
            'jml_ditolak'   => $this->pengaduanModel->countData($nik, 'ditolak'),
        ]);


        // dd(isset($id_pengaduan));

        // dd($cek);
        return view('user/pengaduan-saya', $data);
    }

    public function ketentuan()
    {
        return view('user/syarat-ketentuan');
    }

    public function insert_pengaduan()
    {
        $subjek     = $this->request->getPost('subjek');
        $isi        = htmlspecialchars($this->request->getPost('isi'));
        $kategori   = $this->request->getPost('kategori');
        $nik        = $this->request->getPost('nik');


        $cek = $this->userModel->where('nik', $nik)->first();

        if ($cek) {
            $lampiran       = $this->request->getFile('file');

            // dd($lampiran);
            $validated = $this->validate([
                'file' => 'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/png]'
            ]);

            if ($validated) {
                $nama_baru = date('Ymd') . "_pengaduan_" . str_replace(" ", "_", $this->session->username) . "_" . $lampiran->getRandomName();
                $input = $lampiran->move('./public/img/pengaduan', $nama_baru);

                //jika berhasil input file
                if ($input) {
                    $data = ([
                        'id_kategori' => $kategori,
                        'subjek_pengaduan' => $subjek,
                        'tgl_pengaduan' => date('Y-m-d G:i:s'),
                        'nik' => $cek->nik,
                        'isi_laporan' => $isi,
                        'foto' => $nama_baru
                    ]);

                    // dd($data);
                    $tambah = $this->pengaduanModel->insert($data);
                    if ($tambah) {
                        $this->session->setFlashdata("msg_suc", "Berhasil mengirim pengaduan !");
                        return redirect()->to(previous_url());
                    } else {
                        $this->session->setFlashdata("msg_err", "Gagal mengirim pengaduan !");
                        return redirect()->to(previous_url());
                    }
                } else {
                    $this->session->setFlashdata("msg_err", "Terjadi kesalahan saat mengupload lampiran !");
                    return redirect()->to(previous_url());
                }
            } else {
                $this->session->setFlashdata("msg_err", "Format lampiran tidak valid !");
                return redirect()->to(previous_url());
            }
        } else {
            $this->session->setFlashdata("msg_err", "Gagal mengirim pengaduan !");
            return redirect()->to(previous_url());
        }
    }

    public function delete_pengaduan()
    {
        $id = $this->request->getPost('id_pengaduan');
        $cek = $this->pengaduanModel->where('id_pengaduan', $id)->first();

        //hapus gambar
        unlink(ROOTPATH . '/public/img/pengaduan/' . $cek->foto);

        $hapus = $this->pengaduanModel->delete($id);

        if ($hapus) {
            $this->session->setFlashdata("msg_suc", "Data pengaduan berhasil dihapus!");
            return redirect()->to(base_url('/user/pengaduan-saya'));
        } else {
            $this->session->setFlashdata("msg_suc", "Data pengaduan tidak berhasil dihapus!");
            return redirect()->to(base_url('/user/pengaduan-saya'));
        }
    }

    public function print_detail_pengaduan($id_pengaduan)
    {
        $pengaduan = $this->pengaduanModel->getPengaduan($id_pengaduan);
        if ($pengaduan) {
            $data = ([
                'pengaduan' => $pengaduan
            ]);
            return view('user/detail-pengaduan-print', $data);
        } else {
            return redirect()->to(base_url('/user/home'));
        }
    }



    //profile admin
    public function profile()
    {
        $nik = $this->session->nik;
        $profile = $this->userModel->where('nik', $nik)->first();
        $data = ([
            'act'    => 'Profile',
            'title'  => "Profile Saya - Lapor Online",
            'jml_all'  => $this->pengaduanModel->countData($nik),
            'profile' => $profile
        ]);

        return view('user/profile', $data);
    }

    public function do_edit_profile()
    {

        $nik         = $this->request->getPost('nik');
        $name        = $this->request->getPost('name');
        $username    = $this->request->getPost('username');
        $email       = $this->request->getPost('email');
        $telp        = $this->request->getPost('telp');

        $data = ([
            'nik'       => $nik,
            'nama'      => $name,
            'email'     => $email,
            'username'  => $username,
            'telp'      => $telp
        ]);

        // dd($data);
        $upp = $this->userModel->update($nik, $data);
        if ($upp) {
            $this->session->setFlashdata('msg_suc', 'Berhasil memperbarui profile!');
            return redirect()->to(base_url('/user/profile'));
        } else {
            $this->session->setFlashdata('msg_err', 'Gagal memperbarui profile! ');
            return redirect()->to(base_url('/user/profile'));
        }
    }

    public function ganti_password_profile()
    {
        $nik  = $this->request->getPost('nik');
        $pass       = $this->request->getPost('pass');

        // dd($pass);
        $data = ([
            'password'  => password_hash($pass, PASSWORD_BCRYPT)
        ]);

        $upp = $this->userModel->update($nik, $data);

        if ($upp) {
            $this->session->setFlashdata('msg_suc', 'Selamat, Password berhasil diubah!');
            return redirect()->to(base_url('/user/profile'));
        } else {
            $this->session->setFlashdata('msg_err', 'Maaf, Password tidak berhasil diubah ');
            return redirect()->to(base_url('/user/profile'));
        }
    }
}

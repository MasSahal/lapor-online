<?php

namespace App\Controllers;

class UserController extends BaseController
{
    private $session;
    private $userModel;
    private $pengaduanModel;
    private $kategoriModel;

    public function __construct()
    {
        $this->session          = \Config\Services::session();
        $this->pengaduanModel     = new \App\Models\Pengaduan();
        $this->kategoriModel     = new \App\Models\Kategori();
        $this->userModel        = new \App\Models\User();
    }

    public function index()
    {
        $data = ([
            'act' => 'Home',
            'kategori' => $this->kategoriModel->findAll(),
        ]);
        return view('user/dashboard', $data);
    }

    public function pengaduan_saya()
    {
        $data = ([
            'act'           => 'Pengaduan Saya',
            'pengaduan'     => $this->pengaduanModel->getPengaduan(),
            'jml_all'       => $this->pengaduanModel->countAll(),
            'jml_kirim'     => $this->pengaduanModel->where('status', 0)->countAll(),
            'jml_verif'     => $this->pengaduanModel->where('status', 'terverifikasi')->countAll(),
            'jml_proses'    => $this->pengaduanModel->where('status', 'proses')->countAll(),
            'jml_selesai'   => $this->pengaduanModel->where('status', 'selesai')->countAll(),
        ]);
        return view('user/pengaduan-saya', $data);
    }

    public function do_pengaduan()
    {
        $subjek     = $this->request->getPost('subjek');
        $isi        = $this->request->getPost('isi');
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
}

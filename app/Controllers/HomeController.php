<?php

namespace App\Controllers;

class HomeController extends BaseController
{
	private $session;
	private $userModel;
	private $adminModel;

	public function __construct()
	{
		$this->session          = \Config\Services::session();
		$this->adminModel     = new \App\Models\Admin();
		$this->userModel        = new \App\Models\User();
	}
	//fungsi login
	public function index()
	{
		return view('login-user');
	}

	public function login_admin()
	{
		return view('login-admin');
	}

	public function dashboard()
	{
		$data['users'] = $this->userModel->orderBy('nama', 'asc')->findAll();
		return view('admin/add-user', $data);
	}

	public function admin()
	{
		return view('dashboard');
	}

	public function register()
	{
		return view('register');
	}

	//register user
	public function do_register()
	{
		$nik 		= $this->request->getPost('nik');
		$name	 	= $this->request->getPost('username');
		// $email 		= $this->request->getPost('email');
		$password 	= $this->request->getPost('password');
		$username 	= strtolower(str_replace(" ", "", $name));

		$cek = $this->userModel->where('nik', $nik)->first();

		// dd(!$cek);
		if (!$cek) {
			$data = ([
				'nik' 		=> $nik,
				'nama' 		=> $name,
				'username' 	=> $username,
				'password' 	=> password_hash($password, PASSWORD_BCRYPT)
			]);

			$add = $this->userModel->insert($data);
			$this->session->setFlashdata('msg_suc', 'Selamat pendaftaran berhasil!');
			return redirect()->to(base_url());
		} else {
			$this->session->setFlashdata('msg_err', 'Maaf NIK telah terdaftar!, silahkan login');
			return redirect()->to(base_url());
		}
	}

	public function auth_user()
	{
		$mailnik 	= $this->request->getPost('mailnik');
		$password 	= $this->request->getPost('password');
		$cek = $this->userModel->where('nik', $mailnik)->orWhere('email', $mailnik)->first();

		//jika true
		if ($cek) {
			//seleksi password
			$cek_pw = password_verify($password, $cek->password);
			// var_dump($cek_pw);

			if ($cek_pw) {

				//buat session
				$ses = ([
					'is_login' 		=> true,
					'role_login' 	=> 'user',
					'nama' 			=> $cek->nama,
					'username' 		=> $cek->username,
					'email'			=> $cek->email,
					'nik' 			=> $cek->nik
				]);
				// dd($ses);
				$this->session->set($ses);

				//alihkan setelah login
				return redirect()->to(base_url('/user'));
				// echo "halo";
			} else {
				$this->session->setFlashdata('msg_err', 'Maaf NIK/email atau password Salah!');
				return redirect()->to(base_url());
			}
		} else {
			$this->session->setFlashdata('msg_err', 'Maaf NIK/email atau password tidak ditemukan!');
			return redirect()->to(base_url());
		}
	}

	public function auth_petugas()
	{
		$email 		= $this->request->getPost('email');
		$password 	= $this->request->getPost('password');

		$cek = $this->adminModel->where('email', $email)->first();

		//jika true
		if ($cek) {

			//seleksi password
			if (password_verify($password, $cek->password)) {

				//seleksi role/level akun
				if ($cek->level == 'admin') {
					//buat data session admin
					$data = ([
						'is_login' 		=> true,
						'role_login' 	=> 'admin',
						'id_petugas' 	=> $cek->id_petugas,
						'nama' 			=> $cek->nama_petugas,
						'username' 		=> $cek->username,
						'email' 		=> $cek->email
					]);

					//buat sesi login
					$this->session->set($data);

					//alihkan setelah login
					return redirect()->to(base_url('/admin/dashboard'));
				} else {

					//buat data session petugas
					$data = ([
						'is_login' 		=> true,
						'role_login' 	=> 'petugas',
						'id_petugas' 	=> $cek->id_petugas,
						'nama' 			=> $cek->nama_petugas,
						'username' 		=> $cek->username,
						'email' 		=> $cek->email
					]);

					//buat sesi login
					$this->session->set($data);

					//alihkan setelah login
					return redirect()->to(base_url('/petugas/dashboard'));
				}
			} else {
				$this->session->setFlashdata("msg_err", "Maaf, email atau password salah !");
				return redirect()->to(previous_url());
			}
		} else {
			$this->session->setFlashdata("msg_err", "Maaf, email atau password salah !");
			return redirect()->to(previous_url());
		}
	}

	//logout
	public function log_out()
	{
		$this->session->destroy();
		return redirect()->to(base_url('/'));
	}
}

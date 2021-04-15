<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index');
$routes->get('/dashboard', 'HomeController::dashboard');
$routes->get('/login', 'HomeController::index');
$routes->get('/admin', 'HomeController::login_admin');
$routes->get('/pdf', 'HomeController::export');

// $routes->get('/admin', 'HomeController::admin');
$routes->get('/register', 'HomeController::register');
$routes->post('/auth', 'HomeController::auth_user');
$routes->post('/register-member', 'HomeController::do_register');
$routes->post('admin/auth', 'HomeController::auth_petugas');


//route user
$routes->group('user', ['filter' => 'ceklogin'], function ($routes) {
	$routes->get('', 'UserController::index');
	$routes->get('dashboard', 'UserController::index');
	$routes->get('pengaduan-saya', 'UserController::pengaduan_saya');
	$routes->get('syarat-ketentuan', 'UserController::ketentuan');
	// $routes->get('pengaduan-saya/(:num)/view', 'UserController::pengaduan_detail/$1');
	$routes->get('pengaduan-saya/(:num)/print', 'UserController::print_detail_pengaduan/$1');

	$routes->get('log-out', 'HomeController::log_out');

	$routes->post('pengaduan/insert', 'UserController::insert_pengaduan');
	$routes->post('pengaduan/selesaikan', 'UserController::selesaikan_pengaduan');
	$routes->post('pengaduan/delete', 'UserController::delete_pengaduan');
	$routes->post('pengaduan/print', 'UserController::print_pengaduan');

	//profile saya
	$routes->get('profile', 'UserController::profile');
	$routes->post('profile/edit', 'UserController::do_edit_profile');
	$routes->post('profile/change-pass', 'UserController::ganti_password_profile');
});


//route petugas
$routes->group('petugas', ['filter' => 'ceklogin'], function ($routes) {
	$routes->get('dashboard', 'PetugasController::index');
	$routes->get('logout', 'HomeController::log_out');
	$routes->get('syarat-ketentuan', 'PetugasController::ketentuan');

	//data laporan
	$routes->get('pengaduan', 'PetugasController::data_pengaduan');
	$routes->get('pengaduan/print', 'PetugasController::print_pengaduan');
	$routes->get('pengaduan/(:num)/detail', 'PetugasController::detail_pengaduan/$1');
	$routes->post('pengaduan/tolak', 'PetugasController::tolak_pengaduan');
	$routes->post('pengaduan/verifikasi', 'PetugasController::verifikasi_pengaduan');
	$routes->post('pengaduan/kirim-tanggapan', 'PetugasController::kirim_tanggapan');
	$routes->post('pengaduan/selesaikan', 'PetugasController::selesaikan_pengaduan');

	//kategori
	$routes->get('kategori', 'PetugasController::kategori');
	$routes->post('kategori/insert', 'PetugasController::insert_kategori');
	$routes->post('kategori/edit', 'PetugasController::edit_kategori');
	$routes->post('kategori/delete', 'PetugasController::delete_kategori');

	//profile saya
	$routes->get('my-profile', 'PetugasController::profile');
	$routes->post('my-profile/edit', 'PetugasController::do_edit_profile');
	$routes->post('my-profile/change-pass', 'PetugasController::ganti_password_profile');

	$routes->get('pengaduan/(:num)/print', 'PetugasController::print_detail_pengaduan/$1');
});


//route admin
$routes->group('admin', ['filter' => 'ceklogin'], function ($routes) {
	$routes->get('dashboard', 'AdminController::index');
	$routes->get('logout', 'HomeController::log_out');
	$routes->get('pdf', 'AdminController::export');
	$routes->get('syarat-ketentuan', 'AdminController::ketentuan');


	//account user
	$routes->get('account/users', 'AdminController::account_users');
	$routes->get('account/table/users', 'AdminController::table_users');
	$routes->post('account/user/(:num)/delete', 'AdminController::delete_user');
	$routes->post('account/petugas/delete', 'AdminController::delete_petugas');

	//account petugas
	$routes->get('account/petugas', 'AdminController::account_petugas');
	$routes->get('account/table/petugas', 'AdminController::table_petugas');
	$routes->post('account/register-petugas', 'AdminController::do_register');
	$routes->post('account/edit-petugas', 'AdminController::do_edit_account');
	$routes->post('account/petugas/(:num)/delete', 'AdminController::delete_petugas');

	//account petugas
	$routes->get('account/admin', 'AdminController::account_admin');
	$routes->get('account/table/petugas', 'AdminController::table_petugas');
	$routes->post('account/register-petugas', 'AdminController::do_register');
	$routes->post('account/edit-petugas', 'AdminController::do_edit_account');
	$routes->post('account/petugas/(:num)/delete', 'AdminController::delete_petugas');

	//data laporan
	$routes->get('pengaduan', 'AdminController::data_pengaduan');
	$routes->get('pengaduan/generate-laporan', 'AdminController::generate_pengaduan');
	$routes->get('pengaduan/print', 'AdminController::print_pengaduan');
	$routes->get('pengaduan/(:num)/detail', 'AdminController::detail_pengaduan/$1');
	$routes->get('pengaduan/(:num)/print', 'AdminController::print_detail_pengaduan/$1');
	$routes->post('pengaduan/delete', 'AdminController::delete_pengaduan');
	$routes->post('pengaduan/verifikasi', 'AdminController::verifikasi_pengaduan');
	$routes->post('pengaduan/tolak', 'AdminController::tolak_pengaduan');
	$routes->post('pengaduan/kirim-tanggapan', 'AdminController::kirim_tanggapan');
	$routes->post('pengaduan/selesaikan', 'AdminController::selesaikan_pengaduan');

	//kategori
	$routes->get('kategori', 'AdminController::kategori');
	$routes->post('kategori/insert', 'AdminController::insert_kategori');
	$routes->post('kategori/edit', 'AdminController::edit_kategori');
	$routes->post('kategori/delete', 'AdminController::delete_kategori');

	//profile saya
	$routes->get('my-profile', 'AdminController::profile');
	$routes->post('my-profile/edit', 'AdminController::do_edit_profile');
	$routes->post('my-profile/change-pass', 'AdminController::ganti_password_profile');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

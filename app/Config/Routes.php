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


//route user
$routes->group('user', function ($routes) {
	$routes->get('', 'UserController::index');
	$routes->get('dashboard', 'UserController::index');
	$routes->get('pengaduan-saya', 'UserController::pengaduan_saya');
	$routes->get('log-out', 'HomeController::log_out');

	$routes->post('do-pengaduan', 'UserController::do_pengaduan');
});


//route petugas
$routes->group('petugas', function ($routes) {
	$routes->get('dashboard', 'PetugasController::index');
});


//route admin
$routes->group('admin', function ($routes) {
	$routes->post('auth', 'HomeController::auth_petugas');
	$routes->get('dashboard', 'AdminController::index');
	$routes->get('pdf', 'AdminController::export');

	//account user
	$routes->get('account/users', 'AdminController::account_users');
	$routes->get('account/table/users', 'AdminController::table_users');
	$routes->post('account/user/(:num)/delete', 'AdminController::delete_user');

	//account petugas
	$routes->get('account/petugas', 'AdminController::account_petugas');
	$routes->get('account/table/petugas', 'AdminController::table_petugas');
	$routes->post('register-petugas', 'AdminController::do_register');
	$routes->post('account/petugas/(:num)/delete', 'AdminController::delete_petugas');

	//data laporan
	$routes->get('laporan', 'AdminController::data_laporan');
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

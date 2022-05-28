<?php

namespace Config;

use CodeIgniter\Router\Router;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Pages::index');
$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard\Home::index');


$routes->get('/testing', 'Api\Pembayaran::testmodel');

// === API LOGIN ====
$routes->post('/api/auth/login', 'Auth::login');

// ==== ROUTE VENDOR ==========
$routes->post('/api/menu', 'Api\Menu::index');
$routes->post('/api/vendor/simpan', 'Api\Vendor::simpan');
$routes->post('/api/vendor/listvendor', 'Api\Vendor::listvendor');
$routes->post('/api/vendor/hapusvendor', 'Api\Vendor::hapusvendor');

// ==== PEMBAYARAN VENDOR ======
$routes->post('/api/pembayaran/cek-terbayar', 'Api\Pembayaran::cekterbayar');
$routes->post('/api/pembayaran/bayarvendor', 'Api\Pembayaran::bayarvendor');
$routes->post('/api/pembayaran/listbayar', 'Api\Pembayaran::listbayar');
$routes->post('/api/pembayaran/hapus-listbayar', 'Api\Pembayaran::hapusbayaran');




















// ========= SETTING ROUTE ===========
// $routes->METODE('/ALAMAT', 'CONTROLLER::METHOT FUNGSI');

// ===== ROUTE ANONIMUS FUNGSION ======
$routes->get('/fungsi', function(){
    echo "ANONIMOUS FUNCTION";
} );

// ====== ROUTE DENGAN NILAI / PLACE HOLDER===
// :any
// :num 
// :alpha
// :alphanum
// :segment =? String tanpa spesial char

// kekurangan :any akan membuat nge bug di kontroller
$routes->get('/coba/(:any)/(:num)', 'Coba::dataplaceholder/$1/$2');

// ===== ROUTE KONTROLER DALAM FOLDER =======
$routes->get('/users', 'Admin\Users::index');

$routes->delete('/crud/detail/(:num)', 'Crud::delete/$1');
$routes->get('/crud/detail/(:any)', 'Crud::detail/$1');

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

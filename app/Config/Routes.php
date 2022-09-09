<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/akun1', 'Akun1::index');
$routes->get('/akun1/new', 'Akun1::new');
$routes->post('/akun1', 'Akun1::store');
$routes->get('/akun1/edit/(:num)', 'Akun1::edit/$1');
$routes->put('/akun1/edit/(:any)', 'Akun1::update/$1');
$routes->delete('/akun1/(:any)', 'Akun1::destroy/$1');


$routes->get('/akun2/new', 'Akun2::new');
$routes->get('/akun2/(:segment)/edit', 'Akun2::edit/$1');
// $routes->post('/akun2/(:any)/edit', 'Akun2::delete/$1'); 

$routes->get('/akun3/new', 'Akun3::new');
$routes->post('/akun3/new', 'Akun3::create');
$routes->get('/akun3/(:segment)/edit', 'Akun3::edit/$1');
// $routes->post('/akun3/(:any)/edit', 'Akun3::delete/$1'); 


$routes->get('/transaksi', 'Transaksi::index');
$routes->post('/transaksi', 'Transaksi::create');
// $routes->get('/transaksi/status/(:segment)', 'Transaksi::status/$1');

// $routes->get('/transaksi/akun3/(:any)', 'Transaksi::akun3/$1');


$routes->resource('akun2');
$routes->resource('akun3');
$routes->resource('transaksi');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->setAutoRoute(true);

$routes->group('pangkat', function ($routes) {
    $routes->get('', 'Pangkat::index');
    $routes->get('tambah', 'Pangkat::tambah');
    $routes->post('create', 'Pangkat::create');
    $routes->get('ganti/(:num)', 'Pangkat::ganti/$1');
    $routes->post('update', 'Pangkat::update');
    $routes->get('hapus/(:num)', 'Pangkat::hapus/$1');
});

$routes->group('korps', function ($routes) {
    $routes->get('', 'Korps::index');
    $routes->get('tambah', 'Korps::tambah');
    $routes->post('create', 'Korps::create');
    $routes->get('ganti/(:num)', 'Korps::ganti/$1');
    $routes->post('update', 'Korps::update');
    $routes->get('hapus/(:num)', 'Korps::hapus/$1');
});

// $routes->get('/korps', 'Korps::index');
// $routes->post('/korps', 'Korps::create');
// $routes->post('/korps', 'Korps::create');
// $routes->get('/korps/(:num)', 'Korps::show/$1');

// $routes->put('/korps/(:num)', 'Korps::update/$1');
// $routes->delete('/korps/(:num)', 'Korps::delete/$1');

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('/', function ($routes) {
    $routes->get('', 'Home::index');
    $routes->get('home', 'Home::index');
    $routes->get('home/logout', 'Home::logout');
});

$routes->group('contohajax', function ($routes) {
    $routes->get('', 'Contohajax::index');
    $routes->post('jumlah', 'Contohajax::jumlah');
    $routes->get('ajax_get', 'Contohajax::ajax_get');
});

$routes->group('login', function ($routes) {
    $routes->get('', 'Login::index');
    $routes->post('proses', 'Login::proses');
});

$routes->get('/contohsesi', 'Contohsesi::index');
$routes->get('/contohsesi/home', 'Contohsesi::home');

$routes->post('/contohsesi/login', 'Contohsesi::ceklogin');
$routes->get('/contohsesi/getdata', 'Contohsesi::ambildatasesi');
$routes->get('/contohsesi/hapussesi', 'Contohsesi::hapussesi');

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

$routes->group('satker', function ($routes) {
    $routes->get('', 'Satker::index');
    $routes->get('tambah', 'Satker::tambah');
    $routes->post('create', 'Satker::create');
    $routes->get('ganti/(:num)', 'Satker::ganti/$1');
    $routes->post('update', 'Satker::update');
    $routes->get('hapus/(:num)', 'Satker::hapus/$1');
});

$routes->group('personil', function ($routes) {
    $routes->get('', 'Personil::index');
    $routes->get('tambah', 'Personil::tambah');
    $routes->post('create', 'Personil::create');
    $routes->get('ganti/(:num)', 'Personil::ganti/$1');
    $routes->post('update', 'Personil::update');
    $routes->get('hapus/(:num)', 'Personil::hapus/$1');
});
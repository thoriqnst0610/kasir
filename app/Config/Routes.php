<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'LoginMiddleware']);
$routes->post('/login', 'Home::loginPost');
$routes->get('/logout', 'Home::logout');

$routes->get('/akun', 'Home::ambilAkun', ['filter' => 'LogoutMiddleware']);
$routes->post('/editAkun', 'Home::editAkun', ['filter' => 'LogoutMiddleware']);
$routes->post('/register', 'Home::registerPost', ['filter' => 'LogoutMiddleware']);

$routes->get('/dashboard', 'Home::dashboard',['filter' => 'LogoutMiddleware']);

$routes->get('/meja', 'MejaController::menampilkanData',['filter' => 'LogoutMiddleware']);
$routes->post('/tambahMeja', 'MejaController::menyimpanData',['filter' => 'LogoutMiddleware']);
$routes->post('/editMeja', 'MejaController::mengeditData',['filter' => 'LogoutMiddleware']);
$routes->post('/hapusMeja', 'MejaController::menghapusData',['filter' => 'LogoutMiddleware']);

$routes->get('/menu', 'MenuController::menampilkanData',['filter' => 'LogoutMiddleware']);
$routes->post('/tambahMenu', 'MenuController::menambahData',['filter' => 'LogoutMiddleware']);
$routes->post('/editMenu', 'MenuController::mengubahData',['filter' => 'LogoutMiddleware']);
$routes->post('/hapusMenu', 'MenuController::menghapusData',['filter' => 'LogoutMiddleware']);

$routes->get('/transaksi', 'TransaksiController::menampilkanData',['filter' => 'LogoutMiddleware']);
$routes->get('/transaksiBaru', 'TransaksiController::menghapusSemuaTransaksi',['filter' => 'LogoutMiddleware']);
$routes->get('/pesanan', 'TransaksiController::menampilkanTransaksi',['filter' => 'LogoutMiddleware']);
$routes->post('/tambahPesanan', 'TransaksiController::menambahTransaksi',['filter' => 'LogoutMiddleware']);
$routes->post('/cetakPesanan', 'TransaksiController::cetakPesanan',['filter' => 'LogoutMiddleware']);
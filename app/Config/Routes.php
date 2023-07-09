<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->get('login', 'Login::index');
$routes->get('/', 'Login::index');
$routes->get('/test', 'Admin\Home::getHarian');


// ROUTES TAMPILAN KASIR
$routes->get('kasir/menu_utama', 'Kasir\Home::index', ['filter' => 'AuthKasir']);
$routes->get('kasir/menu_utama/cek', 'Kasir\ProdukMenu::cek', ['filter' => 'AuthKasir']);
$routes->get('kasir/pembayaran', 'Kasir\Home::payment', ['filter' => 'AuthKasir']);
$routes->get('kasir/checkout', 'Kasir\Home::payment', ['filter' => 'AuthKasir']);
$routes->get('kasir/cek', 'Kasir\ProdukMenu::cek', ['filter' => 'AuthKasir']);
$routes->get('kasir/komplain', 'Kasir\Home::komplain', ['filter' => 'AuthKasir']);
$routes->get('kasir/tes', 'Kasir\Pembayaran::tes', ['filter' => 'AuthKasir']);



// $routes->get('kasir/login', 'Kasir\Home::login');

// ROUTES TAMPILAN ADMIN
$routes->get('admin', 'Admin\Home::index', ['filter' => 'AuthAdmin']);
$routes->get('admin/info-toko', 'Admin\Home::infoToko', ['filter' => 'AuthAdmin']);
$routes->get('admin/karyawan', 'Admin\Home::karyawan', ['filter' => 'AuthAdmin']);
$routes->get('admin/produk', 'Admin\Home::produk', ['filter' => 'AuthAdmin']);
$routes->get('admin/promo', 'Admin\Home::promo', ['filter' => 'AuthAdmin']);
$routes->get('admin/laporan', 'Admin\Home::laporan', ['filter' => 'AuthAdmin']);
$routes->get('admin/laporan/penjualan', 'Admin\Home::laporanPenjualan', ['filter' => 'AuthAdmin']);
$routes->get('admin/laporan/stok', 'Admin\Home::laporanStok', ['filter' => 'AuthAdmin']);
$routes->get('admin/komplain', 'Admin\Home::komplain', ['filter' => 'AuthAdmin']);
$routes->get('admin/kategori', 'Admin\Home::kategori', ['filter' => 'AuthAdmin']);
$routes->get('admin/restock', 'Admin\Home::restock', ['filter' => 'AuthAdmin']);
$routes->get('admin/download/laporan-penjualan', 'Admin\Home::downloadLaporanPenjualan', ['filter' => 'AuthAdmin']);



// ROUTES PROSES KASIR
$routes->POST('kasir/checkout', 'Kasir\Pembayaran::bayar', ['filter' => 'AuthKasir']);
$routes->get('kasir/keranjang/clear', 'Kasir\ProdukMenu::clear', ['filter' => 'AuthKasir']);
$routes->POST('kasir/keranjang/tambah', 'Kasir\ProdukMenu::add', ['filter' => 'AuthKasir']);
$routes->POST('kasir/pembayaran/bayar', 'Kasir\ProdukMenu::bayar', ['filter' => 'AuthKasir']);
$routes->POST('kasir/proses/tambah-komplain', 'Kasir\KomplainProses::tambah', ['filter' => 'AuthKasir']);
$routes->POST('kasir/promo/cek', 'Kasir\Pembayaran::cekPromo', ['filter' => 'AuthKasir']);

// ROUTES PROSES ADMIN
$routes->GET('admin/proses/detail-transaksi/(:num)', 'Admin\ProsesLaporan::detailTransaksi/$1', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/karyawan/tambah', 'Admin\ProsesKaryawan::tambah', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/karyawan/update', 'Admin\ProsesKaryawan::update', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/kategori/tambah', 'Admin\ProsesKategori::tambah', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/kategori/update', 'Admin\ProsesKategori::update', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/promo/tambah', 'Admin\ProsesPromo::tambah', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/promo/update', 'Admin\ProsesPromo::update', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/info-situs/update', 'Admin\ProsesInfoToko::update', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/info-situs/update-gambar', 'Admin\ProsesInfoToko::updateGambar', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/produk/tambah', 'Admin\ProsesProduk::tambah', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/produk/update', 'Admin\ProsesProduk::update', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/restock/tambah', 'Admin\ProsesRestock::tambah', ['filter' => 'AuthAdmin']);
$routes->POST('admin/proses/restock/delete', 'Admin\ProsesRestock::delete', ['filter' => 'AuthAdmin']);



// ROUTES PROSES LOGIN
$routes->POST('login/proses', 'LoginProcess::login');
$routes->GET('login/logout', 'LoginProcess::logout');

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
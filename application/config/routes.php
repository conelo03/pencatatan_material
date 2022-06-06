<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] 				= 'Login/proses';
$route['logout'] 				= 'Login/logout';
$route['dashboard']				= 'Dashboard';

//admin
$route['pegawai'] 				    = 'Pegawai';
$route['tambah-pegawai'] 	        = 'Pegawai/tambah';
$route['tambah-pegawai-modal'] 		= 'Pegawai/tambah_modal';
$route['edit-pegawai/(:any)'] 	    = 'Pegawai/edit/$1';
$route['hapus-pegawai/(:any)']    	= 'Pegawai/hapus/$1';
$route['profile'] 	       			= 'Pegawai/profile';
$route['setting']			   		= 'Pegawai/setting';

$route['kategori'] 				    = 'Kategori';
$route['tambah-kategori'] 	        = 'Kategori/tambah';
$route['edit-kategori/(:any)'] 	    = 'Kategori/edit/$1';
$route['hapus-kategori/(:any)']    	= 'Kategori/hapus/$1';

$route['item'] 				    = 'Item';
$route['stock-item'] 				    = 'Item/stock';
$route['tambah-item'] 	        = 'Item/tambah';
$route['edit-item/(:any)'] 	    = 'Item/edit/$1';
$route['hapus-item/(:any)']    	= 'Item/hapus/$1';
$route['barcode/(:any)'] 		= 'Item/barcode/$1';
$route['barcode-stock/(:any)'] 		= 'Item/barcode_stock/$1';

$route['barang-masuk']					= 'Item/barang_masuk';
$route['tambah-barang-masuk']			= 'Item/tambah_barang_masuk';
$route['detail-barang-masuk/(:any)']			= 'Item/detail_barang_masuk/$1';
$route['edit-barang-masuk/(:any)']			= 'Item/edit_barang_masuk/$1';
$route['hapus-barang-masuk/(:any)/(:any)']			= 'Item/hapus_barang_masuk/$1/$2';
$route['approve-barang-masuk/(:any)/(:any)']			= 'Item/approve_barang_masuk/$1/$2';

$route['barang-keluar']					= 'Item/barang_keluar';
$route['tambah-barang-keluar']			= 'Item/tambah_barang_keluar';
$route['detail-barang-keluar/(:any)']			= 'Item/detail_barang_keluar/$1';
$route['edit-barang-keluar/(:any)']			= 'Item/edit_barang_keluar/$1';
$route['hapus-barang-keluar/(:any)/(:any)']			= 'Item/hapus_barang_keluar/$1/$2';
$route['approve-barang-keluar/(:any)/(:any)']			= 'Item/approve_barang_keluar/$1/$2';

$route['maintenance-hardware'] 				    = 'Maintenance';
$route['tambah-maintenance-hardware'] 	        = 'Maintenance/tambah';
$route['edit-maintenance-hardware/(:any)'] 	    = 'Maintenance/edit/$1';
$route['hapus-maintenance-hardware/(:any)']    	= 'Maintenance/hapus/$1';
$route['repair-maintenance-hardware/(:any)'] 		= 'Maintenance/repair/$1';

$route['laporan-barang-masuk']					= 'Laporan/barang_masuk';
$route['laporan-barang-keluar']					= 'Laporan/barang_keluar';
$route['laporan-maintenance-hardware'] 				    = 'Laporan/maintenance';
$route['cetak-barang-masuk']					= 'Laporan/cetak_barang_masuk';
$route['cetak-barang-keluar']					= 'Laporan/cetak_barang_keluar';
$route['cetak-maintenance-hardware'] 				    = 'Laporan/cetak_maintenance';

$route['permintaan-barang'] 				    = 'Permintaan_barang';
$route['tambah-permintaan-barang'] 	        = 'Permintaan_barang/tambah';
$route['edit-permintaan-barang/(:any)'] 	    = 'Permintaan_barang/edit/$1';
$route['hapus-permintaan-barang/(:any)']    	= 'Permintaan_barang/hapus/$1';
$route['verifikasi-permintaan-barang/(:any)'] 		= 'Permintaan_barang/verifikasi/$1';
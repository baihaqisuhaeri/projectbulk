<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

$route['input-customer'] = 'Input';
$route['data-customer'] = 'Data';
$route['input-kontrak'] = 'Kontrak';
$route['masuk'] = 'Login';
$route['keluar'] = 'Input/keluar';

$route['input-customer/tambah-customer'] = 'Input/input_customer';
$route['input-customer/nama-unit'] = 'Input/get_nama_unit';
$route['input-customer/unit'] = 'Input/get_unit';
$route['data-customer/tabel'] = 'Data/ajax_list';
$route['data-customer/data-pengguna/(:any)'] = 'Data/get_data_customer/$1';
$route['data-customer/ubah-customer'] = 'Data/edit_customer';
$route['data-customer/unit'] = 'Data/get_unit';
$route['data-customer/ubah-status'] = 'Data/status';
$route['pengaturan'] = 'Edp';
$route['input-kontrak/tabel-kontrak'] = 'Kontrak/ajax_list';
$route['input-kontrak/tambah-kontrak'] = 'Kontrak/input_kontrak';
$route['input-kontrak/data-kontrak/(:any)'] = 'Kontrak/get_data_kontrak/$1';
$route['input-kontrak/hapus-kontrak/(:any)'] = 'Kontrak/hapus_data_kontrak/$1';
$route['input-kontrak/selesai'] = 'Kontrak/cek_selesai';
$route['input-kontrak/unit'] = 'Kontrak/get_unit';
$route['input-kontrak/get-customer'] = 'Kontrak/get_customer';
$route['input-kontrak/customer/(:any)/(:any)'] = 'Kontrak/get_cus/$1/$k';


$route['barang'] = 'Barang';
$route['barang/tabel-barang'] = 'Barang/ajax_list';
$route['barang/tambah-barang'] = 'Barang/tambahBarang';
$route['barang/unit-barang'] = 'Barang/get_unit_barang';
$route['barang/hapus-barang'] = 'Barang/hapus_barang';
$route['barang/edit-barang'] = 'Barang/edit_barang';




$route['mobil'] = 'Mobil';
$route['mobil/tambah-mobil'] = 'Mobil/tambahMobil';
$route['mobil/tabel-mobil'] = 'Mobil/ajax_list';
$route['mobil/hapus-mobil'] = 'Mobil/hapus_mobil';
$route['mobil/edit-mobil'] = 'Mobil/edit_mobil';



$route['supir'] = 'Supir';
$route['supir/tambah-supir'] = 'Supir/tambahSupir';
$route['supir/tabel-supir'] = 'Supir/ajax_list';
$route['supir/hapus-supir'] = 'Supir/hapus_supir';
$route['supir/edit-supir'] = 'Supir/edit_supir';
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
$route['mobil/unit-mobil'] = 'Mobil/get_unit_mobil';
$route['mobil/supir'] = 'Mobil/get_supir';



$route['supir'] = 'Supir';
$route['supir/tambah-supir'] = 'Supir/tambahSupir';
$route['supir/tabel-supir'] = 'Supir/ajax_list';
$route['supir/hapus-supir'] = 'Supir/hapus_supir';
$route['supir/edit-supir'] = 'Supir/edit_supir';
$route['supir/unit-supir'] = 'Supir/get_unit_supir';



$route['cabang'] = 'Cabang';
$route['cabang/tambah-cabang'] = 'Cabang/tambahCabang';
$route['cabang/tabel-cabang'] = 'Cabang/ajax_list';
$route['cabang/hapus-cabang'] = 'Cabang/hapus_cabang';
$route['cabang/edit-cabang'] = 'Cabang/edit_cabang';

$route['input-sj'] = 'Input_sj';
$route['input-sj/tabel-sj'] = 'Input_sj/ajax_list';
$route['input-sj/hapus-sj'] = 'Input_sj/hapus_sj';
$route['input-sj/edit-sj'] = 'Input_sj/edit_sj';
$route['input-sj/unit-sj'] = 'Input_sj/get_unit_sj';
$route['input-sj/customer'] = 'Input_sj/get_customer';
$route['input-sj/tabel-alamat-kirim'] = 'Input_sj/get_alamat_kirim';
$route['input-sj/get-nama-customer'] = 'Input_sj/get_nama_customer';
$route['input-sj/tambah-alamat-baru'] = 'Input_sj/tambah_alamat_baru';
$route['input-sj/get-no-spm'] = 'Input_sj/get_no_spm';
$route['input-sj/get-volume-spm'] = 'Input_sj/get_volume_spm';
$route['input-sj/get-mobil-sj'] = 'Input_sj/get_mobil_sj';
$route['input-sj/get-supir-sj'] = 'Input_sj/get_supir_sj';
$route['input-sj/get-barang-sj'] = 'Input_sj/get_barang_sj';
$route['input-sj/get-unit-marketing'] = 'Input_sj/get_unit_marketing';
$route['input-sj/get-kg-barang'] = 'Input_sj/get_kg_barang';
$route['input-sj/get-suplier'] = 'Input_sj/get_suplier';
$route['input-sj/get-ppn'] = 'Input_sj/get_ppn';
$route['input-sj/get-data-spm'] = 'Input_sj/get_data_spm';
$route['input-sj/tambah-sj'] = 'Input_sj/tambah_sj';
$route['input-sj/get-unit-sj-edit'] = 'Input_sj/get_unit_sj';
$route['input-sj/get-sj'] = 'Input_sj/get_sj';
$route['input-sj/get-supplier-by-no-sj'] = 'Input_sj/get_supplier_by_no_sj';
$route['input-sj/hapus-alamat-kirim'] = 'Input_sj/hapus_alamat_kirim';
$route['input-sj/edit-alamat-kirim'] = 'Input_sj/edit_alamat_kirim';
$route['input-sj/cetak'] = 'Cetak/print';
$route['input-sj/get-bulan-aktif'] = 'Input_sj/get_bulan_aktif';
$route['input-sj/get-bulan-aktif-sj'] = 'Input_sj/get_bulan_aktif_sj';
$route['input-sj/batal-sj'] = 'Input_sj/batal_sj';
$route['input-sj/tgl-aktif'] = 'Input_sj/get_tgl_aktif';
$route['input-sj/set-no-jalan'] = 'Input_sj/set_no_jalan';





$route['utility'] = 'Utility';
$route['utility/unit'] = 'Utility/get_unit';
$route['utility/get-bulan-aktif'] = 'Utility/get_bulan_aktif';
$route['utility/tutup-bulan'] = 'Utility/tutup_bulan';


$route['realisasi-sj'] = 'Realisasi_sj';
$route['realisasi-sj/tabel-sj'] = 'Realisasi_sj/ajax_list';
$route['realisasi-sj/hapus-sj'] = 'Realisasi_sj/hapus_sj';
$route['realisasi-sj/edit-sj'] = 'Realisasi_sj/edit_realisasi_sj';
$route['realisasi-sj/unit-sj'] = 'Realisasi_sj/get_unit_sj';
$route['realisasi-sj/customer'] = 'Realisasi_sj/get_customer';
$route['realisasi-sj/tabel-alamat-kirim'] = 'Realisasi_sj/get_alamat_kirim';
$route['realisasi-sj/get-nama-customer'] = 'Realisasi_sj/get_nama_customer';
$route['realisasi-sj/tambah-alamat-baru'] = 'Realisasi_sj/tambah_alamat_baru';
$route['realisasi-sj/get-no-spm'] = 'Realisasi_sj/get_no_spm';
$route['realisasi-sj/get-volume-spm'] = 'Realisasi_sj/get_volume_spm';
$route['realisasi-sj/get-mobil-sj'] = 'Realisasi_sj/get_mobil_sj';
$route['realisasi-sj/get-supir-sj'] = 'Realisasi_sj/get_supir_sj';
$route['realisasi-sj/get-barang-sj'] = 'Realisasi_sj/get_barang_sj';
$route['realisasi-sj/get-unit-marketing'] = 'Realisasi_sj/get_unit_marketing';
$route['realisasi-sj/get-kg-barang'] = 'Realisasi_sj/get_kg_barang';
$route['realisasi-sj/get-suplier'] = 'Realisasi_sj/get_suplier';
$route['realisasi-sj/get-ppn'] = 'Realisasi_sj/get_ppn';
$route['realisasi-sj/get-data-spm'] = 'Realisasi_sj/get_data_spm';
$route['realisasi-sj/get-unit-sj-edit'] = 'Realisasi_sj/get_unit_sj';
$route['realisasi-sj/get-sj'] = 'Realisasi_sj/get_sj';
$route['realisasi-sj/get-supplier-by-no-sj'] = 'Realisasi_sj/get_supplier_by_no_sj';
$route['realisasi-sj/hapus-alamat-kirim'] = 'Realisasi_sj/hapus_alamat_kirim';
$route['realisasi-sj/edit-alamat-kirim'] = 'Realisasi_sj/edit_alamat_kirim';
$route['realisasi-sj/get-bulan-aktif'] = 'Realisasi_sj/get_bulan_aktif';
$route['realisasi-sj/get-bulan-aktif-sj'] = 'Realisasi_sj/get_bulan_aktif_sj';
$route['realisasi-sj/realisasi-sj'] = 'Realisasi_sj/realisasi_sj';
$route['realisasi-sj/batal-sj'] = 'Realisasi_sj/batal_sj';




$route['verifikasi-sj'] = 'Verifikasi_sj';
$route['verifikasi-sj/tabel-sj'] = 'Verifikasi_sj/ajax_list';
$route['verifikasi-sj/hapus-sj'] = 'Verifikasi_sj/hapus_sj';
$route['verifikasi-sj/edit-verifikasi-sj'] = 'Verifikasi_sj/edit_verifikasi_sj';
$route['verifikasi-sj/unit-sj'] = 'Verifikasi_sj/get_unit_sj';
$route['verifikasi-sj/customer'] = 'Verifikasi_sj/get_customer';
$route['verifikasi-sj/tabel-alamat-kirim'] = 'Verifikasi_sj/get_alamat_kirim';
$route['verifikasi-sj/get-nama-customer'] = 'Verifikasi_sj/get_nama_customer';
$route['verifikasi-sj/tambah-alamat-baru'] = 'Verifikasi_sj/tambah_alamat_baru';
$route['verifikasi-sj/get-no-spm'] = 'Verifikasi_sj/get_no_spm';
$route['verifikasi-sj/get-volume-spm'] = 'Verifikasi_sj/get_volume_spm';
$route['verifikasi-sj/get-mobil-sj'] = 'Verifikasi_sj/get_mobil_sj';
$route['verifikasi-sj/get-supir-sj'] = 'Verifikasi_sj/get_supir_sj';
$route['verifikasi-sj/get-barang-sj'] = 'Verifikasi_sj/get_barang_sj';
$route['verifikasi-sj/get-unit-marketing'] = 'Verifikasi_sj/get_unit_marketing';
$route['verifikasi-sj/get-kg-barang'] = 'Verifikasi_sj/get_kg_barang';
$route['verifikasi-sj/get-suplier'] = 'Verifikasi_sj/get_suplier';
$route['verifikasi-sj/get-ppn'] = 'Verifikasi_sj/get_ppn';
$route['verifikasi-sj/get-data-spm'] = 'Verifikasi_sj/get_data_spm';
$route['verifikasi-sj/get-unit-sj-edit'] = 'Verifikasi_sj/get_unit_sj';
$route['verifikasi-sj/get-sj'] = 'Verifikasi_sj/get_sj';
$route['verifikasi-sj/get-supplier-by-no-sj'] = 'Verifikasi_sj/get_supplier_by_no_sj';
$route['verifikasi-sj/hapus-alamat-kirim'] = 'Verifikasi_sj/hapus_alamat_kirim';
$route['verifikasi-sj/edit-alamat-kirim'] = 'Verifikasi_sj/edit_alamat_kirim';
$route['verifikasi-sj/get-bulan-aktif'] = 'Verifikasi_sj/get_bulan_aktif';
$route['verifikasi-sj/get-bulan-aktif-sj'] = 'Verifikasi_sj/get_bulan_aktif_sj';
$route['verifikasi-sj/verifikasi-sj'] = 'Verifikasi_sj/verifikasi_sj';
$route['verifikasi-sj/get-harga-barang'] = 'Verifikasi_sj/get_barang_verifikasi';
$route['verifikasi-sj/batal-sj'] = 'Verifikasi_sj/batal_sj';




$route['permohonan-kwitansi'] = 'Permohonan_kwitansi';
$route['permohonan-kwitansi/customer'] = 'Permohonan_kwitansi/get_customer';
$route['permohonan-kwitansi/get-nama-customer'] = 'Permohonan_kwitansi/get_nama_customer';
$route['permohonan-kwitansi/get-sj-detail'] = 'Permohonan_kwitansi/get_sj_detail';
$route['permohonan-kwitansi/get-sj-detail-pilih'] = 'Permohonan_kwitansi/get_sj_detail_pilih';
$route['permohonan-kwitansi/validasi-alamat-kirim'] = 'Permohonan_kwitansi/validasi_alamat_kirim';


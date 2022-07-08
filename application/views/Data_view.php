<!DOCTYPE html>
<html lang="en">
    
    <?php $this->load->view('material/Head_view');?>

    <body class="hold-transition sidebar-mini sidebar-collapse">
        <div class="wrapper">
            
            <?php $this->load->view('material/Navbar_view');?>

            <?php $this->load->view('material/Sidebar_view');?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Data Customer</h1>
                            </div><!-- /.col -->
                            <!--<div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="halaman-utama">Halaman Utama</a></li>
                                    <li class="breadcrumb-item active">Input Customer</li>
                                </ol>
                            </div>--><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Info boxes -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Customer<hr><span style="color: green;">*Customer non aktif</span></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="tabel" class="table table-bordered table-striped" style="font-size: 10pt;" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th></th>
                                                    <th>Status</th>
                                                    <th>Unit</th>
                                                    <th>Kode Customer</th>
                                                    <th>Nama Customer</th>
                                                    <th>Piutang</th>
                                                    <th>Alamat Customer</th>
                                                    <th>Alamat Pengiriman</th>
                                                    <th>Alamat FP</th>
                                                    <th>No NPWP</th>
                                                    <th>KTP Pemilik</th>
                                                    <th>No Telp</th>
                                                    <th>No HP Pemilik</th>
                                                    <th>Kontak Person</th>
                                                    <th>Jabatan Kontak Person</th>
                                                    <th>Credit Term</th>
                                                    <th>Cara Pembayaran</th>
                                                    <th>Nilai Plafon</th>
                                                    <th>Status Blacklist</th>
                                                    <th>Kode Jatra</th>
                                                    <th>Kode Grup</th>
                                                    <th>TTK</th>
                                                    <th>Kelompok Customer</th>
                                                    <th>Nama Unit</th>
                                                    <th>Jenis Produk</th>
                                                    <th>Cabang</th>
                                                    <th>Wilayah Customer</th>
                                                    <th>Akta Pendirian PT</th>
                                                    <th>Tgl Akta Pendirian PT</th>
                                                    <th>NIB</th>
                                                    <th>Tgl NIB</th>
                                                    <th>SK Kemenhumkam</th>
                                                    <th>Nama Direksi</th>
                                                    <th>Merk Dagang</th>
                                                    <th>Kebutuhan Volume</th>
                                                    <th>No Rekening Perusahaan</th>
                                                    <th>Nama Bank Rekening Perusahaan</th>
                                                    <th>Web Perusahaan</th>
                                                    <th>Tgl Customer Bergabung</th>
                                                    <th>Pakta Integritas</th>
                                                    <th>Akta Pengurus Terbaru</th>
                                                    <th>Tgl Periode Pengurus Terbaru</th>
                                                    <th>Menggunakan Kontrak</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        
                    </div>
                    
                    <!--Modal-->
                    <div class="modal fade" id="modal_status">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form id="form_status">
                                        <input class="form-control" type="hidden" name="id_status" id="id_status">
                                        <select class="form-control select2" id="status" name="status">
                                            <option value="aktif">Aktif</option>
                                            <option value="non aktif">Non Aktif</option>
                                        </select>
                                    </form>
                                    <br>
                                    <div class="form-group text-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="Ubah_status()" id="btn_status">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    
                    <div class="modal fade" id="modal_konfirmasi">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5>Apa Anda sudah yakin?</h5>
                                    <div class="form-group text-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="input()" id="btn_konfirmasi">Ya</button>
                                    </div>                                    
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    
                    <div class="modal fade" id="modal_edit">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Data Customer</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form id="form_customer">
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Tipe Customer<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" id="tipe_cus" name="tipe_cus">
                                                        <option value="*">Prospek</option>
                                                        <option value="-">Join</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" name="tipe_cus_c" id="tipe_cus_c">
                                                    <span class="text-danger" id="error_tipe_cus"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Unit<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" id="unit" name="unit">
                                                    </select>
                                                    <input class="form-control" type="hidden" name="unit_c" id="unit_c">
                                                    <span class="text-danger" id="error_unit"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Nama Unit<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="nama_unit" id="nama_unit">
                                                    <input class="form-control" type="hidden" name="nama_unit_c" id="nama_unit_c">
                                                    <span class="text-danger" id="error_nama_unit"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Jenis Produk<span id="wajib_jenis_produk"></span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" id="jenis_produk" name="jenis_produk">
                                                        <option value="">Jenis Produk</option>
                                                        <option value="ASPAL">ASPAL</option>
                                                        <option value="TABUNG">TABUNG</option>
                                                        <option value="BULK">BULK</option>
                                                        <option value="ALAT BERAT">ALAT BERAT</option>
                                                        <option value="SPPBE">SPPBE</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" name="jenis_produk_c" id="jenis_produk_c">
                                                    <span class="text-danger" id="error_jenis_produk"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Nama Customer<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="nama_customer" id="nama_customer">
                                                    <input class="form-control" type="hidden" name="nama_customer_c" id="nama_customer_c">
                                                    <span class="text-danger" id="error_nama_customer"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Alamat FP<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="alamat_fp1" id="alamat_fp1">
                                                    <input class="form-control" type="text" name="alamat_fp2" id="alamat_fp2">
                                                    <input class="form-control" type="text" name="alamat_fp3" id="alamat_fp3">
                                                    <input class="form-control" type="hidden" name="alamat_fp_c" id="alamat_fp_c">
                                                    <span class="text-danger" id="error_alamat_fp"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Alamat Customer<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="alamat_customer" id="alamat_customer">
                                                    <input class="form-control" type="hidden" name="alamat_customer_c" id="alamat_customer_c">
                                                    <span class="text-danger" id="error_alamat_customer"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Alamat Pengiriman<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="alamat_pengiriman" id="alamat_pengiriman">
                                                    <input class="form-control" type="hidden" name="alamat_pengiriman_c" id="alamat_pengiriman_c">
                                                    <span class="text-danger" id="error_alamat_pengiriman"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">No NPWP Badan<span id="wajib_npwp"></span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="npwp" id="npwp">
                                                    <input class="form-control" type="hidden" name="npwp_c" id="npwp_c">
                                                    <span class="text-danger" id="error_npwp"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">KTP Pemilik</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="ktp_pemilik" id="ktp_pemilik">
                                                    <input class="form-control" type="hidden" name="ktp_pemilik_c" id="ktp_pemilik_c">
                                                    <span class="text-danger" id="error_ktp_pemilik"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">No Telp<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="no_telp" id="no_telp">
                                                    <input class="form-control" type="hidden" name="no_telp_c" id="no_telp_c">
                                                    <span class="text-danger" id="error_no_telp"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">No HP Pemilik</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="no_hp_pemilik" id="no_hp_pemilik">
                                                    <input class="form-control" type="hidden" name="no_hp_pemilik_c" id="no_hp_pemilik_c">
                                                    <span class="text-danger" id="error_no_hp_pemilik"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Kontak Person<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="kontak_person" id="kontak_person">
                                                    <input class="form-control" type="hidden" name="kontak_person_c" id="kontak_person_c">
                                                    <span class="text-danger" id="error_kontak_person"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Jabatan Kontak Person</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="jabatan_kontak_person" id="jabatan_kontak_person">
                                                    <input class="form-control" type="text" name="jabatan_kontak_person_c" id="jabatan_kontak_person_c">
                                                    <span class="text-danger" id="error_jabatan_kontak_person"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Credit Term</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="credit_term" id="credit_term">
                                                    <input class="form-control" type="hidden" name="credit_term_c" id="credit_term_c">
                                                    <span class="text-danger" id="error_credit_term"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Cara Pembayaran<span id="wajib_cara_pembayaran"></span></label>
                                                <div class="col-sm-9">
                                                    <div class="radio">
                                                        <input type="radio" name="cara_pembayaran" id="cara_pembayaran" value="T">
                                                        <label>Tunai</label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" name="cara_pembayaran" id="cara_pembayaran" value="K">
                                                        <label>Kredit</label>
                                                    </div>
                                                    <input class="form-control" type="hidden" name="cara_pembayaran_c" id="cara_pembayaran_c">
                                                    <span class="text-danger" id="error_cara_pembayaran"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Nilai Plafon</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control autonumber" type="text" name="nilai_plafon" id="nilai_plafon">
                                                    <input class="form-control" type="hidden" name="nilai_plafon_c" id="nilai_plafon_c">
                                                    <span class="text-danger" id="error_nilai_plafon"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Status Blacklist<span id="wajib_status_blacklist"></span></label>
                                                <div class="col-sm-9">
                                                    <div class="radio">
                                                        <input type="radio" name="status_blacklist" id="status_blacklist" value="BLOCK">
                                                        <label>Blaclist</label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" name="status_blacklist" id="status_blacklist" value="UNBLOCK">
                                                        <label>Non Blacklist</label>
                                                    </div>
                                                    <input class="form-control" type="hidden" name="status_blacklist_c" id="status_blacklist_c">
                                                    <span class="text-danger" id="error_status_blacklist"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Kode Jatra<span id="wajib_kode_global"></span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="kode_global" id="kode_global">
                                                    <input class="form-control" type="hidden" name="kode_global_c" id="kode_global_c">
                                                    <span class="text-danger" id="error_kode_global"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Kode Grup Customer<span id="wajib_kode_grup_customer"></span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="kode_grup_customer" id="kode_grup_customer">
                                                    <input class="form-control" type="hidden" name="kode_grup_customer_c" id="kode_grup_customer_c">
                                                    <span class="text-danger" id="error_kode_grup_customer"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Menggunakan TTK<span id="wajib_ttk"></span></label>
                                                <div class="col-sm-9">
                                                    <div class="radio">
                                                        <input type="radio" name="ttk" id="ttk" value="YA">
                                                        <label>Ya</label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" name="ttk" id="ttk" value="TIDAK">
                                                        <label>Tidak</label>
                                                    </div>
                                                    <input class="form-control" type="hidden" name="ttk_c" id="ttk_c">
                                                    <span class="text-danger" id="error_ttk"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Kelompok Customer</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="kelompok_customer" id="kelompok_customer">
                                                    <input class="form-control" type="hidden" name="kelompok_customer_c" id="kelompok_customer_c">
                                                    <span class="text-danger" id="error_kelompok_customer"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Cabang</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="cabang" id="cabang">
                                                    <input class="form-control" type="hidden" name="cabang_c" id="cabang_c">
                                                    <span class="text-danger" id="error_cabang"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Wilayah Customer</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="wilayah_customer" id="wilayah_customer">
                                                    <input class="form-control" type="hidden" name="wilayah_customer_c" id="wilayah_customer_c">
                                                    <span class="text-danger" id="error_wilayah_customer"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Akta Pendirian PT</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="akta_pt" id="akta_pt">
                                                    <input class="form-control" type="hidden" name="akta_pt_c" id="akta_pt_c">
                                                    <span class="text-danger" id="error_akta_pt"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Tgl Akta Pendirian PT</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="tgl_akta_pendirian_pt" id="tgl_akta_pendirian_pt">
                                                    <input class="form-control" type="hidden" name="tgl_akta_pendirian_pt_c" id="tgl_akta_pendirian_pt_c">
                                                    <span class="text-danger" id="error_tgl_akta_pendirian_pt"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">No Induk Berusaha</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="nib" id="nib">
                                                    <input class="form-control" type="hidden" name="nib_c" id="nib_c">
                                                    <span class="text-danger" id="error_nib"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Tanggal NIB</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="tgl_nib" id="tgl_nib">
                                                    <input class="form-control" type="hidden" name="tgl_nib_c" id="tgl_nib_c">
                                                    <span class="text-danger" id="error_tgl_nib"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">SK Kemenhumkam</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="sk_kemenhumkam" id="sk_kemenhumkam">
                                                    <input class="form-control" type="hidden" name="sk_kemenhumkam_c" id="sk_kemenhumkam_c">
                                                    <span class="text-danger" id="error_sk_kemenhumkam"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Nama Direksi Perusahaan</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="nama_direksi" id="nama_direksi">
                                                    <input class="form-control" type="hidden" name="nama_direksi_c" id="nama_direksi_c">
                                                    <span class="text-danger" id="error_nama_direksi"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Merk Dagang</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="merk_dagang" id="merk_dagang">
                                                    <input class="form-control" type="hidden" name="merk_dagang_c" id="merk_dagang_c">
                                                    <span class="text-danger" id="error_merk_dagang"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Kebutuhan Volume</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control autonumber" type="text" name="kebutuhan_volume" id="kebutuhan_volume">
                                                    <input class="form-control" type="hidden" name="kebutuhan_volume_c" id="kebutuhan_volume_c">
                                                    <span class="text-danger" id="error_kebutuhan_volume"></span>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select class="form-control select2" id="satuan_volume" name="satuan_volume">
                                                        <option value="KG">Kg</option>
                                                        <option value="Liter">Liter</option>
                                                        <!--<option value="Ton">Ton</option>-->
                                                        <option value="Drum">Drum</option>
                                                        <option value="Bag">Bag</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" name="satuan_volume_c" id="satuan_volume_c">
                                                    <span class="text-danger" id="error_satuan_volume"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">No Rekening Perusahaan</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="norek_perusahaan" id="norek_perusahaan">
                                                    <input class="form-control" type="hidden" name="norek_perusahaan_c" id="norek_perusahaan_c">
                                                    <span class="text-danger" id="error_norek_perusahaan"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Nama Bank Rekening Perusahaan</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="nama_bank_rekening" id="nama_bank_rekening">
                                                    <input class="form-control" type="hidden" name="nama_bank_rekening_c" id="nama_bank_rekening_c">
                                                    <span class="text-danger" id="error_nama_bank_rekening"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Website Perusahaan</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="web_perusahaan" id="web_perusahaan">
                                                    <input class="form-control" type="hidden" name="web_perusahaan_c" id="web_perusahaan_c">
                                                    <span class="text-danger" id="error_web_perusahaan"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Tgl Customer Bergabung</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="cus_gabung" id="cus_gabung">
                                                    <input class="form-control" type="hidden" name="cus_gabung_c" id="cus_gabung_c">
                                                    <span class="text-danger" id="error_cus_gabung"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Pakta Integritas</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" id="pakta" name="pakta">
                                                        <option value="">Pilih status pakta integritas</option>
                                                        <option value="Ada">Ada</option>
                                                        <option value="Tidak">Tidak</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" name="pakta_c" id="pakta_c">
                                                    <span class="text-danger" id="error_pakta"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Akta Pengurus Terbaru</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="akta_pengurus" id="akta_pengurus">
                                                    <input class="form-control" type="hidden" name="akta_pengurus_c" id="akta_pengurus_c">
                                                    <span class="text-danger" id="error_akta_pengurus"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Tgl Periode Pengurus Terbaru</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="tgl_pengurus" id="tgl_pengurus">
                                                    <input class="form-control" type="hidden" name="tgl_pengurus_c" id="tgl_pengurus_c">
                                                    <span class="text-danger" id="error_tgl_pengurus"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Menggunakan Kontrak</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" id="guna_kon" name="guna_kon">
                                                        <option value="">Pilih status penggunaan kontrak</option>
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak">Tidak</option>
                                                    </select>
                                                    <input class="form-control" type="hidden" name="guna_kon_c" id="guna_kon_c">
                                                    <span class="text-danger" id="error_guna_kon"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Keterangan</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" placeholder="Berikan keterangan Anda di sini" type="text" name="keterangan" id="keterangan"></textarea>
                                                    <span class="text-danger" id="error_keterangan"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="hidden" name="id" id="id">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_simpan_pengguna">Simpan</button>
                                        </div>

                                    </form>
                                        
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--End Modal-->
                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
              <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <?php $this->load->view('material/Footer_view');?>
            
        </div>
        <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    
        <!-- jQuery -->
        <?php $this->load->view('material/Jquery_view');?>
        <script type="text/javascript">
            
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
              theme: 'bootstrap4'
            });
            
            //datatables
            $('#tabel').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "responsive": true,
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('data-customer/tabel')?>",
                    "type": "POST",
                    "data": function ( data ) {
                        data.unit = "";
                    }
                },

                //Set column definition initialisation properties.
                "columnDefs": [
                { 
                    "targets": '_all',//[ 0,1,2,3,4,5,6,7,8,9,10,11 ], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                ],

            });
            
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 7000
            });
            
            $("#tipe_cus").on("change", function(e){
                var tipe = $("#tipe_cus").val();
                
                if(tipe == "*"){
                    $("#wajib_jenis_produk").html('');
                    $("#wajib_npwp").html('');
                    $("#wajib_cara_pembayaran").html('');
                    $("#wajib_status_blacklist").html('');
                    $("#wajib_kode_global").html('');
                    $("#wajib_kode_grup_customer").html('');
                    $("#wajib_ttk").html('');
                }else{
                    $("#wajib_jenis_produk").html('<span style="color: red;">*</span>');
                    $("#wajib_npwp").html('<span style="color: red;">*</span>');
                    $("#wajib_cara_pembayaran").html('<span style="color: red;">*</span>');
                    $("#wajib_status_blacklist").html('<span style="color: red;">*</span>');
                    $("#wajib_kode_global").html('<span style="color: red;">*</span>');
                    $("#wajib_kode_grup_customer").html('<span style="color: red;">*</span>');
                    $("#wajib_ttk").html('<span style="color: red;">*</span>');
                }
            });
            
            function Ubah_status(){

                $('#modal_status').modal('hide');

                // ambil data form dengan serialize
                var dataform = $("#form_status").serialize();
                //alert(dataform);

               $.ajax({
                    url: "<?php echo base_url('data-customer/ubah-status')?>",
                    type: "post",
                    data: dataform,
                    success: function(result) {
                        var hasil = JSON.parse(result);
                        if (hasil.hasil == "sukses_tambah") {

                            Toast.fire({
                                icon: 'success',
                                title: 'Berhasil mengubah status'
                            })

                            $("#id_status").val("");
                            $("#status").val("");

                            $('#tabel').DataTable().ajax.reload();

                        }else{

                            Toast.fire({
                                icon: 'error',
                                title: 'Tidak bisa di non aktifkan, karena masih ada piutang'
                            })

                            $("#id_status").val("");
                            $("#status").val("");

                            $('#tabel').DataTable().ajax.reload();

                        }
                    }
                });

            }
            
            function ubah_status(id){

                $('#id_status').val(id);
                $('#modal_status').modal('show');

            }
            
            get_unit();
        
            function get_unit(){
                $.ajax({
                    url: 'data-customer/unit',
                    success: function(data) {
                        $('#unit').html(data);
                    },
                });
            }
            
            function edit(id){
            
                $("#tipe_cus_c").val("");
                $("#unit_c").val("");
                $("#nama_unit_c").val("");
                $("#jenis_produk_c").val("");
                $("#nama_customer_c").val("");
                $("#alamat_fp_c").val("");
                $("#alamat_customer_c").val("");
                $("#alamat_pengiriman_c").val("");
                $("#npwp_c").val("");
                $("#ktp_pemilik_c").val("");
                $("#no_telp_c").val("");
                $("#no_hp_pemilik_c").val("");
                $("#kontak_person_c").val("");
                $("#jabatan_kontak_person_c").val("");
                $("#credit_term_c").val("");
                $("#cara_pembayaran_c").val("");
                $("#nilai_plafon_c").val("");
                $("#status_blacklist_c").val("");
                $("#kode_global_c").val("");
                $("#kode_grup_customer_c").val("");
                $("#ttk_c").val("");
                $("#kelompok_customer_c").val("");
                $("#cabang_c").val("");
                $("#wilayah_customer_c").val("");
                $("#akta_pt_c").val("");
                $("#tgl_akta_pendirian_pt_c").val("");
                $("#nib_c").val("");
                $("#tgl_nib_c").val("");
                $("#sk_kemenhumkam_c").val("");
                $("#nama_direksi_c").val("");
                $("#merk_dagang_c").val("");
                $("#kebutuhan_volume_c").val("");
                $("#satuan_volume_c").val("");
                $("#norek_perusahaan_c").val("");
                $("#nama_bank_rekening_c").val("");
                $("#web_perusahaan_c").val("");
                $("#cus_gabung_c").val("");
                $("#pakta_c").val("");
                $("#akta_pengurus_c").val("");
                $("#tgl_pengurus_c").val("");
                $("#guna_kon_c").val("");
            
                $("#tipe_cus").prop("disabled", false);
                $("#unit").prop("disabled", false);
                $("#nama_unit").prop("disabled", false);
                $("#jenis_produk").prop("disabled", false);
                $("#nama_customer").prop("disabled", false);
                $("#alamat_fp").prop("disabled", false);
                $("#alamat_customer").prop("disabled", false);
                $("#alamat_pengiriman").prop("disabled", false);
                $("#npwp").prop("disabled", false);
                $("#ktp_pemilik").prop("disabled", false);
                $("#no_telp").prop("disabled", false);
                $("#no_hp_pemilik").prop("disabled", false);
                $("#kontak_person").prop("disabled", false);
                $("#jabatan_kontak_person").prop("disabled", false);
                $("#credit_term").prop("disabled", false);
                $("#cara_pembayaran").prop("disabled", false);
                $("#nilai_plafon").prop("disabled", false);
                $("#status_blacklist").prop("disabled", false);
                $("#kode_global").prop("disabled", false);
                $("#kode_grup_customer").prop("disabled", false);
                $("#ttk").prop("disabled", false);
                $("#kelompok_customer").prop("disabled", false);
                $("#cabang").prop("disabled", false);
                $("#wilayah_customer").prop("disabled", false);
                $("#akta_pt").prop("disabled", false);
                $("#tgl_akta_pendirian_pt").prop("disabled", false);
                $("#nib").prop("disabled", false);
                $("#tgl_nib").prop("disabled", false);
                $("#sk_kemenhumkam").prop("disabled", false);
                $("#nama_direksi").prop("disabled", false);
                $("#merk_dagang").prop("disabled", false);
                $("#kebutuhan_volume").prop("disabled", false);
                $("#satuan_volume").prop("disabled", false);
                $("#norek_perusahaan").prop("disabled", false);
                $("#nama_bank_rekening").prop("disabled", false);
                $("#web_perusahaan").prop("disabled", false);
                $("#cus_gabung").prop("disabled", false);
                $("#pakta").prop("disabled", false);
                $("#akta_pengurus").prop("disabled", false);
                $("#tgl_pengurus").prop("disabled", false);
                $("#guna_kon").prop("disabled", false);
            
                $.ajax({
                    type: 'GET',
                    dataType:'JSON',
                    url: 'data-customer/data-pengguna/'+id,

                    success:function(data){

                        if(data.hasil == "dihapus"){

                            Toast.fire({
                                icon: 'error',
                                title: 'Maaf, data ini sudah tidak ada!'
                            });

                            $('#tabel').DataTable().ajax.reload();

                        }else if(data.hasil == "ada"){

                            $("input[name=cara_pembayaran][value=T]").prop('checked', false);
                            $("input[name=cara_pembayaran][value=K]").prop('checked', false);
                            
                            $("input[name=status_blacklist][value=BLOCK]").prop('checked', false);
                            $("input[name=status_blacklist][value=UNBLOCK]").prop('checked', false);
                            
                            $("input[name=ttk][value=YA]").prop('checked', false);
                            $("input[name=ttk][value=TIDAK]").prop('checked', false);
                                                        
                            $("#id").val(data.id);
                            /*alert(data.tipe_cus2 + " " + data.nama_customer2 + " " + data.alamat_customer2 + " " + data.npwp2 + " " + data.ktp2 +
                                    " " + data.no_telp2 + " " + data.no_hp_pemilik2 + " " + data.kontak_person2 + " " + data.jabatan_kontak_person2 +
                                    " " + data.credit_term2);*/
                            if(data.tipe_cus2 != "" && data.tipe_cus2 != null){ $("#tipe_cus").prop("disabled", true); $("#tipe_cus_c").val(data.tipe_cus2); $("#tipe_cus").val(data.tipe_cus2).trigger("change"); } else { $("#tipe_cus").val(data.tipe_cus).trigger("change"); }
                            if(data.nama_customer2 != null && data.nama_customer2 != null){ $("#nama_customer").prop("disabled", true); $("#nama_customer_c").val("ya"); $("#nama_customer").val(data.nama_customer2); } else { $("#nama_customer").val(data.nama_customer); }
                            if(data.alamat_customer2 != "" && data.alamat_customer2 != null){ $("#alamat_customer").prop("disabled", true); $("#alamat_customer_c").val("ya"); $("#alamat_customer").val(data.alamat_customer2); } else { $("#alamat_customer").val(data.alamat_customer); }
                            if(data.npwp2 != "" && data.npwp2 != null){ $("#npwp").prop("disabled", true); $("#npwp_c").val("ya"); $("#npwp").val(data.npwp2); } else { $("#npwp").val(data.npwp); }
                            if(data.ktp2 != "" && data.ktp2 != null){ $("#ktp_pemilik").prop("disabled", true); $("#ktp_pemilik_c").val("ya"); $("#ktp_pemilik").val(data.ktp2); } else { $("#ktp_pemilik").val(data.ktp); }
                            if(data.no_telp2 != "" && data.no_telp2 != null){ $("#no_telp").prop("disabled", true); $("#no_telp_c").val("ya"); $("#no_telp").val(data.no_telp2); } else { $("#no_telp").val(data.no_telp); }
                            if(data.no_hp_pemilik2 != "" && data.no_hp_pemilik2 != null){ $("#no_hp_pemilik").prop("disabled", true); $("#no_hp_pemilik_c").val("ya"); $("#no_hp_pemilik").val(data.no_hp_pemilik2); } else { $("#no_hp_pemilik").val(data.no_hp_pemilik); }
                            if(data.kontak_person2 != "" && data.kontak_person2 != null){ $("#kontak_person").prop("disabled", true); $("#kontak_person_c").val("ya"); $("#kontak_person").val(data.kontak_person2); } else { $("#kontak_person").val(data.kontak_person); }
                            if(data.jabatan_kontak_person2 != "" & data.jabatan_kontak_person2 != null){ $("#jabatan_kontak_person").prop("disabled", true); $("#jabatan_kontak_person_c").val("ya"); $("#jabatan_kontak_person").val(data.jabatan_kontak_person2); } else { $("#jabatan_kontak_person").val(data.jabatan_kontak_person); }
                            if(data.credit_term2 != "" && data.credit_term2 != null){ $("#credit_term").prop("disabled", true); $("#credit_term_c").val("ya"); $("#credit_term").val(data.credit_term2); } else { $("#credit_term").val(data.credit_term); }
                            
                            if(data.cara_pembayaran2 != "" && data.cara_pembayaran2 != null){
                                
                                $("input[name=cara_pembayaran][value=T]").prop('disabled', true);
                                $("input[name=cara_pembayaran][value=K]").prop('disabled', true);
                                $("#cara_pembayaran_c").val("ya");
                                $("input[name=cara_pembayaran][value=" + data.cara_pembayaran2 + "]").prop('checked', true);
                                
                            }else{
                                
                                if(data.cara_pembayaran != "" && data.cara_pembayaran != null){
                                    $("input[name=cara_pembayaran][value=" + data.cara_pembayaran + "]").prop('checked', true);
                                }
                                
                            }
                            
                            if(data.nilai_plafon2 != "0.00" && data.nilai_plafon2 != "" && data.nilai_plafon2 != null){ $("#nilai_plafon").prop("disabled", true); $("#nilai_plafon_c").val("ya"); $("#nilai_plafon").val(data.nilai_plafon2); } else { $("#nilai_plafon").val(data.nilai_plafon); }
                            
                            if(data.status_blacklist2 != "" && data.status_blacklist2 != null){
                                
                                $("input[name=status_blacklist][value=BLOCK]").prop('disabled', true);
                                $("input[name=status_blacklist][value=UNBLOCK]").prop('disabled', true);
                                $("#status_blacklist_c").val("ya");
                                $("input[name=status_blacklist][value=" + data.status_blacklist2 + "]").prop('checked', true);
                                
                            }else{
                                
                                if(data.status_blacklist != "" && data.status_blacklist != null){
                                    $("input[name=status_blacklist][value=" + data.status_blacklist + "]").prop('checked', true);
                                }
                                
                            }
                            
                            if(data.kode_global2 != "" && data.kode_global2 != null){ $("#kode_global").prop("disabled", true); $("#kode_global_c").val("ya"); $("#kode_global").val(data.kode_global2); } else { $("#kode_global").val(data.kode_global); }
                            if(data.kode_grup_customer2 != "" && data.kode_grup_customer2 != null){ $("#kode_grup_customer").prop("disabled", true); $("#kode_grup_customer_c").val("ya"); $("#kode_grup_customer").val(data.kode_grup_customer2); } else { $("#kode_grup_customer").val(data.kode_grup_customer); }
                            
                            if(data.ttk2 != "" && data.ttk2 != null){
                                
                                $("input[name=ttk][value=YA]").prop('disabled', true);
                                $("input[name=ttk][value=TIDAK]").prop('disabled', true);
                                $("#ttk_c").val("ya");
                                $("input[name=ttk][value=" + data.ttk2 + "]").prop('checked', true);
                                
                            }else{
                                
                                if(data.ttk != "" && data.ttk != null){
                                    $("input[name=ttk][value=" + data.ttk + "]").prop('checked', true);
                                }
                                
                            }
                            
                            if(data.kelompok_customer2 != "" && data.kelompok_customer2 != null){ $("#kelompok_customer").prop("disabled", true); $("#kelompok_customer_c").val("ya"); $("#kelompok_customer").val(data.kelompok_customer2); } else { $("#kelompok_customer").val(data.kelompok_customer); }
                            if(data.unit2 != "" && data.unit2 != null){ $("#unit").prop("disabled", true); $("#unit_c").val("ya"); $("#unit").val(data.unit2).trigger("change"); } else { $("#unit").val(data.unit).trigger("change"); }
                            if(data.nama_unit2 != "" && data.nama_unit2 != null){ $("#nama_unit").prop("disabled", true); $("#nama_unit_c").val("ya"); $("#nama_unit").val(data.nama_unit2); } else { $("#nama_unit").val(data.nama_unit); }
                            if(data.jenis_produk2 != "" && data.jenis_produk2 != null){ $("#jenis_produk").prop("disabled", true); $("#jenis_produk_c").val("ya"); $("#jenis_produk").val(data.jenis_produk2).trigger("change"); } else { $("#jenis_produk").val(data.jenis_produk).trigger("change"); }
                            if(data.cabang2 != "" && data.cabang2 != null){ $("#cabang").prop("disabled", true); $("#cabang_c").val("ya"); $("#cabang").val(data.cabang2); } else { $("#cabang").val(data.cabang); }
                            if(data.wilayah_customer2 != "" && data.wilayah_customer2 != null){ $("#wilayah_customer").prop("disabled", true); $("#wilayah_customer_c").val("ya"); $("#wilayah_customer").val(data.wilayah_customer2); } else { $("#wilayah_customer").val(data.wilayah_customer); }
                            if(data.akta_pt2 != "" && data.akta_pt2 != null){ $("#akta_pt").prop("disabled", true); $("#akta_pt_c").val("ya"); $("#akta_pt").val(data.akta_pt2); } else { $("#akta_pt").val(data.akta_pt); }
                            if(data.nib2 != "" && data.nib2 != null){ $("#nib").prop("disabled", true); $("#nib_c").val("ya"); $("#nib").val(data.nib2); } else { $("#nib").val(data.nib); }
                            if(data.tgl_nib2 != "0000-00-00" && data.tgl_nib2 != "" && data.tgl_nib2 != null){ $("#tgl_nib").prop("disabled", true); $("#tgl_nib_c").val("ya"); $("#tgl_nib").val(data.tgl_nib2); } else { $("#tgl_nib").val(data.tgl_nib); }
                            if(data.sk_kemenhumkam2 != "" && data.sk_kemenhumkam2 != null){ $("#sk_kemenhumkam").prop("disabled", true); $("#sk_kemenhumkam_c").val("ya"); $("#sk_kemenhumkam").val(data.sk_kemenhumkam2); } else { $("#sk_kemenhumkam").val(data.sk_kemenhumkam); }
                            if(data.nama_direksi2 != "" && data.nama_direksi2 != null){ $("#nama_direksi").prop("disabled", true); $("#nama_direksi_c").val("ya"); $("#nama_direksi").val(data.nama_direksi2); } else { $("#nama_direksi").val(data.nama_direksi); }
                            if(data.norek_perusahaan2 != "" && data.norek_perusahaan2 != null){ $("#norek_perusahaan").prop("disabled", true); $("#norek_perusahaan_c").val("ya"); $("#norek_perusahaan").val(data.norek_perusahaan2); } else { $("#norek_perusahaan").val(data.norek_perusahaan); }
                            if(data.web_perusahaan2 != "" && data.web_perusahaan2 != null){ $("#web_perusahaan").prop("disabled", true); $("#web_perusahaan_c").val("ya"); $("#web_perusahaan").val(data.web_perusahaan2); } else { $("#web_perusahaan").val(data.web_perusahaan); }
                            if(data.merk_dagang2 != "" && data.merk_dagang2 != null){ $("#merk_dagang").prop("disabled", true); $("#merk_dagang_c").val("ya"); $("#merk_dagang").val(data.merk_dagang2); } else { $("#merk_dagang").val(data.merk_dagang); }
                            if(data.vol2 != "0.00" && data.vol2 != "" && data.vol2 != null){ $("#kebutuhan_volume").prop("disabled", true); $("#kebutuhan_volume_c").val("ya"); $("#kebutuhan_volume").val(data.vol2); } else { $("#kebutuhan_volume").val(data.vol); }
                            if(data.satuan_vol2 != "" && data.satuan_vol2 != null){ $("#satuan_volume").prop("disabled", true); $("#satuan_volume_c").val("ya"); $("#satuan_volume").val(data.satuan_vol2).trigger("change"); } else { if(data.satuan_vol == "") { $("#satuan_volume").val("KG").trigger("change"); } else { $("#satuan_volume").val(data.satuan_vol).trigger("change"); } }
                            if(data.alamat_pengiriman2 != "" && data.alamat_pengiriman2 != null){ $("#alamat_pengiriman").prop("disabled", true); $("#alamat_pengiriman_c").val("ya"); $("#alamat_pengiriman").val(data.alamat_pengiriman2); } else { $("#alamat_pengiriman").val(data.alamat_pengiriman); }
                            if(data.alamat_fp32 != "" && data.alamat_fp32 != null){ $("#alamat_fp3").prop("disabled", true); $("#alamat_fp3").val(data.alamat_fp32); } else { $("#alamat_fp3").val(data.alamat_fp3); }
                            if(data.alamat_fp22 != "" && data.alamat_fp22 != null){ $("#alamat_fp2").prop("disabled", true); $("#alamat_fp2").val(data.alamat_fp22); } else { $("#alamat_fp2").val(data.alamat_fp2); }
                            if(data.alamat_fp12 != "" && data.alamat_fp12 != null){ $("#alamat_fp1").prop("disabled", true); $("#alamat_fp_c").val("ya"); $("#alamat_fp1").val(data.alamat_fp12); } else { $("#alamat_fp1").val(data.alamat_fp1); }
                            if(data.tgl_akta2 != "0000-00-00" && data.tgl_akta2 != "" && data.tgl_akta2 != null){ $("#tgl_akta_pendirian_pt").prop("disabled", true); $("#tgl_akta_pendirian_pt_c").val("ya"); $("#tgl_akta_pendirian_pt").val(data.tgl_akta2); } else { $("#tgl_akta_pendirian_pt").val(data.tgl_akta); }
                            if(data.bank_rek2 != "" && data.bank_rek2 != null){ $("#nama_bank_rekening").prop("disabled", true); $("#nama_bank_rekening_c").val("ya"); $("#nama_bank_rekening").val(data.bank_rek2); } else { $("#nama_bank_rekening").val(data.bank_rek); }
                            if(data.cus_gabung2 != "0000-00-00" && data.cus_gabung2 != "" && data.cus_gabung2 != null){ $("#cus_gabung").prop("disabled", true); $("#cus_gabung_c").val("ya"); $("#cus_gabung").val(data.cus_gabung2); } else { $("#cus_gabung").val(data.cus_gabung); }
                            if(data.pakta2 != "" && data.pakta2 != null){ $("#pakta").prop("disabled", true); $("#pakta_c").val("ya"); $("#pakta").val(data.pakta2).trigger("change"); } else { $("#pakta").val(data.pakta).trigger("change"); }
                            if(data.akta_peng2 != "" && data.akta_peng2 != null){ $("#akta_pengurus").prop("disabled", true); $("#akta_pengurus_c").val("ya"); $("#akta_pengurus").val(data.akta_peng2); } else { $("#akta_pengurus").val(data.akta_peng); }
                            if(data.tgl_peng2 != "0000-00-00" && data.tgl_peng2 != "" && data.tgl_peng2 != null){ $("#tgl_pengurus").prop("disabled", true); $("#tgl_pengurus_c").val("ya"); $("#tgl_pengurus").val(data.tgl_peng2); } else { $("#tgl_pengurus").val(data.tgl_peng); }
                            if(data.ket2 != "" && data.ket2 != null){ $("#keterangan").prop("disabled", true); $("#keterangan").val(data.ket2); } else { $("#keterangan").val(data.ket); }
                            if(data.guna_kon2 != "" && data.guna_kon2 != null){ $("#guna_kon").prop("disabled", true); $("#guna_kon_c").val("ya"); $("#guna_kon").val(data.guna_kon2).trigger("change"); } else { $("#guna_kon").val(data.guna_kon).trigger("change"); }
                            
                            $("#nama_customer").prop("disabled", true);
                            $("#alamat_fp1").prop("disabled", true);
                            $("#alamat_fp2").prop("disabled", true);
                            $("#alamat_fp3").prop("disabled", true);
                            $("#npwp").prop("disabled", true);
                            $("#jenis_produk").prop("disabled", true);
                            
                            if(data.tipe_cus == "*"){
                                $("#wajib_jenis_produk").html('');
                                $("#wajib_npwp").html('');
                                $("#wajib_cara_pembayaran").html('');
                                $("#wajib_status_blacklist").html('');
                                $("#wajib_kode_global").html('');
                                $("#wajib_kode_grup_customer").html('');
                                $("#wajib_ttk").html('');
                            }else if(data.tipe_cus == "-"){
                                $("#wajib_jenis_produk").html('<span style="color: red;">*</span>');
                                $("#wajib_npwp").html('<span style="color: red;">*</span>');
                                $("#wajib_cara_pembayaran").html('<span style="color: red;">*</span>');
                                $("#wajib_status_blacklist").html('<span style="color: red;">*</span>');
                                $("#wajib_kode_global").html('<span style="color: red;">*</span>');
                                $("#wajib_kode_grup_customer").html('<span style="color: red;">*</span>');
                                $("#wajib_ttk").html('<span style="color: red;">*</span>');
                            }
                                                        
                            $('#modal_edit').modal('show');

                        }

                    }
                });
            }
        
            $("#form_customer").submit(function(e) {
                // mencegah default submit form
                e.preventDefault();

                input();

            });
            
            function input(){
            
                $('#modal_konfirmasi').modal('hide');
                
                $("#error_tipe_cus").html("");
                $("#error_nama_customer").html("");
                $("#error_alamat_customer").html("");$("#error_alamat_pengiriman").html("");
                $("#error_alamat_fp").html("");$("#error_npwp").html("");
                $("#error_ktp_pemilik").html("");$("#error_no_telp").html("");
                $("#error_no_hp_pemilik").html("");$("#error_kontak_person").html("");
                $("#error_jabatan_kontak_person").html("");$("#error_credit_term").html("");
                $("#error_cara_pembayaran").html("");$("#error_nilai_plafon").html("");
                $("#error_status_blacklist").html("");$("#error_kode_global").html("");
                $("#error_kode_grup_customer").html("");$("#error_ttk").html("");
                $("#error_kelompok_customer").html("");$("#error_unit").html("");
                $("#error_nama_unit").html("");$("#error_jenis_produk").html("");
                $("#error_cabang").html("");$("#error_wilayah_customer").html("");
                $("#error_akta_pt").html("");$("#error_tgl_akta_pendirian_pt").html("");
                $("#error_nib").html("");$("#error_tgl_nib").html("");                
                $("#error_sk_kemenhumkam").html("");$("#error_nama_direksi").html("");
                $("#error_merk_dagang").html("");$("#error_kebutuhan_volume").html("");$("#error_satuan_volume").html("");
                $("#error_norek_perusahaan").html("");$("#error_nama_bank_rekening").html("");
                $("#error_web_perusahaan").html("");$("#error_cus_gabung").html("");
                $("#error_pakta").html("");$("#error_akta_pengurus").html("");
                $("#error_tgl_pengurus").html("");$("#error_guna_kon").html("");
                $("#error_keterangan").html("");
                
                $("#btn_kirim").hide();

                // ambil data form dengan serialize
                var dataform = $("#form_customer").serialize();
                //alert(dataform);
                $.ajax({
                    url: "<?php echo base_url('data-customer/ubah-customer')?>",
                    type: "post",
                    data: dataform,
                    success: function(result) {
                        var hasil = JSON.parse(result);
                        if (hasil.hasil == "gagal") {

                            $("#btn_kirim").show();

                            $("#error_tipe_cus").html(hasil.error.tipe_cus);
                            $("#error_nama_customer").html(hasil.error.nama_customer);
                            $("#error_alamat_customer").html(hasil.error.alamat_customer);
                            $("#error_alamat_pengiriman").html(hasil.error.alamat_pengiriman);
                            $("#error_alamat_fp").html(hasil.error.alamat_fp);
                            
                            $("#error_npwp").html(hasil.error.npwp);
                            $("#error_cara_pembayaran").html(hasil.error.cara_pembayaran);
                            
                            $("#error_status_blacklist").html(hasil.error.status_blacklist);
                            $("#error_kode_global").html(hasil.error.kode_global);
                            $("#error_kode_grup_customer").html(hasil.error.kode_grup_customer);
                            $("#error_ttk").html(hasil.error.ttk);
                            $("#error_unit").html(hasil.error.unit);
                            $("#error_nama_unit").html(hasil.error.nama_unit);
                            $("#error_jenis_produk").html(hasil.error.jenis_produk);
                            $("#error_no_telp").html(hasil.error.no_telp);
                            $("#error_kontak_person").html(hasil.error.kontak_person);

                        } else if (hasil.hasil == "sukses_tambah") {

                            $("#btn_kirim").show();

                            Toast.fire({
                                icon: 'success',
                                title: 'Berhasil merubah data customer'
                            })

                            $("#tipe_cus").val("").trigger("change");
                            $("#nama_customer").val("");
                            $("#alamat_customer").val("");$("#alamat_pengiriman").val("");
                            $("#alamat_fp1").val("");$("#alamat_fp2").val("");$("#alamat_fp3").val("");
                            $("#npwp").val("");
                            $("#ktp_pemilik").val("");$("#no_telp").val("");
                            $("#no_hp_pemilik").val("");$("#kontak_person").val("");
                            $("#jabatan_kontak_person").val("");$("#credit_term").val("");
                            $("#nilai_plafon").val("");
                            $("#kode_global").val("");
                            $("#kode_grup_customer").val("");
                            $("#kelompok_customer").val("");$("#unit").val("").trigger("change");
                            $("#nama_unit").val("");$("#jenis_produk").val("").trigger("change");

                            $("#cabang").val("");$("#wilayah_customer").val("");
                            $("#akta_pt").val("");$("#tgl_akta_pendirian_pt").val("");
                            $("#nib").val("");$("#tgl_nib").val("");
                            
                            $("#sk_kemenhumkam").val("");$("#nama_direksi").val("");
                            $("#merk_dagang").val("");$("#kebutuhan_volume").val("");$("#satuan_volume").val("");
                            $("#norek_perusahaan").val("");$("#nama_bank_rekening").val("");
                            $("#web_perusahaan").val("");$("#cus_gabung").val("");
                            $("#pakta").val("").trigger("change");$("#akta_pengurus").val("");
                            $("#tgl_pengurus").val("");$("#tgl_pengurus").val("");
                            $("#keterangan").val("");$("#guna_kon").val("").trigger("change");
                                                        
                            $("input[name=cara_pembayaran][value=T]").prop('checked', false);
                            $("input[name=cara_pembayaran][value=K]").prop('checked', false);
                            
                            $("input[name=status_blacklist][value=BLOCK]").prop('checked', false);
                            $("input[name=status_blacklist][value=UNBLOCK]").prop('checked', false);
                            
                            $("input[name=ttk][value=YA]").prop('checked', false);
                            $("input[name=ttk][value=TIDAK]").prop('checked', false);

                            $("#id").val("");
                            $('#modal_edit').modal('hide');
                            $('#tabel').DataTable().ajax.reload();
                            
                        }
                    }
                });

            }
            
        </script>
        
    </body>
</html>

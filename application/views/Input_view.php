<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('material/Head_view'); ?>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <?php $this->load->view('material/Navbar_view'); ?>

        <?php $this->load->view('material/Sidebar_view'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Input Customer</h1>
                        </div><!-- /.col -->
                        <!--<div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="halaman-utama">Halaman Utama</a></li>
                                    <li class="breadcrumb-item active">Input Customer</li>
                                </ol>
                            </div>-->
                        <!-- /.col -->
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
                                    <h3 class="card-title">Form Input Customer</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="form_customer">
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Tipe Customer<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" id="tipe_cus" name="tipe_cus">
                                                        <option value="">Tipe Customer</option>
                                                        <option value="*">Prospek</option>
                                                        <option value="-">Join</option>
                                                    </select>
                                                    <span class="text-danger" id="error_tipe_cus"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Unit<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" id="unit" name="unit">
                                                    </select>
                                                    <span class="text-danger" id="error_unit"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Nama Unit<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="nama_unit" id="nama_unit">
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
                                                    <span class="text-danger" id="error_jenis_produk"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Nama Customer<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="nama_customer" id="nama_customer">
                                                    <span class="text-danger" id="error_nama_customer"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Alamat FP<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="alamat_fp1" id="alamat_fp1">
                                                    <input class="form-control" type="text" name="alamat_fp2" id="alamat_fp2">
                                                    <input class="form-control" type="text" name="alamat_fp3" id="alamat_fp3">
                                                    <span class="text-danger" id="error_alamat_fp"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Alamat Customer<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="alamat_customer" id="alamat_customer">
                                                    <span class="text-danger" id="error_alamat_customer"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Alamat Pengiriman<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="alamat_pengiriman" id="alamat_pengiriman">
                                                    <span class="text-danger" id="error_alamat_pengiriman"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">No NPWP Badan<span id="wajib_npwp"></span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="npwp" id="npwp">
                                                    <span class="text-danger" id="error_npwp"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">KTP Pemilik</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="ktp_pemilik" id="ktp_pemilik">
                                                    <span class="text-danger" id="error_ktp_pemilik"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">No Telp<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="no_telp" id="no_telp">
                                                    <span class="text-danger" id="error_no_telp"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">No HP Pemilik</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="no_hp_pemilik" id="no_hp_pemilik">
                                                    <span class="text-danger" id="error_no_hp_pemilik"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Kontak Person<span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="kontak_person" id="kontak_person">
                                                    <span class="text-danger" id="error_kontak_person"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Jabatan Kontak Person</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="jabatan_kontak_person" id="jabatan_kontak_person">
                                                    <span class="text-danger" id="error_jabatan_kontak_person"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Credit Term</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="credit_term" id="credit_term">
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
                                                    <span class="text-danger" id="error_cara_pembayaran"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Nilai Plafon</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control autonumber" type="text" name="nilai_plafon" id="nilai_plafon">
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
                                                    <span class="text-danger" id="error_status_blacklist"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Kode Jatra<span id="wajib_kode_global"></span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="kode_global" id="kode_global">
                                                    <span class="text-danger" id="error_kode_global"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Kode Grup Customer<span id="wajib_kode_grup_customer"></span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="kode_grup_customer" id="kode_grup_customer">
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
                                                    <span class="text-danger" id="error_ttk"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Kelompok Customer</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="kelompok_customer" id="kelompok_customer">
                                                    <span class="text-danger" id="error_kelompok_customer"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Cabang</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="cabang" id="cabang">
                                                    <span class="text-danger" id="error_cabang"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Wilayah Customer</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="wilayah_customer" id="wilayah_customer">
                                                    <span class="text-danger" id="error_wilayah_customer"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Akta Pendirian PT</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="akta_pt" id="akta_pt">
                                                    <span class="text-danger" id="error_akta_pt"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Tgl Akta Pendirian PT</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="tgl_akta_pendirian_pt" id="tgl_akta_pendirian_pt">
                                                    <span class="text-danger" id="error_tgl_akta_pendirian_pt"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">No Induk Berusaha</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="nib" id="nib">
                                                    <span class="text-danger" id="error_nib"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Tanggal NIB</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="tgl_nib" id="tgl_nib">
                                                    <span class="text-danger" id="error_tgl_nib"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">SK Kemenhumkam</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="sk_kemenhumkam" id="sk_kemenhumkam">
                                                    <span class="text-danger" id="error_sk_kemenhumkam"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Nama Direksi Perusahaan</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="nama_direksi" id="nama_direksi">
                                                    <span class="text-danger" id="error_nama_direksi"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Merk Dagang</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="merk_dagang" id="merk_dagang">
                                                    <span class="text-danger" id="error_merk_dagang"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Kebutuhan Volume</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control autonumber" type="text" name="kebutuhan_volume" id="kebutuhan_volume">
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
                                                    <span class="text-danger" id="error_satuan_volume"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">No Rekening Perusahaan</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="norek_perusahaan" id="norek_perusahaan">
                                                    <span class="text-danger" id="error_norek_perusahaan"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Nama Bank Rekening Perusahaan</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="nama_bank_rekening" id="nama_bank_rekening">
                                                    <span class="text-danger" id="error_nama_bank_rekening"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Website Perusahaan</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="web_perusahaan" id="web_perusahaan">
                                                    <span class="text-danger" id="error_web_perusahaan"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Tgl Customer Bergabung</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="cus_gabung" id="cus_gabung">
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
                                                    <span class="text-danger" id="error_pakta"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Akta Pengurus Terbaru</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="akta_pengurus" id="akta_pengurus">
                                                    <span class="text-danger" id="error_akta_pengurus"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row col-lg-6">
                                                <label class="col-sm-3 col-form-label">Tgl Periode Pengurus Terbaru</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="tgl_pengurus" id="tgl_pengurus">
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
                                        </div>

                                        <div class="form-group text-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_simpan_pengguna">Simpan</button>
                                        </div>

                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

                </div>

                <!--Modal-->

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

                <div class="modal fade" id="modal_konfirmasi_hapus">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5>Apa Anda yakin ingin menghapus pengguna ini?</h5>
                                <form id="form_hapus">
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_hapus" id="id_hapus" placeholder="id">
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_hapus">Hapus</button>
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
        <?php $this->load->view('material/Footer_view'); ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <?php $this->load->view('material/Jquery_view'); ?>
    <script type="text/javascript">
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 7000
        });

        $("#tipe_cus").on("change", function(e) {
            var tipe = $("#tipe_cus").val();

            if (tipe == "*") {
                $("#wajib_jenis_produk").html('');
                $("#wajib_npwp").html('');
                $("#wajib_cara_pembayaran").html('');
                $("#wajib_status_blacklist").html('');
                $("#wajib_kode_global").html('');
                $("#wajib_kode_grup_customer").html('');
                $("#wajib_ttk").html('');
            } else {
                $("#wajib_jenis_produk").html('<span style="color: red;">*</span>');
                $("#wajib_npwp").html('<span style="color: red;">*</span>');
                $("#wajib_cara_pembayaran").html('<span style="color: red;">*</span>');
                $("#wajib_status_blacklist").html('<span style="color: red;">*</span>');
                $("#wajib_kode_global").html('<span style="color: red;">*</span>');
                $("#wajib_kode_grup_customer").html('<span style="color: red;">*</span>');
                $("#wajib_ttk").html('<span style="color: red;">*</span>');
            }
        });

        $("#alamat_fp1").on("keyup", function(e) {
            var alamat = $("#alamat_fp1").val() + " " + $("#alamat_fp2").val() + " " + $("#alamat_fp3").val();
            $("#alamat_customer").val(alamat);
            $("#alamat_pengiriman").val(alamat);
        });

        $("#alamat_fp2").on("keyup", function(e) {
            var alamat = $("#alamat_fp1").val() + " " + $("#alamat_fp2").val() + " " + $("#alamat_fp3").val();
            $("#alamat_customer").val(alamat);
            $("#alamat_pengiriman").val(alamat);
        });

        $("#alamat_fp3").on("keyup", function(e) {
            var alamat = $("#alamat_fp1").val() + " " + $("#alamat_fp2").val() + " " + $("#alamat_fp3").val();
            $("#alamat_customer").val(alamat);
            $("#alamat_pengiriman").val(alamat);
        });

        get_unit();

        function get_unit() {
            $.ajax({
                url: 'input-customer/unit',
                success: function(data) {
                    $('#unit').html(data);
                },
            });
        }

        $("#unit").change(function() {

            var unit = $("#unit").val();

            $.ajax({
                url: "<?php echo base_url('input-customer/nama-unit') ?>",
                type: "post",
                data: {
                    unit: unit
                },
                success: function(result) {
                    var hasil = JSON.parse(result);

                    $("#nama_unit").val(hasil.unit);

                }
            });

        });

        $("#form_customer").submit(function(e) {
            // mencegah default submit form
            e.preventDefault();

            $('#modal_konfirmasi').modal('show');

        });

        function input() {

            $('#modal_konfirmasi').modal('hide');

            $("#error_tipe_cus").html("");
            $("#error_nama_customer").html("");
            $("#error_alamat_customer").html("");
            $("#error_alamat_pengiriman").html("");
            $("#error_alamat_fp").html("");
            $("#error_npwp").html("");
            $("#error_ktp_pemilik").html("");
            $("#error_no_telp").html("");
            $("#error_no_hp_pemilik").html("");
            $("#error_kontak_person").html("");
            $("#error_jabatan_kontak_person").html("");
            $("#error_credit_term").html("");
            $("#error_cara_pembayaran").html("");
            $("#error_nilai_plafon").html("");
            $("#error_status_blacklist").html("");
            $("#error_kode_global").html("");
            $("#error_kode_grup_customer").html("");
            $("#error_ttk").html("");
            $("#error_kelompok_customer").html("");
            $("#error_unit").html("");
            $("#error_nama_unit").html("");
            $("#error_jenis_produk").html("");
            $("#error_cabang").html("");
            $("#error_wilayah_customer").html("");
            $("#error_akta_pt").html("");
            $("#error_tgl_akta_pendirian_pt").html("");
            $("#error_nib").html("");
            $("#error_tgl_nib").html("");
            $("#error_sk_kemenhumkam").html("");
            $("#error_nama_direksi").html("");
            $("#error_merk_dagang").html("");
            $("#error_kebutuhan_volume").html("");
            $("#error_satuan_volume").html("");
            $("#error_norek_perusahaan").html("");
            $("#error_nama_bank_rekening").html("");
            $("#error_web_perusahaan").html("");
            $("#error_cus_gabung").html("");
            $("#error_pakta").html("");
            $("#error_akta_pengurus").html("");
            $("#error_tgl_pengurus").html("");
            $("#error_guna_kon").html("");
            $("#error_keterangan").html("");

            $("#btn_kirim").hide();

            // ambil data form dengan serialize
            var dataform = $("#form_customer").serialize();

            $.ajax({
                url: "<?php echo base_url('input-customer/tambah-customer') ?>",
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
                            title: 'Berhasil input customer baru'
                        })

                        $("#tipe_cus").val("").trigger("change");
                        $("#nama_customer").val("");
                        $("#alamat_customer").val("");
                        $("#alamat_pengiriman").val("");
                        $("#alamat_fp1").val("");
                        $("#alamat_fp2").val("");
                        $("#alamat_fp3").val("");
                        $("#npwp").val("");
                        $("#ktp_pemilik").val("");
                        $("#no_telp").val("");
                        $("#no_hp_pemilik").val("");
                        $("#kontak_person").val("");
                        $("#jabatan_kontak_person").val("");
                        $("#credit_term").val("");
                        $("#nilai_plafon").val("");
                        $("#kode_global").val("");
                        $("#kode_grup_customer").val("");
                        $("#kelompok_customer").val("");
                        $("#unit").val("").trigger("change");
                        $("#nama_unit").val("");
                        $("#jenis_produk").val("").trigger("change");

                        $("#cabang").val("");
                        $("#wilayah_customer").val("");
                        $("#akta_pt").val("");
                        $("#tgl_akta_pendirian_pt").val("");
                        $("#nib").val("");
                        $("#tgl_nib").val("");

                        $("#sk_kemenhumkam").val("");
                        $("#nama_direksi").val("");
                        $("#merk_dagang").val("");
                        $("#kebutuhan_volume").val("");
                        $("#satuan_volume").val("");
                        $("#norek_perusahaan").val("");
                        $("#nama_bank_rekening").val("");
                        $("#web_perusahaan").val("");
                        $("#cus_gabung").val("");
                        $("#pakta").val("").trigger("change");
                        $("#akta_pengurus").val("");
                        $("#tgl_pengurus").val("");
                        $("#tgl_pengurus").val("");
                        $("#keterangan").val("");
                        $("#guna_kon").val("").trigger("change");

                        $("input[name=cara_pembayaran][value=T]").prop('checked', false);
                        $("input[name=cara_pembayaran][value=K]").prop('checked', false);

                        $("input[name=status_blacklist][value=BLOCK]").prop('checked', false);
                        $("input[name=status_blacklist][value=UNBLOCK]").prop('checked', false);

                        $("input[name=ttk][value=YA]").prop('checked', false);
                        $("input[name=ttk][value=TIDAK]").prop('checked', false);

                    }
                }
            });

        }
    </script>

</body>

</html>
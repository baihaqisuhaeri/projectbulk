<!DOCTYPE html>
<html lang="en">




<!-- <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> -->

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
                            <h1 class="m-0 text-dark">Bulk | Surat Jalan</h1>

                        </div><!-- /.col -->
                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">
                                <h1 class="m-0 text-dark">Bulan Aktif :</h1>
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                $bulan = date("Y-m"); ?>
                                <h1 class="m-0 text-dark"><?= $bulan ?></h1>
                                <!--<li class="breadcrumb-item"><a href="pengadaan-aspal">Pengadaan Aspal</a></li>
                                        <li class="breadcrumb-item active">Administrator</li>-->
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row" id="data">
                        <div class="col-12">
                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#satu" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Tambah Surat Jalan</a>
                                        </li>

                                        <!--<li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#empat" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Kontrak</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#lima" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Kelengkapan Dokumen</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#enam" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Status Shipment</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#tujuh" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">EDP</a>
                                                </li>-->
                                    </ul>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">


                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <!--tab1-->

                                        <div class="tab-pane fade show active" id="satu" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                            <form class="form-horizontal" id="tambahSuratJalan">
                                                <div class="callout callout-info" style="background-color: #EDEEF7;" id="bagian_1">
                                                    <!-- CAF0F8 F9DFDC -->
                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Nama Unit<span style="color: red;">*</span></label>
                                                            <select class="form-control select2" id="unitSj" name="unitSj">
                                                            </select>
                                                            <span class="text-danger" id="error_unitSj"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Nama Customer<span style="color: red;">*</span></label>
                                                            <select class="form-control select2" id="nama_customer" name="nama_customer">
                                                            </select>
                                                            <span class="text-danger" id="error_nama_customer"></span>

                                                        </div>

                                                        <div class="form-group col-lg-4">

                                                            <br>
                                                            <button type="button" class="btn btn-secondary btn-lg" id="btnAlamatKirim">Pilih Alamat Kirim</button>

                                                        </div>





                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat 1<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat1" id="alamat1" placeholder="Alamat 1" disabled>
                                                            <span class="text-danger" id="error_alamat1"></span>

                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat 2<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat2" id="alamat2" placeholder="Alamat 2" disabled>
                                                            <span class="text-danger" id="error_alamat2"></span>

                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat 3 <span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat3" id="alamat3" placeholder="Alamat 3" disabled>
                                                            <span class="text-danger" id="error_alamat3"></span>

                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Kode Alamat <span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="kode_alamat" id="kode_alamat" placeholder="Kode Alamat" disabled>
                                                            <span class="text-danger" id="error_kode_alamat"></span>

                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>NPWP<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="npwp" id="npwp" placeholder="NPWP" disabled>
                                                            <span class="text-danger" id="error_npwp"></span>

                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>No SPM<span style="color: red;">*</span></label>
                                                            <select class="form-control select2" id="no_spm" name="no_spm">
                                                            </select>
                                                            <span class="text-danger" id="error_no_spm"></span>
                                                        </div>

                                                    </div>


                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Nomor PO <span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="nomor_po" id="nomor_po" placeholder="Nomor PO" disabled>
                                                            <span class="text-danger" id="error_nomor_po"></span>

                                                        </div>

                                                        <div class="form-group col-lg-2">
                                                            <label>Tanggal PO<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="date" name="tanggal_po" id="tanggal_po" placeholder="Tanggal PO" disabled>
                                                            <span class="text-danger" id="error_tanggal_po"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>PPN<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="ppn" id="ppn" placeholder="PPN" disabled>
                                                            <span class="text-danger" id="error_ppn"></span>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>No. Surat Jalan<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="no_surat_jalan" id="no_surat_jalan" placeholder="Nomor Surat Jalan" disabled>
                                                            <span class="text-danger" id="error_no_surat_jalan"></span>
                                                        </div>

                                                        <div class="form-group col-lg-2">
                                                            <div class="row">

                                                                <label style="margin-left: 7">Cara Pembayaran<span style="color: red;">*</span></label>

                                                            </div>
                                                            <div class="row" style="margin-left: 7">
                                                                <div class="custom-control custom-radio">
                                                                    <input class="custom-control-input" type="radio" id="rd_tunai" name="rd_tunai" disabled>
                                                                    <label for="customRadio3" class="custom-control-label">Tunai</label>
                                                                </div>

                                                            </div>

                                                            <div class="row" style="margin-left: 7">
                                                                <div class="custom-control custom-radio">
                                                                    <input class="custom-control-input" type="radio" id="rd_kredit" name="rd_kredit" disabled>
                                                                    <label for="customRadio3" class="custom-control-label">Kredit</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-2">
                                                            <label>Tanggal Surat Jalan<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="date" name="tanggal_surat_jalan" id="tanggal_surat_jalan" placeholder="Tanggal Surat Jalan">
                                                            <span class="text-danger" id="error_tanggal_surat_jalan"></span>
                                                        </div>
                                                    </div>



                                                    <div class="row">

                                                        <div class="form-group col-lg-4">
                                                            <label>No Kendaraan<span style="color: red;">*</span></label>
                                                            <select class="form-control select2" id="no_kendaraan" name="no_kendaraan">
                                                            </select>
                                                            <span class="text-danger" id="error_no_kendaraan"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Unit Marketing<span style="color: red;">*</span></label>
                                                            <select class="form-control select2" id="unit_marketing" name="unit_marketing">
                                                            </select>
                                                            <span class="text-danger" id="error_unit_marketing"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Nama Supir<span style="color: red;">*</span></label>
                                                            <select class="form-control select2" id="nama_supir" name="nama_supir">
                                                            </select>
                                                            <span class="text-danger" id="error_nama_supir"></span>
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Kode Barang<span style="color: red;">*</span></label>
                                                            <select class="form-control select2" id="kode_barang" name="kode_barang">
                                                            </select>
                                                            <span class="text-danger" id="error_kode_barang"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Jumlah<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="number" name="jumlah" id="jumlah" placeholder="jumlah">Ton / Tabung
                                                            <span class="text-danger" id="error_jumlah"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Kilogram<span style="color: red;">*</span></label>
                                                            <input class="form-control " type="text" name="kilogram" id="kilogram" placeholder="kg" disabled>
                                                            <span class="text-danger" id="error_kilogram"></span>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Keterangan<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="keterangan" id="keterangan" placeholder="Keterangan">
                                                            <span class="text-danger" id="error_keterangan"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Pengambilan dari<span style="color: red;">*</span></label>
                                                            <select class="form-control select2" id="suplier" name="suplier">
                                                            </select>
                                                            <span class="text-danger" id="error_suplier"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>No Faktur<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="no_faktur" id="no_faktur" placeholder="Nomor Faktur">
                                                            <span class="text-danger" id="error_keterangan"></span>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <label> POSISI ROTOGAGE / LEVEL CONTROL </label>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>No Segel<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="no_segel" id="no_segel" placeholder="Nomor Segel">
                                                            <span class="text-danger" id="error_no_segel"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Pressure<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="number" name="pressure" id="pressure" placeholder="Pressure">Bar
                                                            <span class="text-danger" id="error_pressure"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Temperatur<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="number" name="temperatur" id="temperatur" placeholder="Temperatur">°C
                                                            <span class="text-danger" id="error_temperatur"></span>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Posisi Pengambilan :</label>
                                                            <label>Nilai Persen<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="number" name="nilai_persen_pengambilan" id="nilai_persen_pengambilan" placeholder="Nilai Persen">%
                                                            <span class="text-danger" id="error_nilai_persen_pengambilan"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Posisi Berangkat :</label>
                                                            <label>Nilai Persen<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="number" name="nilai_persen_berangkat" id="nilai_persen_berangkat" placeholder="Nilai Persen">%
                                                            <span class="text-danger" id="error_nilai_persen_berangkat"></span>
                                                        </div>

                                                    </div>


                                                    <div class="form-group text-right">
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_tambah_sj">Tambah</button>

                                                    </div>

                                                </div>


                                                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" id="modal_alamat" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">

                                                        <div class="modal-content" style="padding: 10px">
                                                            <div class="form-group text-right" style="float: right;">
                                                                <button class="btn btn-primary btn-small btn-primary btn-rounded" type="button" id="btn_tambah_alamat" style="margin-right: 941px">+ Tambah Alamat Baru</button>

                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-lg-4">
                                                                    <label>No. Customer<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="no_customer_modal" id="no_customer_modal" placeholder="Nomor Customer" disabled>
                                                                    <span class="text-danger" id="error_no_customer_modal"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>Nama Customer<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="nama_customer_modal" id="nama_customer_modal" placeholder="Nama Customer" disabled>
                                                                    <span class="text-danger" id="error_nama_customer_modal"></span>
                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>NPWP <span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="npwp_modal" id="npwp_modal" placeholder="NPWP" disabled>
                                                                    <span class="text-danger" id="error_npwp_modal"></span>

                                                                </div>



                                                            </div>


                                                            <div class="row">
                                                                <div class="form-group col-lg-2">
                                                                    <label>Alamat kirim ke-<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="alamat_kirim_ke_modal" id="alamat_kirim_ke_modal" placeholder="Alamat Kirim ke-" disabled>
                                                                    <span class="text-danger" id="error_alamat_kirim_ke_modal"></span>
                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label style="margin-top:40px;">Alamat Pengiriman<span style="color: red;">*</span></label>

                                                                </div>

                                                                <div class="form-group col-lg-4" style="margin-left:-190px;">
                                                                    <input class="form-control" type="text" name="alamat_kirim1_modal" id="alamat_kirim1_modal" placeholder="Alamat Kirim 1" disabled>
                                                                    <span class="text-danger" id="error_alamat_kirim1_modal"></span>
                                                                    <input class="form-control" type="text" name="alamat_kirim2_modal" id="alamat_kirim2_modal" placeholder="Alamat Kirim 2" disabled>
                                                                    <span class="text-danger" id="error_alamat_kirim2_modal"></span>
                                                                    <input class="form-control" type="text" name="alamat_kirim3_modal" id="alamat_kirim3_modal" placeholder="Alamat Kirim 3" disabled>
                                                                    <span class="text-danger" id="error_alamat_kirim3_modal"></span>
                                                                </div>

                                                            </div>

                                                            <div class="form-group text-right">
                                                                <button class="btn btn-primary btn-small btn-primary btn-rounded" type="button" id="btn_simpan_alamat">Simpan</button>

                                                            </div>


                                                            <div class="callout callout-warning table-responsive" width="100%" style="background-color: #FFF8E5;" id="bagian_3">

                                                                <table class="table table-bordered table-striped" style="font-size: 10pt;" id="tabel_alamat_kirim">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Nama Faktur Pajak</th>
                                                                            <th>NPWP</th>
                                                                            <th>Kode Alamat</th>
                                                                            <th>Alamat 1</th>
                                                                            <th>Alamat 2</th>
                                                                            <th>Alamat 3</th>

                                                                            <th>Pilih</th>
                                                                            <th>Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" id="modal_tambah_alamat" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">

                                                        <div class="modal-content" style="padding: 10px">


                                                            <div class="row">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Nomor Customer<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="nomor_customer_baru" id="nomor_customer_baru" placeholder="Nomor Customer" disabled>
                                                                    <span class="text-danger" id="error_nomor_customer_baru"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>Nama Customer<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="nama_customer_baru" id="nama_customer_baru" placeholder="Nama Customer" disabled>
                                                                    <span class="text-danger" id="error_nama_customer_baru"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>Alamat kirim ke-<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="alamat_kirim_ke_baru" id="alamat_kirim_ke_baru" placeholder="Alamat kirim ke-" disabled>
                                                                    <span class="text-danger" id="error_alamat_kirim_ke_baru"></span>

                                                                </div>


                                                            </div>

                                                            <div class="row">



                                                                <div class="form-group col-lg-4">
                                                                    <label>Nama Faktur Pajak<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="nama_faktur_pajak_baru" id="nama_faktur_pajak_baru" placeholder="" disabled>
                                                                    <span class="text-danger" id="error_nama_faktur_pajak_baru"></span>
                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>NPWP <span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="npwp_baru" id="npwp_baru" placeholder="NPWP">
                                                                    <span class="text-danger" id="error_npwp_baru"></span>

                                                                </div>



                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-lg-4">

                                                                    <input hidden class="form-control" type="text" name="alamat1_customer_baru_hidden" id="alamat1_customer_baru_hidden" placeholder="" disabled>
                                                                    <span class="text-danger" id="error_alamat1_customer_baru_hidden"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">

                                                                    <input hidden class="form-control" type="text" name="alamat2_customer_baru_hidden" id="alamat2_customer_baru_hidden" placeholder="" disabled>
                                                                    <span class="text-danger" id="error_alamat2_customer_baru_hidden"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">

                                                                    <input hidden class="form-control" type="text" name="alamat3_customer_baru_hidden" id="alamat3_customer_baru_hidden" placeholder="" disabled>
                                                                    <span class="text-danger" id="error_alamat3_customer_baru_hidden"></span>

                                                                </div>


                                                            </div>


                                                            <div class="row">

                                                                <div class="form-group col-lg-4">
                                                                    <label>Alamat kirim 1<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="alamat_kirim1_baru" id="alamat_kirim1_baru" placeholder="Alamat kirim 1">
                                                                    <span class="text-danger" id="error_alamat_kirim1_baru"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>Alamat kirim 2<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="alamat_kirim2_baru" id="alamat_kirim2_baru" placeholder="Alamat kirim 2">
                                                                    <span class="text-danger" id="error_alamat_kirim2_baru"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>Alamat kirim 3<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="alamat_kirim3_baru" id="alamat_kirim3_baru" placeholder="Alamat kirim 3">
                                                                    <span class="text-danger" id="error_alamat_kirim3_baru"></span>

                                                                </div>



                                                            </div>


                                                            <div class="form-group text-right" style="float: right;">
                                                                <button class="btn btn-primary btn-small btn-primary btn-rounded" type="button" id="btn_kembali" style="margin-right: 0px">Kembali</button>
                                                                <button class="btn btn-primary btn-small btn-primary btn-rounded" type="button" id="btn_simpan_alamat_baru" style="margin-right: 0px">Simpan</button>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>



                                            </form>

                                            <form class="form-horizontal" id="edit_alamat_kirim">
                                                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" id="modal_tambah_alamat_edit" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">

                                                        <div class="modal-content" style="padding: 10px">


                                                            <div class="row">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Nomor Customer<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="nomor_customer_baru_edit" id="nomor_customer_baru_edit" placeholder="Nomor Customer" disabled>
                                                                    <span class="text-danger" id="error_nomor_customer_baru_edit"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>Nama Customer<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="nama_customer_baru_edit" id="nama_customer_baru_edit" placeholder="Nama Customer" disabled>
                                                                    <span class="text-danger" id="error_nama_customer_baru_edit"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>Alamat kirim ke-<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="alamat_kirim_ke_baru_edit" id="alamat_kirim_ke_baru_edit" placeholder="Alamat kirim ke-" disabled>
                                                                    <span class="text-danger" id="error_alamat_kirim_ke_baru_edit"></span>

                                                                </div>


                                                            </div>

                                                            <div class="row">



                                                                <div class="form-group col-lg-4">
                                                                    <label>Nama Faktur Pajak<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="nama_faktur_pajak_baru_edit" id="nama_faktur_pajak_baru_edit" placeholder="" disabled>
                                                                    <span class="text-danger" id="error_nama_faktur_pajak_baru_edit"></span>
                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>NPWP <span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="npwp_baru_edit" id="npwp_baru_edit" placeholder="NPWP">
                                                                    <span class="text-danger" id="error_npwp_baru_edit"></span>

                                                                </div>



                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-lg-4">

                                                                    <input hidden class="form-control" type="text" name="alamat1_customer_baru_hidden_edit" id="alamat1_customer_baru_hidden_edit" placeholder="" disabled>
                                                                    <span class="text-danger" id="error_alamat1_customer_baru_hidden_edit"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">

                                                                    <input hidden class="form-control" type="text" name="alamat2_customer_baru_hidden_edit" id="alamat2_customer_baru_hidden_edit" placeholder="" disabled>
                                                                    <span class="text-danger" id="error_alamat2_customer_baru_hidden_edit"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">

                                                                    <input hidden class="form-control" type="text" name="alamat3_customer_baru_hidden_edit" id="alamat3_customer_baru_hidden_edit" placeholder="" disabled>
                                                                    <span class="text-danger" id="error_alamat3_customer_baru_hidden_edit"></span>

                                                                </div>


                                                            </div>


                                                            <div class="row">

                                                                <div class="form-group col-lg-4">
                                                                    <label>Alamat kirim 1<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="alamat_kirim1_baru_edit" id="alamat_kirim1_baru_edit" placeholder="Alamat kirim 1">
                                                                    <span class="text-danger" id="error_alamat_kirim1_baru_edit"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>Alamat kirim 2<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="alamat_kirim2_baru_edit" id="alamat_kirim2_baru_edit" placeholder="Alamat kirim 2">
                                                                    <span class="text-danger" id="error_alamat_kirim2_baru_edit"></span>

                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label>Alamat kirim 3<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="alamat_kirim3_baru_edit" id="alamat_kirim3_baru_edit" placeholder="Alamat kirim 3">
                                                                    <span class="text-danger" id="error_alamat_kirim3_baru_edit"></span>

                                                                </div>



                                                            </div>


                                                            <div class="form-group text-right" style="float: right;">
                                                                <button class="btn btn-primary btn-small btn-primary btn-rounded" type="button" id="btn_kembali_edit" style="margin-right: 0px">Kembali</button>
                                                                <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_simpan_alamat_baru_edit" style="margin-right: 0px">Simpan</button>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                            </form>




                                            <!--tab2-->

                                            <!--tab3-->



                                        </div>

                                        <!--<button type="button" class="btn btn-primary mb-2" id="btn_modal_pengguna"><i class="fas fa-plus-circle"></i></button>-->
                                        <div class="callout callout-warning" style="background-color: #FFF8E5;" id="bagian_3">
                                            <h5>Daftar Surat Jalan</h5>


                                            <table class="table table-bordered table-striped" style="font-size: 10pt;" id="tabel_sj">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>Nomor Surat Jualan</td>
                                                        <td>Nama Customer</td>
                                                        <td>Kode Customer</td>
                                                        <td>Alamat kirim 1 Customer</td>
                                                        <td>Alamat kirim 2 Customer</td>
                                                        <td>Alamat kirim 3 Customer</td>
                                                        <td>NPWP</td>
                                                        <td>Unit</td>
                                                        <td>Nomor Urut SPM</td>
                                                        <td>Tanggal Surat Jalan</td>
                                                        <td>Nomor PO</td>
                                                        <td>Tanggal PO</td>
                                                        <td>PPN</td>
                                                        <td>Pembayaran</td>
                                                        <td>Kode Mobil</td>
                                                        <td>Nama Supir</td>
                                                        <td>Kode Supir</td>
                                                        <td>Unit Marketing</td>
                                                        <td>Kode Barang</td>
                                                        <td>Jumlah Barang</td>
                                                        <td>Jumlah Kilogram Barang</td>
                                                        <td>Keterangan</td>
                                                        <td>Nama Suplier</td>
                                                        <td>Nomor Faktur</td>
                                                        <td>Nomor Segel</td>
                                                        <td>Pressure</td>
                                                        <td>Temperatur</td>
                                                        <td>Pengambilan Awal</td>
                                                        <td>Pengambilan Akhir</td>
                                                        <td>Kode Supplier</td>







                                                        <td>Aksi</td>
                                                        <td>Cetak Surat Jalan</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>



                                        <form class="form-horizontal" id="edit_sj">
                                            <div class="callout callout-info" style="background-color: #EDEEF7;" id="bagian_2_edit">
                                                <!-- CAF0F8 F9DFDC -->
                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Nama Unit<span style="color: red;">*</span></label>
                                                        <select class="form-control select2" id="unitSj_2" name="unitSj_2">
                                                        </select>
                                                        <span class="text-danger" id="error_unitSj_2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Nama Customer<span style="color: red;">*</span></label>
                                                        <select class="form-control select2" id="nama_customer_2" name="nama_customer_2">
                                                        </select>
                                                        <span class="text-danger" id="error_nama_customer_2"></span>

                                                    </div>

                                                    <div class="form-group col-lg-4">

                                                        <br>
                                                        <button type="button" class="btn btn-secondary btn-lg" id="btnAlamatKirim_2">Pilih Alamat Kirim</button>

                                                    </div>





                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Alamat 1<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="alamat1_2" id="alamat1_2" placeholder="Alamat 1" disabled>
                                                        <span class="text-danger" id="error_alamat1_2"></span>

                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Alamat 2<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="alamat2_2" id="alamat2_2" placeholder="Alamat 2" disabled>
                                                        <span class="text-danger" id="error_alamat2_2"></span>

                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Alamat 3 <span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="alamat3_2" id="alamat3_2" placeholder="Alamat 3" disabled>
                                                        <span class="text-danger" id="error_alamat3_2"></span>

                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Kode Alamat <span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="kode_alamat_2" id="kode_alamat_2" placeholder="Kode Alamat" disabled>
                                                        <span class="text-danger" id="error_kode_alamat_2"></span>

                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>NPWP<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="npwp_2" id="npwp_2" placeholder="NPWP" disabled>
                                                        <span class="text-danger" id="error_npwp_2"></span>

                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>No SPM<span style="color: red;">*</span></label>
                                                        <select class="form-control select2" id="no_spm_2" name="no_spm_2">
                                                        </select>
                                                        <span class="text-danger" id="error_no_spm_2"></span>
                                                    </div>

                                                </div>


                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Nomor PO <span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="nomor_po_2" id="nomor_po_2" placeholder="Nomor PO" disabled>
                                                        <span class="text-danger" id="error_nomor_po_2"></span>

                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label>Tanggal PO<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="date" name="tanggal_po_2" id="tanggal_po_2" placeholder="Tanggal PO" disabled>
                                                        <span class="text-danger" id="error_tanggal_po_2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>PPN<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="ppn_2" id="ppn_2" placeholder="PPN" disabled>
                                                        <span class="text-danger" id="error_ppn_2"></span>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>No. Surat Jalan<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="no_surat_jalan_2" id="no_surat_jalan_2" placeholder="Nomor Surat Jalan" disabled>
                                                        <span class="text-danger" id="error_no_surat_jalan_2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label>Tanggal Surat Jalan<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="date" name="tanggal_surat_jalan_2" id="tanggal_surat_jalan_2" placeholder="Tanggal Surat Jalan">
                                                        <span class="text-danger" id="error_tanggal_surat_jalan_2"></span>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <label style="margin-left: 7">Cara Pembayaran<span style="color: red;">*</span></label>

                                                </div>
                                                <div class="row" style="margin-left: 7">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="rd_tunai_2" name="rd_tunai_2" disabled>
                                                        <label for="customRadio3" class="custom-control-label">Tunai</label>
                                                    </div>

                                                </div>

                                                <div class="row" style="margin-left: 7">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="rd_kredit_2" name="rd_kredit_2" disabled>
                                                        <label for="customRadio3" class="custom-control-label">Kredit</label>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-lg-4">
                                                        <label>No Kendaraan<span style="color: red;">*</span></label>
                                                        <select class="form-control select2" id="no_kendaraan_2" name="no_kendaraan_2">
                                                        </select>
                                                        <span class="text-danger" id="error_no_kendaraan_2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Unit Marketing<span style="color: red;">*</span></label>
                                                        <select class="form-control select2" id="unit_marketing_2" name="unit_marketing_2">
                                                        </select>
                                                        <span class="text-danger" id="error_unit_marketing_2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Nama Supir<span style="color: red;">*</span></label>
                                                        <select class="form-control select2" id="nama_supir_2" name="nama_supir_2">
                                                        </select>
                                                        <span class="text-danger" id="error_nama_supir_2"></span>
                                                    </div>

                                                </div>
                                                <br>
                                                <hr>
                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Kode Barang<span style="color: red;">*</span></label>
                                                        <select class="form-control select2" id="kode_barang_2" name="kode_barang_2">
                                                        </select>
                                                        <span class="text-danger" id="error_kode_barang_2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Jumlah<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="number" name="jumlah_2" id="jumlah_2" placeholder="jumlah">Ton / Tabung
                                                        <span class="text-danger" id="error_jumlah_2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Kilogram<span style="color: red;">*</span></label>
                                                        <input class="form-control " type="text" name="kilogram_2" id="kilogram_2" placeholder="kg" disabled>
                                                        <span class="text-danger" id="error_kilogram_2"></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Keterangan<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="keterangan_2" id="keterangan_2" placeholder="Keterangan">
                                                        <span class="text-danger" id="error_keterangan_2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Pengambilan dari<span style="color: red;">*</span></label>
                                                        <select class="form-control select2" id="suplier_2" name="suplier_2">
                                                        </select>
                                                        <span class="text-danger" id="error_suplier_2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>No Faktur<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="no_faktur_2" id="no_faktur_2" placeholder="Nomor Faktur">
                                                        <span class="text-danger" id="error_keterangan_2"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <label> POSISI ROTOGAGE / LEVEL CONTROL </label>
                                                <hr>
                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>No Segel<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="no_segel_2" id="no_segel_2" placeholder="Nomor Segel">
                                                        <span class="text-danger" id="error_no_segel_2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Pressure<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="number" name="pressure_2" id="pressure_2" placeholder="Pressure">Bar
                                                        <span class="text-danger" id="error_pressure_2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Temperatur<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="number" name="temperatur_2" id="temperatur_2" placeholder="Temperatur">°C
                                                        <span class="text-danger" id="error_temperatur_2"></span>
                                                    </div>
                                                </div>
                                                <label>Posisi Pengambilan :</label>
                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Nilai Persen<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="number" name="nilai_persen_pengambilan_2" id="nilai_persen_pengambilan_2" placeholder="Nilai Persen">%
                                                        <span class="text-danger" id="error_nilai_persen_pengambilan_2"></span>
                                                    </div>

                                                </div>

                                                <label>Posisi Berangkat :</label>
                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Nilai Persen<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="number" name="nilai_persen_berangkat_2" id="nilai_persen_berangkat_2" placeholder="Nilai Persen">%
                                                        <span class="text-danger" id="error_nilai_persen_berangkat_2"></span>
                                                    </div>

                                                </div>




                                                <div class="form-group text-right">
                                                    <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_tambah_sj_2">Simpan</button>

                                                </div>

                                            </div>


                                            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" id="modal_alamat_2" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">

                                                    <div class="modal-content" style="padding: 10px">


                                                        <div class="row">

                                                            <div class="form-group col-lg-4">
                                                                <label>No. Customer<span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="no_customer_modal_2" id="no_customer_modal_2" placeholder="Nomor Customer" disabled>
                                                                <span class="text-danger" id="error_no_customer_modal_2"></span>

                                                            </div>

                                                            <div class="form-group col-lg-4">
                                                                <label>Nama Customer<span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="nama_customer_modal_2" id="nama_customer_modal_2" placeholder="Nama Customer" disabled>
                                                                <span class="text-danger" id="error_nama_customer_modal_2"></span>
                                                            </div>

                                                            <div class="form-group col-lg-4">
                                                                <label>NPWP <span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="npwp_modal_2" id="npwp_modal_2" placeholder="NPWP" disabled>
                                                                <span class="text-danger" id="error_npwp_modal_2"></span>

                                                            </div>



                                                        </div>


                                                        <div class="row">
                                                            <div class="form-group col-lg-2">
                                                                <label>Alamat kirim ke-<span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="alamat_kirim_ke_modal_2" id="alamat_kirim_ke_modal_2" placeholder="Alamat Kirim ke-" disabled>
                                                                <span class="text-danger" id="error_alamat_kirim_ke_modal_2"></span>
                                                            </div>

                                                            <div class="form-group col-lg-4">
                                                                <label style="margin-top:40px;">Alamat Pengiriman<span style="color: red;">*</span></label>

                                                            </div>

                                                            <div class="form-group col-lg-4" style="margin-left:-190px;">
                                                                <input class="form-control" type="text" name="alamat_kirim1_modal_2" id="alamat_kirim1_modal_2" placeholder="Alamat Kirim 1" disabled>
                                                                <span class="text-danger" id="error_alamat_kirim1_modal_2"></span>
                                                                <input class="form-control" type="text" name="alamat_kirim2_modal_2" id="alamat_kirim2_modal_2" placeholder="Alamat Kirim 2" disabled>
                                                                <span class="text-danger" id="error_alamat_kirim2_modal_2"></span>
                                                                <input class="form-control" type="text" name="alamat_kirim3_modal_2" id="alamat_kirim3_modal_2" placeholder="Alamat Kirim 3" disabled>
                                                                <span class="text-danger" id="error_alamat_kirim3_modal_2"></span>
                                                            </div>

                                                        </div>

                                                        <div class="form-group text-right">
                                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" type="button" id="btn_simpan_alamat_2">Simpan</button>

                                                        </div>


                                                        <div class="callout callout-warning table-responsive" width="100%" style="background-color: #FFF8E5;" id="bagian_3">

                                                            <table class="table table-bordered table-striped" style="font-size: 10pt;" id="tabel_alamat_kirim_2">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Nama Faktur Pajak</th>
                                                                        <th>NPWP</th>
                                                                        <th>Kode Alamat</th>
                                                                        <th>Alamat 1</th>
                                                                        <th>Alamat 2</th>
                                                                        <th>Alamat 3</th>

                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" id="modal_tambah_alamat_2" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">

                                                    <div class="modal-content" style="padding: 10px">


                                                        <div class="row">
                                                            <div class="form-group col-lg-4">
                                                                <label>Nomor Customer<span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="nomor_customer_baru_2" id="nomor_customer_baru_2" placeholder="Nomor Customer" disabled>
                                                                <span class="text-danger" id="error_nomor_customer_baru_2"></span>

                                                            </div>

                                                            <div class="form-group col-lg-4">
                                                                <label>Nama Customer<span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="nama_customer_baru_2" id="nama_customer_baru_2" placeholder="Nama Customer" disabled>
                                                                <span class="text-danger" id="error_nama_customer_baru_2"></span>

                                                            </div>

                                                            <div class="form-group col-lg-4">
                                                                <label>Alamat kirim ke-<span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="alamat_kirim_ke_baru_2" id="alamat_kirim_ke_baru_2" placeholder="Alamat kirim ke-" disabled>
                                                                <span class="text-danger" id="error_alamat_kirim_ke_baru_2"></span>

                                                            </div>


                                                        </div>

                                                        <div class="row">



                                                            <div class="form-group col-lg-4">
                                                                <label>Nama Faktur Pajak<span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="nama_faktur_pajak_baru_2" id="nama_faktur_pajak_baru_2" placeholder="" disabled>
                                                                <span class="text-danger" id="error_nama_faktur_pajak_baru"></span>
                                                            </div>

                                                            <div class="form-group col-lg-4">
                                                                <label>NPWP <span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="npwp_baru_2" id="npwp_baru_2" placeholder="NPWP">
                                                                <span class="text-danger" id="error_npwp_baru_2"></span>

                                                            </div>



                                                        </div>

                                                        <div class="row">

                                                            <div class="form-group col-lg-4">

                                                                <input hidden class="form-control" type="text" name="alamat1_customer_baru_hidden_2" id="alamat1_customer_baru_hidden_2" placeholder="" disabled>
                                                                <span class="text-danger" id="error_alamat1_customer_baru_hidden_2"></span>

                                                            </div>

                                                            <div class="form-group col-lg-4">

                                                                <input hidden class="form-control" type="text" name="alamat2_customer_baru_hidden_2" id="alamat2_customer_baru_hidden_2" placeholder="" disabled>
                                                                <span class="text-danger" id="error_alamat2_customer_baru_hidden_2"></span>

                                                            </div>

                                                            <div class="form-group col-lg-4">

                                                                <input hidden class="form-control" type="text" name="alamat3_customer_baru_hidden_2" id="alamat3_customer_baru_hidden_2" placeholder="" disabled>
                                                                <span class="text-danger" id="error_alamat3_customer_baru_hidden_2"></span>

                                                            </div>


                                                        </div>


                                                        <div class="row">

                                                            <div class="form-group col-lg-4">
                                                                <label>Alamat kirim 1<span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="alamat_kirim1_baru_2" id="alamat_kirim1_baru_2" placeholder="Alamat kirim 1">
                                                                <span class="text-danger" id="error_alamat_kirim1_baru_2"></span>

                                                            </div>

                                                            <div class="form-group col-lg-4">
                                                                <label>Alamat kirim 2<span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="alamat_kirim2_baru_2" id="alamat_kirim2_baru_2" placeholder="Alamat kirim 2">
                                                                <span class="text-danger" id="error_alamat_kirim2_baru_2"></span>

                                                            </div>

                                                            <div class="form-group col-lg-4">
                                                                <label>Alamat kirim 3<span style="color: red;">*</span></label>
                                                                <input class="form-control" type="text" name="alamat_kirim3_baru_2" id="alamat_kirim3_baru_2" placeholder="Alamat kirim 3">
                                                                <span class="text-danger" id="error_alamat_kirim3_baru_2"></span>

                                                            </div>



                                                        </div>


                                                        <div class="form-group text-right" style="float: right;">
                                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" type="button" id="btn_kembali_2" style="margin-right: 0px">Kembali</button>
                                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" type="button" id="btn_simpan_alamat_baru_2" style="margin-right: 0px">Simpan</button>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                        <div class="modal fade" id="modal_konfirmasi_tambah_alamat">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5>Apa Anda sudah yakin?</h5>
                                                        <div class="form-group text-right">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="tambahAlamat()">Ya</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        <div class="modal fade" id="modal_konfirmasi_tambah_alamat_2">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5>Apa Anda sudah yakin?</h5>
                                                        <div class="form-group text-right">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="tambahAlamat2()">Ya</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>


                                        <div class="modal fade" id="modal_konfirmasi_delete">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5>Apa Anda sudah yakin?</h5>
                                                        <div class="form-group text-right">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="deleteSj()">Ya</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>


                                        <div class="modal fade" id="modal_konfirmasi_edit">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5>Apa Anda sudah yakin?</h5>
                                                        <div class="form-group text-right">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="cekEdit()">Ya</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>



                                        <div class="modal fade" id="modal_konfirmasi_tambah_sj">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5>Apa Anda sudah yakin?</h5>
                                                        <div class="form-group text-right">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="tambahSj()">Ya</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        <div class="modal fade" id="modal_konfirmasi_edit_sj">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5>Apa Anda sudah yakin?</h5>
                                                        <div class="form-group text-right">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="editSj()">Ya</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>


                                        <div class="modal fade" id="modal_konfirmasi_delete_alamat_kirim">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5>Apa Anda sudah yakin?</h5>
                                                        <div class="form-group text-right">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="deleteAlamatKirim()">Ya</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>


                                        <div class="modal fade" id="modal_konfirmasi_edit_alamat_kirim">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5>Apa Anda sudah yakin?</h5>
                                                        <div class="form-group text-right">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="editAlamatKirim()">Ya</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>


                                    </div>

                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </div>
                            <!-- /.col -->
                        </div>

                    </div>

                    <!--Modal-->


                    <div class="modal fade" id="modal_error">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4>Catatan!</h4>
                                    <div id="pesan_muncul"></div>
                                    <br>
                                    <div class="form-group text-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    </div>
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

    <!-- jQuery -->
    <?php $this->load->view('material/Jquery_view'); ?>



    <script src="<?php echo base_url(); ?>assets/dist/js/input_sj.js"></script>


    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

</body>

</html>
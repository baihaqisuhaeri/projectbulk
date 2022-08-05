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
                                                            <span class="text-danger" id="error_alamat1"></span>

                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat 3 <span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat3" id="alamat3" placeholder="Alamat 3" disabled>
                                                            <span class="text-danger" id="error_alamat1"></span>

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
                                                            <input class="form-control" type="text" name="no_surat_jalan" id="no_surat_jalan" placeholder="Nomor Surat Jalan">
                                                            <span class="text-danger" id="error_no_surat_jalan"></span>
                                                        </div>

                                                        <div class="form-group col-lg-2">
                                                            <label>Tanggal Surat Jalan<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="date" name="tanggal_surat_jalan" id="tanggal_surat_jalan" placeholder="Tanggal Surat Jalan">
                                                            <span class="text-danger" id="error_tanggal_surat_jalan"></span>
                                                        </div>
                                                    </div>
                                                    
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
                                                    <label>Posisi Pengambilan :</label>
                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Nilai Persen<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="number" name="nilai_persen_pengambilan" id="nilai_persen_pengambilan" placeholder="Nilai Persen">%
                                                            <span class="text-danger" id="error_nilai_persen_pengambilan"></span>
                                                        </div>  

                                                    </div>

                                                    <label>Posisi Berangkat :</label>
                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
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
                                                        
                                                        <div class="modal-content" style="padding: 10px" >
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
                                                            <input class="form-control" type="text" name="alamat_kirim2_modal" id="alamat_kirim2_modal" placeholder="Alamat Kirim 2"disabled>
                                                            <span class="text-danger" id="error_alamat_kirim2_modal"></span>
                                                            <input class="form-control" type="text" name="alamat_kirim3_modal" id="alamat_kirim3_modal" placeholder="Alamat Kirim 3"disabled>
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
                                                        
                                                        <div class="modal-content" style="padding: 10px" >
                                                        
                                                    
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






                                            <!--tab2-->

                                            <!--tab3-->



                                        </div>

                                        <!--<button type="button" class="btn btn-primary mb-2" id="btn_modal_pengguna"><i class="fas fa-plus-circle"></i></button>-->
                                        <div class="callout callout-warning" style="background-color: #FFF8E5;" id="bagian_3">
                                            <h5>Daftar Supir</h5>


                                            <table class="table table-bordered table-striped" style="font-size: 10pt;" id="tabel_sj">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>Nama Supir</td>
                                                        <td>Kode Supir</td>
                                                        <td>Unit</td>



                                                        <td>aksi</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>



                                        <form class="form-horizontal" id="edit_supir">
                                            <div class="callout callout-info" style="background-color: #EDEEF7;" id="bagian_2_edit">
                                                <!-- CAF0F8 F9DFDC -->

                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Nama Unit<span style="color: red;">*</span></label>
                                                        <select class="form-control select2" id="unitSupir2" name="unitSupir2">
                                                        </select>
                                                        <span class="text-danger" id="error_unit_supir2"></span>

                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Nama Supir<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="nama_supir2" id="nama_supir2" placeholder="Nama Supir">
                                                        <span class="text-danger" id="error_nama_supir2"></span>

                                                    </div>

                                                </div>










                                                <div class="form-group text-right">
                                                    <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_edit">Simpan</button>

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
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="tambahAlamat()" >Ya</button>
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
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded"  onclick="cekDelete()">Ya</button>
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
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded"  onclick="cekEdit()">Ya</button>
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
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="tambahSj()" >Ya</button>
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
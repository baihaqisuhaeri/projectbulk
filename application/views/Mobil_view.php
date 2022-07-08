<!DOCTYPE html>
<html lang="en">



<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
                            <h1 class="m-0 text-dark">Surat Perintah Muat - Bulk | Cabang</h1>

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
                                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#satu" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Tambah Barang</a>
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
                                            <form class="form-horizontal" id="tambahCabang">
                                                <div class="callout callout-info" style="background-color: #EDEEF7;" id="bagian_1">
                                                    <!-- CAF0F8 F9DFDC -->
                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Nama Cabang<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="nama_cabang" id="nama_cabang" placeholder="Nama Cabang">
                                                            <span class="text-danger" id="error_nama_cabang"></span>

                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat 1 Cabang<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat1_cabang" id="alamat1_cabang" placeholder="Alamat 1 Cabang">
                                                            <span class="text-danger" id="error_alamat1_cabang"></span>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat 2 Cabang<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat2_cabang" id="alamat2_cabang" placeholder="Alamat 2 Cabang">
                                                            <span class="text-danger" id="error_alamat2_cabang"></span>
                                                        </div>



                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat 3 Cabang<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat3_cabang" id="alamat3_cabang" placeholder="Alamat 3 Cabang">
                                                            <span class="text-danger" id="error_alamat3_cabang"></span>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label>Nomor Telepon<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="nomor_telepon" id="nomor_telepon" placeholder="Nomor Telepon">
                                                            <span class="text-danger" id="error_nomor_telepon"></span>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label>Nama Kontak<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="nama_kontak" id="nama_kontak" placeholder="Nama Kontak">
                                                            <span class="text-danger" id="error_nama_kontak"></span>
                                                        </div>

                                                    </div>



                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Nama Kepala Cabang<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="nama_kepala_cabang" id="nama_kepala_cabang" placeholder="Nama Kepala Cabang">
                                                            <span class="text-danger" id="error_nama_kepala_cabang"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Jabatan<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="jabatan" id="jabatan" placeholder="Jabatan">
                                                            <span class="text-danger" id="error_jabatan"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>NPWP<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="npwp" id="npwp" placeholder="npwp">
                                                            <span class="text-danger" id="error_npwp"></span>
                                                        </div>

                                                    </div>


                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>SK<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="sk" id="sk" placeholder="SK">
                                                            <span class="text-danger" id="error_sk"></span>
                                                        </div>

                                                        <div class="form-group col-lg-2">
                                                            <label>Tanggal SK<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="date" name="tanggal_sk" id="tanggal_sk" placeholder="Tanggal SK">
                                                            <span class="text-danger" id="error_tanggal_sk"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Nama FP<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="nama_fp" id="nama_fp" placeholder="Nama FP">
                                                            <span class="text-danger" id="error_nama_fp"></span>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Lokasi<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="lokasi" id="lokasi" placeholder="lokasi">
                                                            <span class="text-danger" id="error_lokasi"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Kode Nomor<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="kode_nomor" id="kode_nomor" placeholder="Kode Nomor">
                                                            <span class="text-danger" id="error_kode_nomor"></span>
                                                        </div>

                                                        <div class="form-group col-lg-2">
                                                            <label>Tanggal Aktif<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="date" name="tanggal_aktif" id="tanggal_aktif" placeholder="Tanggal Aktif">
                                                            <span class="text-danger" id="error_tanggal_aktif"></span>
                                                        </div>

                                                    </div>

                                                    <div class="row">






                                                        <div class="form-group col-lg-4">
                                                            <label>Nama PT<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="nama_pt" id="nama_pt" placeholder="Nama PT">
                                                            <span class="text-danger" id="error_nama_pt"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat Pjk 1<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat_pjk1" id="alamat_pjk1" placeholder="Alamat Pjk 1">
                                                            <span class="text-danger" id="error_alamat_pjk1"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat Pjk 2<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat_pjk2" id="alamat_pjk2" placeholder="Alamat Pjk 2">
                                                            <span class="text-danger" id="error_alamat_pjk2"></span>
                                                        </div>

                                                    </div>

                                                    <div class="row">


                                                        <div class="form-group col-lg-4">
                                                            <label>Kode SPM<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="kode_spm" id="kode_spm" placeholder="Kode SPM">
                                                            <span class="text-danger" id="error_kode_spm"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Plafon Unit<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="number" name="plaf_unit" id="plaf_unit" placeholder="Plafon Unit">
                                                            <span class="text-danger" id="error_plaf_unit"></span>
                                                        </div>

                                                    </div>






                                                    <div class="form-group text-right">
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_next">Tambah</button>

                                                    </div>

                                                </div>

                                            </form>






                                            <!--tab2-->

                                            <!--tab3-->



                                        </div>

                                        <!--<button type="button" class="btn btn-primary mb-2" id="btn_modal_pengguna"><i class="fas fa-plus-circle"></i></button>-->
                                        <div class="callout callout-warning" style="background-color: #FFF8E5;" id="bagian_3">
                                            <h5>Daftar Cabang</h5>


                                            <table class="table table-bordered table-striped" style="font-size: 10pt;" id="tabel_cabang">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>Nama Cabang</td>
                                                        <td>Alamat 1 Cabang</td>
                                                        <td>Alamat 2 Cabang</td>
                                                        <td>Alamat 3 Cabang</td>
                                                        <td>Nomor Telepon</td>
                                                        <td>Nama Kontak</td>
                                                        <td>Nama Kepala Cabang</td>
                                                        <td>Jabatan</td>
                                                        <td>NPWP</td>
                                                        <td>SK</td>
                                                        <td>Tanggal SK</td>
                                                        <td>Nama PT</td>
                                                        <td>Lokasi</td>
                                                        <td>Kode Nomor</td>

                                                        <td>Tanggal Aktif</td>
                                                        <td>Tutup Bulan</td>
                                                        <td>Nama PT</td>
                                                        <td>Alamat PJK</td>
                                                        <td>Alamat PJK2</td>
                                                        <td>Kode SPM</td>
                                                        <td>Plafon Unit</td>

                                                        <td>aksi</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>



                                        <form class="form-horizontal" id="edit_cabang">
                                            <div class="callout callout-info" style="background-color: #EDEEF7;" id="bagian_2_edit">
                                                <!-- CAF0F8 F9DFDC -->

                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Nama Cabang<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="nama_cabang2" id="nama_cabang2" placeholder="Nama Cabang">
                                                        <span class="text-danger" id="error_nama_cabang2"></span>

                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                        <label>Alamat 1 Cabang<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="alamat1_cabang2" id="alamat1_cabang2" placeholder="Alamat 1 Cabang">
                                                        <span class="text-danger" id="error_alamat1_cabang2"></span>
                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                        <label>Alamat 2 Cabang<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="alamat2_cabang2" id="alamat2_cabang2" placeholder="Alamat 2 Cabang">
                                                        <span class="text-danger" id="error_alamat2_cabang2"></span>
                                                    </div>



                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Alamat 3 Cabang<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="alamat3_cabang2" id="alamat3_cabang2" placeholder="Alamat 3 Cabang">
                                                        <span class="text-danger" id="error_alamat3_cabang2"></span>
                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                        <label>Nomor Telepon<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="nomor_telepon2" id="nomor_telepon2" placeholder="Nomor Telepon">
                                                        <span class="text-danger" id="error_nomor_telepon2"></span>
                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                        <label>Nama Kontak<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="nama_kontak2" id="nama_kontak2" placeholder="Nama Kontak">
                                                        <span class="text-danger" id="error_nama_kontak2"></span>
                                                    </div>

                                                </div>



                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Nama Kepala Cabang<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="nama_kepala_cabang2" id="nama_kepala_cabang2" placeholder="Nama Kepala Cabang">
                                                        <span class="text-danger" id="error_nama_kepala_cabang2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Jabatan<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="jabatan2" id="jabatan2" placeholder="Jabatan">
                                                        <span class="text-danger" id="error_jabatan2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>NPWP<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="npwp2" id="npwp2" placeholder="npwp">
                                                        <span class="text-danger" id="error_npwp2"></span>
                                                    </div>

                                                </div>


                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>SK<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="sk2" id="sk2" placeholder="SK">
                                                        <span class="text-danger" id="error_sk2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label>Tanggal SK<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="date" name="tanggal_sk2" id="tanggal_sk2" placeholder="Tanggal SK">
                                                        <span class="text-danger" id="error_tanggal_sk2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Nama FP<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="nama_fp2" id="nama_fp2" placeholder="Nama FP">
                                                        <span class="text-danger" id="error_nama_fp2"></span>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Lokasi<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="lokasi2" id="lokasi2" placeholder="lokasi">
                                                        <span class="text-danger" id="error_lokasi2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Kode Nomor<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="kode_nomor2" id="kode_nomor2" placeholder="Kode Nomor">
                                                        <span class="text-danger" id="error_kode_nomor2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label>Tanggal Aktif<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="date" name="tanggal_aktif2" id="tanggal_aktif2" placeholder="Tanggal Aktif">
                                                        <span class="text-danger" id="error_tanggal_aktif2"></span>
                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-lg-4">
                                                        <label>Nama PT<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="nama_pt2" id="nama_pt2" placeholder="Nama FP">
                                                        <span class="text-danger" id="error_nama_pt2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Alamat Pjk 1<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="alamat_pjk12" id="alamat_pjk12" placeholder="Alamat Pjk 1">
                                                        <span class="text-danger" id="error_alamat_pjk12"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Alamat Pjk 2<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="alamat_pjk22" id="alamat_pjk22" placeholder="Alamat Pjk 2">
                                                        <span class="text-danger" id="error_alamat_pjk22"></span>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-lg-4">
                                                        <label>Kode SPM<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="kode_spm2" id="kode_spm2" placeholder="Kode SPM">
                                                        <span class="text-danger" id="error_kode_spm2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Plafon Unit<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="number" name="plaf_unit2" id="plaf_unit2" placeholder="Plafon Unit">
                                                        <span class="text-danger" id="error_plaf_unit2"></span>
                                                    </div>

                                                </div>








                                                <div class="form-group text-right">
                                                    <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_edit">Simpan</button>

                                                </div>
                                            </div>

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

    <script src="<?php echo base_url(); ?>assets/dist/js/pros.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/tb_app.js"></script>

    <script src="<?php echo base_url(); ?>assets/dist/js/cabang.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

</body>

</html>
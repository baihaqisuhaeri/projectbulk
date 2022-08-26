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
                            <h1 class="m-0 text-dark">Bulk | Mobil</h1>

                        </div><!-- /.col -->
                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">
                                
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
                                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#satu" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Tambah Mobil</a>
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
                                            <form class="form-horizontal" id="tambahMobil">
                                                <div class="callout callout-info" style="background-color: #EDEEF7;" id="bagian_1">
                                                    <!-- CAF0F8 F9DFDC -->
                                                    <div class="row">
                                                        <div class="form-group col-lg-4">
                                                            <label>Nama Unit<span style="color: red;">*</span></label>
                                                            <select class="form-control select2" id="unitMobil" name="unitMobil">
                                                            </select>
                                                            <span class="text-danger" id="error_unit_mobil"></span>

                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Nama Mobil<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="nama_mobil" id="nama_mobil" placeholder="Nama Mobil">
                                                            <span class="text-danger" id="error_nama_mobil"></span>

                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Plat Nomor<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="plat_nomor" id="plat_nomor" placeholder="Plat Nomor">
                                                            <span class="text-danger" id="error_plat_nomor"></span>

                                                        </div>


                                                    </div>


                                                    <div class="row">



                                                        <div class="form-group col-lg-4">
                                                            <label>Tahun<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="tahun" id="tahun" placeholder="Tahun">
                                                            <span class="text-danger" id="error_tahun"></span>

                                                        </div>

                                                        <div class="form-group col-lg-2">
                                                            <label>Tanggal STNK<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="date" name="tanggal_stnk" id="tanggal_stnk" placeholder="Tanggal STNK">
                                                            <span class="text-danger" id="error_tanggal_stnk"></span>
                                                        </div>

                                                        <div class="form-group col-lg-2">
                                                            <label>Tanggal Kirim<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="date" name="tanggal_kirim" id="tanggal_kirim" placeholder="Tanggal Kirim">
                                                            <span class="text-danger" id="error_tanggal_kirim"></span>
                                                        </div>

                                                    </div>






                                                    <div class="form-group text-right">
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_next">Tambah</button>
                                                        
                                                    </div>

                                                </div>

                                            </form>


                                    <div class="modal fade" id="modal_konfirmasi_tambah">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5>Apa Anda sudah yakin?</h5>
                                                    <div class="form-group text-right">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="tambah()" >Ya</button>
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
                                                    <h5>Apa Anda sudah yakin?</h5>
                                                    <div class="form-group text-right">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded"  onclick="hapus()">Ya</button>
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
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded"  onclick="edit()">Ya</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>



                                            <!--tab2-->

                                            <!--tab3-->



                                        </div>

                                        <!--<button type="button" class="btn btn-primary mb-2" id="btn_modal_pengguna"><i class="fas fa-plus-circle"></i></button>-->
                                        <div class="callout callout-warning" style="background-color: #FFF8E5;" id="bagian_3">
                                            <h5>Daftar Mobil</h5>


                                            <table class="table table-bordered table-striped" style="font-size: 10pt;" id="tabel_mobil">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>No. Kendaraan</td>
                                                        <td>Nama Kendaraan</td>
                                                        <td>Tahun Kendaraan</td>
                                                        <td>Unit</td>
                                                        <td>Tanggal STNK</td>
                                                        <td>Tanggal Kirim</td>



                                                        <td>aksi</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>



                                        <form class="form-horizontal" id="edit_mobil">
                                            <div class="callout callout-info" style="background-color: #EDEEF7;" id="bagian_2_edit">
                                                <!-- CAF0F8 F9DFDC -->

                                                <div class="row">
                                                    <div class="form-group col-lg-4">
                                                        <label>Nama Unit<span style="color: red;">*</span></label>
                                                        <select class="form-control select2" id="unitMobil2" name="unitMobil2">
                                                        </select>
                                                        <span class="text-danger" id="error_unit_mobil2"></span>

                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Nama Mobil<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="nama_mobil2" id="nama_mobil2" placeholder="Nama Mobil">
                                                        <span class="text-danger" id="error_nama_mobil2"></span>

                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <label>Plat Nomor<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="plat_nomor2" id="plat_nomor2" placeholder="Plat Nomor">
                                                        <span class="text-danger" id="error_plat_nomor2"></span>

                                                    </div>


                                                </div>


                                                <div class="row">



                                                    <div class="form-group col-lg-4">
                                                        <label>Tahun<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="text" name="tahun2" id="tahun2" placeholder="Tahun">
                                                        <span class="text-danger" id="error_tahun2"></span>

                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label>Tanggal STNK<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="date" name="tanggal_stnk2" id="tanggal_stnk2" placeholder="Tanggal STNK">
                                                        <span class="text-danger" id="error_tanggal_stnk2"></span>
                                                    </div>

                                                    <div class="form-group col-lg-2">
                                                        <label>Tanggal Kirim<span style="color: red;">*</span></label>
                                                        <input class="form-control" type="date" name="tanggal_kirim2" id="tanggal_kirim2" placeholder="Tanggal Kirim">
                                                        <span class="text-danger" id="error_tanggal_kirim2"></span>
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



    <script src="<?php echo base_url(); ?>assets/dist/js/mobil.js"></script>


    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

</body>

</html>
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
                                    <h1 class="m-0 text-dark">Surat Perintah Muat - Bulk | Barang</h1>

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
                                                    <form class="form-horizontal" id="tambahBarang">
                                                        <div class="callout callout-info" style="background-color: #EDEEF7;" id="bagian_1">
                                                            <!-- CAF0F8 F9DFDC -->
                                                            <div class="row">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Nama Unit<span style="color: red;">*</span></label>
                                                                    <select class="form-control select2" id="unitBarang" name="unitBarang">
                                                                    </select>
                                                                    <span class="text-danger" id="error_unit_barang"></span>

                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Nama Barang<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="nama_barang" id="nama_barang" placeholder="Nama Barang">
                                                                    <span class="text-danger" id="error_nama_barang"></span>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Harga Pokok<span style="color: red;">*</span></label>
                                                                    <input class="form-control autonumber" type="text" name="harga_pokok" id="harga_pokok" placeholder="Harga Pokok">
                                                                    <span class="text-danger" id="error_harga_pokok"></span>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Harga Jual<span style="color: red;">*</span></label>
                                                                    <input class="form-control autonumber" type="text" name="harga_jual" id="harga_jual" placeholder="Harga Jual">
                                                                    <span class="text-danger" id="error_harga_jual"></span>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Kode Div<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="kode_div" id="kode_div" placeholder="Kode Div">
                                                                    <span class="text-danger" id="error_kode_div"></span>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Kode Berat<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="kode_berat" id="kode_berat" placeholder="Kode Berat">
                                                                    <span class="text-danger" id="error_kode_berat"></span>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Jumlah KG<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="number" name="jumlah_kg" id="jumlah_kg" placeholder="Jumlah KG">
                                                                    <span class="text-danger" id="error_jumlah_kg"></span>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Kode Jual<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="kode_jual" id="kode_jual" placeholder="Kode Jual">
                                                                    <span class="text-danger" id="error_kode_jual"></span>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Kode Tim<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="kode_tim" id="kode_tim" placeholder="Kode Tim">
                                                                    <span class="text-danger" id="error_kode_tim"></span>
                                                                </div>



                                                            </div>



                                                            <div class="form-group text-right">
                                                                <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_next">Tambah</button>

                                                            </div>
                                                        </div>

                                                    </form>

                                                    <div class="callout callout-warning" style="background-color: #FFF8E5;" id="bagian_3">
                                                        <h5>Daftar Barang</h5>

                                                        <table class="table table-bordered table-striped" style="font-size: 10pt;" id="tabel_barang">
                                                            <thead>
                                                                <tr>
                                                                    <td>No</td>
                                                                    <td>Kode Barang</td>
                                                                    <td>Nama Barang</td>
                                                                    <td>Kode Divisi</td>
                                                                    <td>Kode Berat</td>
                                                                    <td>Jumlah KG</td>
                                                                    <td>Harga Pokok</td>
                                                                    <td>Harga Jual</td>
                                                                    <td>Kode Jual</td>
                                                                    <td>Kode Tim</td>

                                                                    <td>Kode Unit</td>

                                                                    <td>aksi</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <form class="form-horizontal" id="edit_barang">
                                                        <div class="callout callout-info" style="background-color: #EDEEF7;" id="bagian_2_edit">
                                                            <!-- CAF0F8 F9DFDC -->
                                                            <div class="row">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Nama Unit<span style="color: red;">*</span></label>
                                                                    <select class="form-control select2" id="unitBarang2" name="unitBarang2">
                                                                    </select>
                                                                    <span class="text-danger" id="error_unit_barang2"></span>

                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Nama Barang<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="nama_barang2" id="nama_barang2" placeholder="Nama Barang">
                                                                    <span class="text-danger" id="error_nama_barang2"></span>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Harga Pokok<span style="color: red;">*</span></label>
                                                                    <input class="form-control autonumber" type="text" name="harga_pokok2" id="harga_pokok2" placeholder="Harga Pokok">
                                                                    <span class="text-danger" id="error_harga_pokok2"></span>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Harga Jual<span style="color: red;">*</span></label>
                                                                    <input class="form-control autonumber" type="text" name="harga_jual2" id="harga_jual2" placeholder="Harga Jual">
                                                                    <span class="text-danger" id="error_harga_jual2"></span>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Kode Div<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="kode_div2" id="kode_div2" placeholder="Kode Div">
                                                                    <span class="text-danger" id="error_kode_div2"></span>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Kode Berat<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="kode_berat2" id="kode_berat2" placeholder="Kode Berat">
                                                                    <span class="text-danger" id="error_kode_berat2"></span>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Jumlah KG<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="number" name="jumlah_kg2" id="jumlah_kg2" placeholder="Jumlah KG">
                                                                    <span class="text-danger" id="error_jumlah_kg2"></span>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Kode Jual<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="kode_jual2" id="kode_jual2" placeholder="Kode Jual">
                                                                    <span class="text-danger" id="error_kode_jual2"></span>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label>Kode Tim<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="kode_tim2" id="kode_tim2" placeholder="Kode Tim">
                                                                    <span class="text-danger" id="error_kode_tim2"></span>
                                                                </div>

                                                                <div hidden class="form-group col-lg-4">
                                                                    <label>Kode Barang<span style="color: red;">*</span></label>
                                                                    <input class="form-control" type="text" name="kode_barang2" id="kode_barang2" placeholder="Kode Barang">
                                                                    <span class="text-danger" id="error_kode_barang2"></span>
                                                                </div>


                                                            </div>



                                                            <div class="form-group text-right">
                                                                <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_edit">Simpan</button>

                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>

                                                <!--tab2-->

                                                <!--tab3-->



                                            </div>

                                            <!--<button type="button" class="btn btn-primary mb-2" id="btn_modal_pengguna"><i class="fas fa-plus-circle"></i></button>-->

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



            <script src="<?php echo base_url(); ?>assets/dist/js/barang.js"></script>

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
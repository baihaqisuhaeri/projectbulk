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
                            <h1 class="m-0 text-dark">Bulk | Permohonan Kwitansi</h1>

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
                                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#satu" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Tambah Supir</a>
                                        </li>

                                        
                                    </ul>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">


                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <!--tab1-->

                                        <div class="tab-pane fade show active" id="satu" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                            <form class="form-horizontal" id="tambahSupir">
                                                <div class="callout callout-info" style="background-color: #EDEEF7;" id="bagian_1">
                                                    <!-- CAF0F8 F9DFDC -->
                                                    <div class="row">

                                                        <div class="form-group col-lg-4">
                                                            <label>No Mohon<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="no_mohon" id="no_mohon" placeholder="No Mohon">
                                                            <span class="text-danger" id="error_no_mohon"></span>
                                                        </div>
                                    
                                                        <div class="form-group col-lg-2">
                                                            <label>Tanggal Mohon<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="date" name="tanggal_mohon" id="tanggal_mohon" placeholder="Tanggal Mohon">
                                                            <span class="text-danger" id="error_tanggal_mohon"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Nama Customer<span style="color: red;">*</span></label>
                                                            <select class="form-control select2" id="nama_customer" name="nama_customer">
                                                            </select>
                                                            <span class="text-danger" id="error_nama_customer"></span>
                                                        </div>
                                                        

                                                    </div>

                                                    <div class="row">

                                                        <div class="form-group col-lg-4">
                                                            <label>Kode Customer<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="kode_customer" id="kode_customer" placeholder="Kode Customer" disabled>
                                                            <span class="text-danger" id="error_kode_customer"></span>
                                                        </div>

                                                        <div class="form-group col-lg-2">
                                                            <label>Tanggal Berita Acara<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="date" name="tanggal_berita_acara" id="tanggal_berita_acara" placeholder="Tanggal Berita Acara">
                                                            <span class="text-danger" id="error_tanggal_berita_acara"></span>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat Kirim 1<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat_kirim_1" id="alamat_kirim_1" placeholder="Alamat Kirim 1">
                                                            <span class="text-danger" id="error_alamat_kirim_1"></span>
                                                        </div>                                                                                                                 
                                                        
                                                    </div>


                                                    <div class="row">

                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat Kirim 2<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat_kirim_2" id="alamat_kirim_2" placeholder="Alamat Kirim 2">
                                                            <span class="text-danger" id="error_alamat_kirim_2"></span>
                                                        </div>   

                                                        <div class="form-group col-lg-4">
                                                            <label>Alamat Kirim 3<span style="color: red;">*</span></label>
                                                            <input class="form-control" type="text" name="alamat_kirim_3" id="alamat_kirim_3" placeholder="Alamat Kirim 3">
                                                            <span class="text-danger" id="error_alamat_kirim_3"></span>
                                                        </div>                                                                                                                 
                                                        
                                                    </div>

                                        <div class="callout callout-warning" style="background-color: #FFF8E5;" id="bagian_tambah_detail">
                                            <h5>Daftar Surat Jalan</h5>


                                            <table class="table table-bordered table-striped" style="font-size: 10pt;" id="tabel_supir">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>Tanggal Surat Jalan</td>
                                                        <td>No Surat Jalan</td>
                                                        <td>Kode Barang</td>
                                                        <td>Nama Barang</td>
                                                        <td>Qty Kirim</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>

                                                    <div class="form-group text-right">
                                                    <button class="btn btn-primary btn-small btn-primary btn-rounded" type="button" id="btn_tambah_detail">Tambah Detail</button>
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_next">Tambah</button>

                                                    </div>

                                                </div>

                                            </form>

                                            <!--tab2-->

                                            <!--tab3-->

                                        </div>

                                        <!--Modal Tambah Detail-->

                                        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" id="modal_detail" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">

                                                        <div class="modal-content" style="padding: 10px">
                                                           

                                                            


                                                            

                                                            


                                                            <div class="callout callout-warning table-responsive" width="100%" style="background-color: #FFF8E5;" id="bagian_3">

                                                                <table class="table table-bordered table-striped" style="font-size: 10pt;" id="tabel_sj_detail">
                                                                    <thead>
                                                                        <tr>
                                                                        <th>No</th>
                                                                        <th>Tanggal Surat Jalan</th>
                                                                        <th>No Surat Jalan</th>
                                                                        <th>Jumlah</th>
                                                                        <th>Kode Barang</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Flag</th>
                                                                        <th>Kode Alamat</th>
                                                                        <th>Alamat Kirim</th>
                                                                        <th>Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="form-group text-right">
                                                                <button class="btn btn-primary btn-small btn-primary btn-rounded" type="button" id="btn_simpan_alamat">Simpan</button>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                        

                                                


                                        <!--<button type="button" class="btn btn-primary mb-2" id="btn_modal_pengguna"><i class="fas fa-plus-circle"></i></button>-->
                                        <div class="callout callout-warning" style="background-color: #FFF8E5;" id="bagian_daftar_pemohonan_kwitansi">
                                            <h5>Daftar Permohonan Kwitansi</h5>


                                            <table class="table table-bordered table-striped" style="font-size: 10pt;" id="tabel_permohonan_kwitansi">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>Tanggal Mohon</td>
                                                        <td>No Mohon</td>
                                                        <td>Tanggal Surat Jalan</td>
                                                        <td>Nama Customer</td>
                                                        <td>No Surat Jalan</td>
                                                        <td>Jumlah</td>
                                                       
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

                                    <div class="modal fade" id="modal_konfirmasi">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5>Apa Anda sudah yakin?</h5>
                                                    <div class="form-group text-right">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <button class="btn btn-primary btn-small btn-primary btn-rounded" onclick="cekTambah()" >Ya</button>
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



    <script src="<?php echo base_url(); ?>assets/dist/js/permohonan_kwitansi.js"></script>


    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

</body>

</html>
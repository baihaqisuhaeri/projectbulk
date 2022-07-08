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
                                <h1 class="m-0 text-dark">Kontrak</h1>
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
                                        <h3 class="card-title">Form Input Kontrak</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary mb-2" id="btn_modal_kontrak"><i class="fas fa-plus-circle"></i></button>
                                        <table id="tabel_kontrak" class="table table-bordered table-striped" style="font-size: 10pt;" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>No Kontrak</th>
                                                    <th>Nama Customer</th>
                                                    <th>Unit</th>
                                                    <th>Jenis Produk</th>
                                                    <th>Tgl Periode 1</th>
                                                    <th>Tgl Periode 2</th>
                                                    <th>Status</th>
                                                    <th></th>
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
                    <div class="modal fade" id="modal_kontrak">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><span id="judul"></span></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                    <form class="form-horizontal" id="form_kontrak">
                                        
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label>No Kontrak<span style="color: red;">*</span></label>
                                                <input class="form-control" type="text" name="no_kontrak" id="no_kontrak">
                                                <span class="text-danger" id="error_no_kontrak"></span>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Unit<span style="color: red;">*</span></label>
                                                <select class="form-control select2" id="unit" name="unit">
                                                </select>
                                                <span class="text-danger" id="error_unit"></span>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Jenis Produk<span style="color: red;">*</span></label>
                                                <select class="form-control select2" id="jenis_produk" name="jenis_produk">
                                                    <option value="">Jenis Produk</option>
                                                    <option value="ASPAL">ASPAL</option>
                                                    <option value="TABUNG">TABUNG</option>
                                                    <option value="BULK">BULK</option>
                                                    <option value="YALE">YALE</option>
                                                    <option value="SPPBE">SPPBE</option>
                                                </select>
                                                <span class="text-danger" id="error_jenis_produk"></span>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Nama Customer<span style="color: red;">*</span></label>
                                                <select class="form-control select2" id="nama_customer" name="nama_customer">
                                                </select>
                                                <span class="text-danger" id="error_nama_customer"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label>Tgl Periode 1<span style="color: red;">*</span></label>
                                                <input class="form-control" type="date" name="tgl_periode1" id="tgl_periode1">
                                                <span class="text-danger" id="error_tgl_periode1"></span>                                    
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>tgl Periode 2<span style="color: red;">*</span></label>
                                                <input class="form-control" type="date" name="tgl_periode2" id="tgl_periode2">
                                                <span class="text-danger" id="error_tgl_periode2"></span>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <input class="form-control" type="hidden" name="id_kontrak" id="id_kontrak">
                                                <input class="form-control" type="hidden" name="tanda" id="tanda">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group text-right">
                                            <button class="btn btn-primary btn-small btn-primary btn-rounded" type="submit" id="btn_simpan_kontrak">Simpan</button>
                                        </div>
                                    </form>
                                    
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
            <?php $this->load->view('material/Footer_view');?>
            
        </div>
        <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    
        <!-- jQuery -->
        <?php $this->load->view('material/Jquery_view');?>
        <script type="text/javascript">
        
            $(document).ready(function(){
                
                $('#tabel_kontrak').DataTable({

                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "responsive": true,
                    "order": [], //Initial no order.

                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": "<?php echo site_url('input-kontrak/tabel-kontrak')?>",
                        "type": "POST",
                        "data": function ( data ) {
                            data.a = "ga berguna";
                        }
                    },

                    //Set column definition initialisation properties.
                    "columnDefs": [
                    { 
                        "targets": [ 0 ], //first column / numbering column
                        "orderable": false, //set not orderable
                    },
                    ],

                });
            
            });
        
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
            
            $("#nama_customer").html('');
            $("#nama_customer").append('<option value="">Nama Customer</option>');

            $("#unit").change(function(){

                var unit = $('#unit').val();
                var jenis_produk = $('#jenis_produk').val();
                var tanda = $('#tanda').val();

                $("#nama_customer").html('');
                $("#nama_customer").append('<option value="">Nama Customer</option>');

                $.ajax({
                    type: 'GET',
                    dataType:'JSON',
                    url: 'input-kontrak/customer/'+unit+'/'+jenis_produk,

                    success : function(result){ 
                        
                        $("#nama_customer").html(result);
                        
                        if(tanda != ""){
                            $("#nama_customer").val(tanda).trigger("change")
                        }

                    } 

                });
            });
            
            $("#jenis_produk").change(function(){

                var unit = $('#unit').val();
                var jenis_produk = $('#jenis_produk').val();
                var tanda = $('#tanda').val();

                $("#nama_customer").html('');
                $("#nama_customer").append('<option value="">Nama Customer</option>');

                $.ajax({
                    type: 'GET',
                    dataType:'JSON',
                    url: 'input-kontrak/customer/'+unit+'/'+jenis_produk,

                    success : function(result){ 
                        
                        $("#nama_customer").html(result);
                        
                        if(tanda != ""){
                            $("#nama_customer").val(tanda).trigger("change")
                        }

                    } 

                });
            });
            
            //get_customer();
            function get_customer(){
                $.ajax({
                    url: 'input-kontrak/get-customer',
                    success: function(data) {
                        $('#nama_customer').html(data);
                        $("#nama_customer").val("ASGBU0000001").trigger("change");
                    },
                });
            }
            
            get_unit();
        
            function get_unit(){
                $.ajax({
                    url: 'input-kontrak/unit',
                    success: function(data) {
                        $('#unit').html(data);
                    },
                });
            }
            
            $('#btn_modal_kontrak').click(function(){
                $('#judul').html('Tambah Kontrak');
                $('#id_kontrak').val('');
                $('#tanda').val('');
                $('#modal_kontrak').modal('show');
                
                $('#no_kontrak').val('');
                $('#unit').val('').trigger("change");
                $('#jenis_produk').val('').trigger("change");
                $('#nama_customer').val('').trigger("change");
                $('#tgl_periode1').val('');
                $('#tgl_periode2').val('');
            });
            
            cek_selesai();
            
            function cek_selesai(){
                $.ajax({
                    url: 'input-kontrak/selesai',
                    success: function(data) {
                        $('#tabel_kontrak').DataTable().ajax.reload();
                    },
                });
            }
            
            function hapus_kontrak(id){
            
                $.ajax({
                    type: 'GET',
                    dataType:'JSON',
                    url: 'input-kontrak/hapus-kontrak/'+id,

                    success:function(data){

                        if(data.hasil == "dihapus"){

                            Toast.fire({
                                icon: 'error',
                                title: 'Hapus kontrak gagal!, Data tersebut sudah tidak ada.'
                            });

                            $('#tabel_kontrak').DataTable().ajax.reload();

                        }else if(data.hasil == "sukses"){                                    

                            Toast.fire({
                                icon: 'success',
                                title: 'Hapus kontrak berhasil.'
                            });

                            $('#tabel_kontrak').DataTable().ajax.reload();

                        }
                    }
                });

            };
            
            function ubah_kontrak(id){
            
                $.ajax({
                    type: 'GET',
                    dataType:'JSON',
                    url: 'input-kontrak/data-kontrak/'+id,

                    success:function(data){

                        if(data.hasil == "dihapus"){

                            Toast.fire({
                                icon: 'error',
                                title: 'Maaf, data ini sudah tidak ada!'
                            });

                            $('#tabel_kontrak').DataTable().ajax.reload();

                        }else if(data.hasil == "ada"){

                            $("#tanda").val(data.nama_customer);
                            $("#id_kontrak").val(id);
                            $("#no_kontrak").val(data.no_kontrak);
                            $("#tgl_periode1").val(data.per1);
                            $("#tgl_periode2").val(data.per2);
                            
                            $("#unit").val(data.unit).trigger("change");
                            $("#jenis_produk").val(data.jenis_produk).trigger("change");                            
                            
                            $('#judul').html('Ubah Kontrak');

                            $('#modal_kontrak').modal('show');

                        }

                    }
                });
            }
            
            $("#form_kontrak").submit(function(e) {
                // mencegah default submit form
                e.preventDefault();

                //$("#parameter").val("input_supplier");
                //$('#modal_konfirmasi').modal('show');
               
                input_kontrak();

            });

            function input_kontrak(){

                $("#error_no_kontrak").html("");
                $("#error_unit").html("");
                $("#error_jenis_produk").html("");
                $("#error_nama_customer").html("");
                $("#error_tgl_periode1").html("");
                $("#error_tgl_periode2").html("");

                $("#btn_simpan_kontrak").hide();

                // ambil data form dengan serialize
                var dataform = $("#form_kontrak").serialize();
                //alert(dataform);

               $.ajax({
                    url: "<?php echo base_url('input-kontrak/tambah-kontrak')?>",
                    type: "post",
                    data: dataform,
                    success: function(result) {
                        $("#btn_simpan_kontrak").show();
                        $('#tabel_kontrak').DataTable().ajax.reload();

                        var hasil = JSON.parse(result);
                        if (hasil.hasil == "gagal") {

                            //$("#btn_kirim").show();

                            $("#error_no_kontrak").html(hasil.error.no_kontrak);
                            $("#error_tgl_periode1").html(hasil.error.tgl_periode1);
                            $("#error_tgl_periode2").html(hasil.error.tgl_periode2);
                            $("#error_unit").html(hasil.error.unit);
                            $("#error_jenis_produk").html(hasil.error.jenis_produk);
                            $("#error_nama_customer").html(hasil.error.nama_customer);

                        } else if (hasil.hasil == "sukses_tambah") {

                            //$("#btn_kirim").show();

                            Toast.fire({
                                icon: 'success',
                                title: 'Berhasil menambah kontrak'
                            })

                            //$("#no_kontrak").val("");
                            $("#tgl_periode1").val("");
                            $("#tgl_periode2").val("");
                            $("#id_kontrak").val("");
                            //$("#unit").val("").trigger("change");
                            //$("#jenis_produk").val("").trigger("change");
                            //$("#nama_customer").val("").trigger("change");

                            //$('#modal_kontrak').modal("hide");

                        }else if (hasil.hasil == "sukses_ubah") {

                            //$("#btn_kirim").show();

                            Toast.fire({
                                icon: 'success',
                                title: 'Berhasil merubah kontrak'
                            })

                            $("#no_kontrak").val("");
                            $("#tgl_periode1").val("");
                            $("#tgl_periode2").val("");
                            $("#id_kontrak").val("");
                            $("#unit").val("").trigger("change");
                            $("#jenis_produk").val("").trigger("change");
                            $("#nama_customer").val("").trigger("change");

                            $('#modal_kontrak').modal("hide");

                        }
                    }
                });

            }
            
            //------------------------------------------------------------------        
                
        </script>        
        
    </body>
</html>

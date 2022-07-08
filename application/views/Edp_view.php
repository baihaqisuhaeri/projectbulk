<!DOCTYPE html>
<html lang="en">
    
    <?php $this->load->view('material/Head_view');?>

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
                                <h1 class="m-0 text-dark">Administrator</h1>
                            </div><!-- /.col -->
                            <!--<div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="halaman-utama">Halaman Utama</a></li>
                                    <li class="breadcrumb-item active">Administrator</li>
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
                        <div class="row" id="data">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Pengguna</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary mb-2" id="btn_modal_pengguna"><i class="fas fa-plus-circle"></i></button>
                                        <table id="tabel_administrator" class="table table-bordered table-striped" style="font-size: 10pt;">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Role</th>
                                                    <th>No HP</th>
                                                    <th>E-maill</th>
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
                        
                        <div class="row" id="bagian_hak_akses">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Hak Akses</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" id="tutup" onclick="tutup()"><i class="fas fa-times"></i></button>
                                          </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <input class="form-control" type="hidden" name="username_hak_akses" id="username_hak_akses">
                                            </div>                                                                                        
                                        </div>
                                        <h5>Hak akses <span id="penerima_hak_akses"></span></h5>
                                        <table id="tabel_hak_akses" class="table table-bordered table-striped" style="font-size: 10pt;">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kode Unit</th>
                                                    <th>Nama unit</th>
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
                    <div class="modal fade" id="modal_pengguna">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><span id="judul"></span></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                    <form id="form_pengguna">
                                        
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label>Nama<span style="color: red;">*</span></label>
                                                <input class="form-control" type="text" name="nama" id="nama" placeholder="nama pengguna">
                                                <span class="text-danger" id="error_nama"></span>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>username<span style="color: red;">*</span></label>
                                                <input class="form-control" type="text" name="username" id="username" placeholder="username">
                                                <span class="text-danger" id="error_username"></span>                                    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label>Password<span style="color: red;">*</span></label>
                                                <input class="form-control" type="password" name="password" id="password" placeholder="password">
                                                <span class="text-danger" id="error_password"></span>                                    
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Role<span style="color: red;">*</span></label>
                                                <select class="form-control select2" id="role" name="role">
                                                    <option value="">-</option>
                                                    <option value="administrator">Administrator</option>
                                                    <option value="dir">Direktorat</option>
                                                    <option value="gm">GM</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                                <span class="text-danger" id="error_role"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label>No HP<span style="color: red;">*</span></label>
                                                <input class="form-control" type="text" name="no_hp" id="no_hp" placeholder="no hp">
                                                <span class="text-danger" id="error_no_hp"></span>                                    
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>E-mail<span style="color: red;">*</span></label>
                                                <input class="form-control" type="email" name="email" id="email" placeholder="e-mail">
                                                <span class="text-danger" id="error_email"></span>                                    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12">
                                                <input class="form-control" type="hidden" name="id" id="id">
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
            
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
              theme: 'bootstrap4'
            });
            
            //datatables
            $('#tabel_administrator').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "responsive": true,
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Edp/ajax_list')?>",
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
        
            $('#tabel_hak_akses').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "responsive": true,
                "order": [], //Initial no order.

                "ajax": {
                    "url": "<?php echo site_url('Hak_akses/ajax_list')?>",
                    "type": "POST",
                    "data": function ( data ) {
                        data.username = $('#username_hak_akses').val();
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
        
        function tutup(){
            $("#data").slideDown("slow");
            $("#bagian_hak_akses").slideUp("slow");
        }
        
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 7000
        });
        
        <?php
        if(isset($_SESSION['success'])){
        ?>
            Toast.fire({
              icon: 'success',
              title: '<?php echo $_SESSION['success']; ?>'
            })
        <?php
            $this->session->unset_userdata('success');
        }
        ?>
        
        function hapus_hak_akses(kode_unit,nama_unit,nama){
            
            $.ajax({
                type : "POST",
                url: "<?php echo base_url('Edp/hapus_hak_akses')?>",
                dataType : "JSON",
                data: {kode_unit:kode_unit,nama_unit:nama_unit,nama:nama},            
                success: function(data){
                    $('#tabel_hak_akses').DataTable().ajax.reload();
                }
            });
            
        }
        
        function tambah_hak_akses(kode_unit,nama_unit,nama){
            
            $.ajax({
                type : "POST",
                url: "<?php echo base_url('Edp/tambah_hak_akses')?>",
                dataType : "JSON",
                data: {kode_unit:kode_unit,nama_unit:nama_unit,nama:nama},            
                success: function(data){
                    $('#tabel_hak_akses').DataTable().ajax.reload();
                }
            });
            
        }
        
        $("#bagian_hak_akses").hide();
        function hak_akses(username){
                        
            $('#username_hak_akses').val(username);
            $("#data").slideUp("slow");
            $("#bagian_hak_akses").slideDown("slow");
            $("#penerima_hak_akses").html(username);
            $('#tabel_hak_akses').DataTable().ajax.reload();
            
        }
        
        $("#nama").on("keyup", function(e){
            if(e.keyCode !== 13){
                $("#error_nama").html('');
            }
        });
        
        $("#username").on("keyup", function(e){
            if(e.keyCode !== 13){
                $("#error_username").html('');
            }
        });
        
        $("#password").on("keyup", function(e){
            if(e.keyCode !== 13){
                $("#error_password").html('');
            }
        });
        
        $("#role").on("change", function(e){
            if(e.keyCode !== 13){
                $("#error_role").html('');
            }
        });
        
        $("#no_hp").on("keyup", function(e){
            if(e.keyCode !== 13){
                $("#error_no_hp").html('');
            }
        });
        
        $("#email").on("keyup", function(e){
            if(e.keyCode !== 13){
                $("#error_email").html('');
            }
        });
        
        $("#form_hapus").submit(function(e) {
            // mencegah default submit form
            e.preventDefault();            
            
            $("#btn_hapus").hide();
            var id = $("#id_hapus").val();
            
            $.ajax({
                type: 'GET',
                dataType:'JSON',
                url: 'Edp/hapus_data_pengguna/'+id,

                success:function(data){
                    
                    $('#id_hapus').val("");
                    $('#modal_konfirmasi_hapus').modal('hide');
                                        
                    if(data.hasil == "dihapus"){

                        Toast.fire({
                            icon: 'error',
                            title: 'Hapus data pengguna gagal!, Data tersebut sudah tidak ada.'
                        });
                        
                        $('#tabel_administrator').DataTable().ajax.reload();
                        $("#btn_hapus").show();

                    }else if(data.hasil == "sukses"){                                    

                        Toast.fire({
                            icon: 'success',
                            title: 'Hapus data pengguna berhasil.'
                        });
                        
                        $('#tabel_administrator').DataTable().ajax.reload();
                        $("#btn_hapus").show();

                    }
                }
            });
            
        });        
        
        function hapus_data_pengguna(id){

            $('#id_hapus').val(id);
            $('#modal_konfirmasi_hapus').modal('show');

        }
        
        function ubah_user(id){
            
            $.ajax({
                type: 'GET',
                dataType:'JSON',
                url: 'Edp/get_data_pengguna/'+id,

                success:function(data){
                    
                    if(data.hasil == "dihapus"){
                        
                        Toast.fire({
                            icon: 'error',
                            title: 'Maaf, data ini sudah tidak ada!'
                        });
                                                
                        $('#tabel_administrator').DataTable().ajax.reload();
                        
                    }else if(data.hasil == "ada"){
                        
                        $("#id").val(id);
                        $("#nama").val(data.nama);
                        $("#username").val(data.username);
                        $("#role").val(data.role).trigger("change");
                        $("#no_hp").val(data.no_hp);
                        $("#email").val(data.email);
                        $('#judul').html('Ubah Pengguna');
                        
                        $('#modal_pengguna').modal('show');
                        
                    }
                    
                }
            });
        }
        
        $("#form_pengguna").submit(function(e) {
            // mencegah default submit form
            e.preventDefault();
            
            $("#error_nama").html("");
            $("#error_username").html("");
            $("#error_password").html("");
            $("#error_role").html("");
            $("#error_no_hp").html("");
            $("#error_email").html("");
            
            $("#btn_simpan_pengguna").hide();
            
            // ambil data form dengan serialize
            var dataform = $("#form_pengguna").serialize();
            
            $.ajax({
                url: "<?php echo base_url('Edp/simpan')?>",
                type: "post",
                data: dataform,
                success: function(result) {
                    var hasil = JSON.parse(result);
                    if (hasil.hasil == "gagal") {
                        
                        $("#btn_simpan_pengguna").show();
                        
                        $("#error_nama").html(hasil.error.nama);
                        $("#error_username").html(hasil.error.username);
                        $("#error_password").html(hasil.error.password);
                        $("#error_role").html(hasil.error.role);
                        $("#error_no_hp").html(hasil.error.no_hp);
                        $("#error_email").html(hasil.error.email);
                        
                    } else {
                        
                        if (hasil.hasil == "sukses_tambah") {
                            
                            $("#btn_simpan_pengguna").show();
                            
                            Toast.fire({
                                icon: 'success',
                                title: 'Anda berhasil menambahkan pengguna'
                            });
                            
                            $("#id").val("");
                            $("#nama").val("");
                            $("#username").val("");
                            $("#password").val("");
                            $("#role").val("");
                            $("#no_hp").val("");
                            $("#email").val("");
                            
                            $('#tabel_administrator').DataTable().ajax.reload();
                            
                        }else if (hasil.hasil == "sukses_ubah") {
                            
                            $("#btn_simpan_pengguna").show();
                            
                            Toast.fire({
                                icon: 'success',
                                title: 'Anda berhasil mengubah pengguna'
                            });
                            
                            $("#id").val("");
                            $("#nama").val("");
                            $("#username").val("");
                            $("#password").val("");
                            $("#role").val("");
                            $("#no_hp").val("");
                            $("#email").val("");
                            
                            $('#tabel_administrator').DataTable().ajax.reload();
                            $('#modal_pengguna').modal('hide');
                            
                        }
                        
                    }
                }
            });
        });
        
        $('#btn_modal_pengguna').click(function(){
            $('#judul').html('Tambah Pengguna');
            $('#id').val('');
            $('#modal_pengguna').modal('show');
        });
        
        </script>
        
    </body>
</html>

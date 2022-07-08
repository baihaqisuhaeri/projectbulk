<!DOCTYPE html>
<html>
    
    <?php $this->load->view('material/Head_view');?>
    
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="<?php echo base_url(); ?>assets/images/jti.png" height="60px" alt="JTI Logo">
                <h2>Input Customer</h2>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Masuk untuk memulai aplikasi</p>

                    <form id="form_login">
                        
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            <span class="text-danger" id="error_username"></span>
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <span class="text-danger" id="error_password"></span>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" id="btn_login">Masuk</button>
                        </div>
                    </form>

                </div>
              <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        
        <?php $this->load->view('material/Jquery_view');?>
        
        <script type="text/javascript">
        
        $("#form_login").submit(function(e) {
            // mencegah default submit form
            e.preventDefault();

            // ambil data form dengan serialize
            var dataform = $("#form_login").serialize();
            
            $.ajax({
                url: "<?php echo base_url('Login/masuk')?>",
                type: "post",
                data: dataform,
                success: function(result) {
                    var hasil = JSON.parse(result);
                    
                    if (hasil.hasil !== "sukses") {
                        // tampilkan pesan error
                        $("#error_username").html(hasil.error.username);
                        $("#error_password").html(hasil.error.password);
                        
                    } else {
                        // kosongkan lagi error form
                        $("#username").val('');
                        $("#password").val('');
                        window.location.replace('input-customer');
                    }
                }
            });
        });
        
        //======================================================================
        
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
        
        </script>
        
    </body>
</html>

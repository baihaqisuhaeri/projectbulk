<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="halaman-utama" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/images/jti_icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 12pt;">PT Jaya Trade Indonesia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/images/student.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['nama']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <?php
                    if ($this->uri->segment(1) == "input-customer") {
                        echo '<a href="input-customer" class="nav-link active">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Input Customer
                                </p>
                            </a>';
                    } else {
                        echo '<a href="input-customer" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Input Customer
                                </p>
                            </a>';
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if ($this->uri->segment(1) == "data-customer") {
                        echo '<a href="data-customer" class="nav-link active">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Data Customer
                                </p>
                            </a>';
                    } else {
                        echo '<a href="data-customer" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Data Customer
                                </p>
                            </a>';
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if ($this->uri->segment(1) == "input-kontrak") {
                        echo '<a href="input-kontrak" class="nav-link active">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Kontrak
                                </p>
                            </a>';
                    } else {
                        echo '<a href="input-kontrak" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Kontrak
                                </p>
                            </a>';
                    }
                    ?>
                </li>

                <?php
                if ($_SESSION['role'] == "administrator") {

                    if ($this->uri->segment(1) == "pengaturan") {
                        echo '<li class="nav-item">
                                <a href="pengaturan" class="nav-link active">
                                    <i class="nav-icon fas fa-wrench"></i>
                                    <p>
                                        Pengaturan
                                    </p>
                                </a>
                            </li>';
                    } else {
                        echo '<li class="nav-item">
                                <a href="pengaturan" class="nav-link">
                                    <i class="nav-icon fas fa-wrench"></i>
                                    <p>
                                        Pengaturan
                                    </p>
                                </a>
                            </li>';
                    }
                }
                ?>




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Bulk
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <?php
                            if ($this->uri->segment(1) == "barang") {
                                echo '<a href="barang" class="nav-link active">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Barang
                                </p>
                            </a>';
                            } else {
                                echo '<a href="barang" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Barang
                                </p>
                            </a>';
                            }
                            ?>
                        </li>

                        <li class="nav-item">
                            <?php
                            if ($this->uri->segment(1) == "mobil") {
                                echo '<a href="mobil" class="nav-link active">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Mobil
                                </p>
                            </a>';
                            } else {
                                echo '<a href="mobil" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Mobil
                                </p>
                            </a>';
                            }
                            ?>
                        </li>

                        <li class="nav-item">
                            <?php
                            if ($this->uri->segment(1) == "supir") {
                                echo '<a href="supir" class="nav-link active">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Supir
                                </p>
                            </a>';
                            } else {
                                echo '<a href="supir" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Supir
                                </p>
                            </a>';
                            }
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>



        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
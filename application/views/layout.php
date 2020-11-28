<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>SampleIn | <?= ucwords($this->uri->segment(1)); ?></title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/fontawesome-free/css/all.min.css' ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/dist/css/adminlte.min.css' ?>">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/sweetalert2/dark.css' ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/toastr/toastr.min.css' ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' ?>">
    <!-- Select 2 -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/select2/css/select2.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css' ?>">


    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/datatables-buttons/css/buttons.dataTables.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url() . 'assets/plugins/jquery/jquery.min.js' ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() . 'assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() . 'assets/dist/js/adminlte.min.js' ?>"></script>
    <!-- Sweetalert -->
    <script src="<?= base_url() . 'assets/plugins/sweetalert2/sweetalert2.min.js' ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url() . 'assets/plugins/toastr/toastr.min.js' ?>"></script>
    <!-- DataTables -->
    <script src="<?= base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/plugins/datatables-responsive/js/dataTables.responsive.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/plugins/datatables-buttons/js/dataTables.buttons.min.js' ?>"></script>
    <!-- Select 2 -->
    <script src="<?= base_url() . 'assets/plugins/select2/js/select2.full.min.js' ?>"></script>
</head>

<body class="hold-transition sidebar-mini accent-navy layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand  navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?><?= $this->uri->segment(1) == '' ? 'active' : '' ?>">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('profile') ?>" class="nav-link <?= $this->uri->segment(1) == 'profile' ? 'active' : '' ?>">Profile</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" data-toggle="modal" data-target="#logoutModal" class="nav-link">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url() . 'assets/dist/img/logo.png' ?>" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
                <span class="brand-text font-weight-light"><b>Sample</b>In</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() . 'assets/dist/img/user.jpg' ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= ucwords($this->session->userdata('name')); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'permintaan' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p>
                                    Permintaan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php if ($this->session->userdata('role') == 2) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url('permintaan/create') ?>" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Buat permintaan</p>
                                        </a>
                                    </li>
                                <?php } ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('permintaan') ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List permintaan</p>
                                    </a>
                                </li>
                                <?php if ($this->session->userdata('role') == 3) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url('permintaan/accepted') ?>" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Permintaan diterima</p>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Laporan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Active Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inactive Page</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if ($this->session->userdata('role') == 1 or $this->session->userdata('role') == 2) { ?>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link <?= $this->uri->segment(1) == 'customer' ? 'active' : '' ?> <?= $this->uri->segment(1) == 'user' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Data Master
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url() . 'customer' ?>" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Master Customer</p>
                                        </a>
                                    </li>
                                    <?php if ($this->session->userdata('role') == 1) { ?>

                                        <li class="nav-item">
                                            <a href="<?= base_url('user') ?>" class="nav-link ">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Master User</p>
                                            </a>
                                        </li>
                                    <?php } ?>

                                </ul>

                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $contents ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                <a href="https://gisaka.net/" target="_blank">GisakaNet</a> made with <span class="fas fa-heart fa-xs"></span>
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <?= date('Y') ?> <a href="https://github.com/aderahmatn/SampleIn" target="_blank">SampleIn</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= site_url('auth/logout') ?>">Logout <i class="fas fa-sign-out-alt fa-sm"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Alert Config -->
    <script type="text/javascript">
        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000
            });
            <?php if ($this->session->flashdata('success')) { ?>
                Toast.fire({
                    icon: 'success',
                    title: '<?= $this->session->flashdata('success'); ?>'
                });
            <?php } else if ($this->session->flashdata('error')) {  ?>
                Toast.fire({
                    icon: 'error',
                    title: '<?= $this->session->flashdata('error'); ?>'
                });
            <?php } else if ($this->session->flashdata('warning')) {  ?>
                Toast.fire({
                    icon: 'warning',
                    title: '<?= $this->session->flashdata('warning'); ?>'
                });
            <?php } else if ($this->session->flashdata('info')) {  ?>
                Toast.fire({
                    icon: 'info',
                    title: '<?= $this->session->flashdata('info'); ?>'
                });
            <?php } ?>
        });
    </script>
</body>

</html>
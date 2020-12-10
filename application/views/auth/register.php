<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SimpleIn | Daftar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/fontawesome-free/css/all.min.css' ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css' ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/dist/css/adminlte.min.css' ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <img src="<?= base_url() . 'assets/dist/img/logo.png' ?>" alt="AdminLTE Logo" class="brand-image " style="width: 80px;">

            <a href="../../index2.html">Sample<b>In</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Daftarkan user baru </p>

                <form action="" method="post" autocomplete="off">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="mb-3">
                        <div class="input-group <?= form_error('fnama') ? 'is-invalid' : '' ?> ">
                            <input type="text" class="form-control <?= form_error('fnama') ? 'is-invalid' : '' ?>" placeholder="Nama lengkap" name="fnama" value="<?= set_value('fnama') ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?php echo form_error('fnama'); ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group <?= form_error('fnik') ? 'is-invalid' : '' ?>">
                            <input type="text" class="form-control <?= form_error('fnik') ? 'is-invalid' : '' ?>" placeholder="Nomor induk" value="<?= set_value('fnik') ?>" name="fnik">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-credit-card"></span>
                                </div>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?php echo form_error('fnik'); ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group <?= form_error('femail') ? 'is-invalid' : '' ?>">
                            <input type="email" class="form-control <?= form_error('femail') ? 'is-invalid' : '' ?>" placeholder="Email" value="<?= set_value('femail') ?>" name="femail">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?php echo form_error('femail'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group <?= form_error('fusername') ? 'is-invalid' : '' ?>">
                            <input type="text" class="form-control <?= form_error('fusername') ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= set_value('fusername') ?>" name="fusername">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?php echo form_error('fusername'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group <?= form_error('fpassword') ? 'is-invalid' : '' ?>">
                            <input type="password" class="form-control <?= form_error('fpassword') ? 'is-invalid' : '' ?>" placeholder="Password" name="fpassword">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?php echo form_error('fpassword'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group <?= form_error('fconfpassword') ? 'is-invalid' : '' ?>">
                            <input type="password" class="form-control <?= form_error('fconfpassword') ? 'is-invalid' : '' ?>" placeholder="Konfirm  password" name="fconfpassword">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?php echo form_error('fconfpassword'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group <?= form_error('frole') ? 'is-invalid' : '' ?>">
                            <select name="frole" id="role" class="form-control <?= form_error('frole') ? 'is-invalid' : '' ?>" name="frole">
                                <option selected hidden value="">-- Pilih role --</option>
                                <option value="2" <?= set_value('frole') == "2" ? "selected" : '' ?>>Sales</option>
                                <option value="3" <?= set_value('frole') == "3" ? "selected" : '' ?>>Produk Dev</option>
                                <option value="4" <?= set_value('frole') == "4" ? "selected" : '' ?>>Engineering - SS/SO</option>
                                <option value="5" <?= set_value('frole') == "5" ? "selected" : '' ?>>Engineering - PJM</option>
                                <option value="6" <?= set_value('frole') == "6" ? "selected" : '' ?>>Engineering - SS/ET</option>
                                <option value="7" <?= set_value('frole') == "7" ? "selected" : '' ?>>Engineering - ADR Shanghai</option>
                                <option value="1" <?= set_value('frole') == "1" ? "selected" : '' ?>>Administrator</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user-tag"></span>
                                </div>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?php echo form_error('frole'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url() . 'assets/plugins/jquery/jquery.min.js' ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() . 'assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() . 'assets/dist/js/adminlte.min.js' ?>"></script>
</body>

</html>
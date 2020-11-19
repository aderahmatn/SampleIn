<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url() . 'assets/dist/img/profile-blank.png' ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= ucwords($user->nama) ?></h3>

                        <p class="text-muted text-center">
                            <?php
                            if ($user->role == 1) {
                                echo "Admin";
                            } elseif ($user->role == 2) {
                                echo "Sales";
                            } elseif ($user->role == 3) {
                                echo "Product Development";
                            } elseif ($user->role == 4) {
                                echo "Engneering";
                            }
                            ?>
                        </p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>NIK</b> <a class="float-right"><?= $user->nik ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right"><?= $user->email ?></a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b><i class="fas fa-cogs"></i> Setting</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-9">
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tentang saya</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-home mr-1"></i> Departemen</strong>

                        <p class="text-muted">
                            <?php
                            if ($user->role == 1) {
                                echo "Admin";
                            } elseif ($user->role == 2) {
                                echo "Sales";
                            } elseif ($user->role == 3) {
                                echo "Product Development";
                            } elseif ($user->role == 4) {
                                echo "Engneering";
                            }
                            ?>
                        </p>

                        <hr>

                        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                        <p class="text-muted"><?= $user->email ?></p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
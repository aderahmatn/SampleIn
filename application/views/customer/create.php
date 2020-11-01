<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Customer</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item "><a href="<?= base_url() . 'customer' ?>">Master Customer</a></li>
                    <li class="breadcrumb-item active">Tambah Customer</li>
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
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-outline card-secondary">
                    <!-- form start -->
                    <form role="form" method="POST" action="" autocomplete="off">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fcustomer">Customer</label>
                                <input type="text" class="form-control <?= form_error('fcustomer') ? 'is-invalid' : '' ?>" id="fcustomer" name="fcustomer" placeholder="Nama customer">
                                <div class="invalid-feedback">
                                    <?= form_error('fcustomer') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ftelp">Telpon Customer</label>
                                <input type="text" class="form-control <?= form_error('ftelp') ? 'is-invalid' : '' ?>" id="ftelp" name="ftelp" placeholder="Nomor telpon">
                                <div class="invalid-feedback">
                                    <?= form_error('ftelp') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fpicsales">PIC Sales</label>
                                <input type="text" name="fpicsales" value="<?= $this->session->userdata('nik'); ?>" hidden>
                                <input type="text" value="<?= $this->session->userdata('name'); ?>" class="form-control" readonly>
                                <div class="invalid-feedback">
                                    <?= form_error('fpicsales') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="falamat">Alamat</label>
                                <textarea name="falamat" id="falamat" rows="4" class="form-control <?= form_error('falamat') ? 'is-invalid' : '' ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('falamat') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fnegara">Negara</label>
                                <select name="fnegara" id="fnegara" class="custom-select <?= form_error('fnegara') ? 'is-invalid' : '' ?>">
                                    <option selected hidden value="">-- Pilih negara -- </option>
                                    <option value="indonesia">indonesia</option>
                                    <option value="banglades">banglades</option>
                                    <option value="jerman">jerman</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('fnegara') ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
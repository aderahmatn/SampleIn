<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Buat Permintaan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Buat Permintaan</li>
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
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-outline card-secondary">
                    <!-- form start -->
                    <form role="form" method="POST" action="" autocomplete="off">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fno">Nomor Permintaan</label>
                                        <input type="text" class="form-control <?= form_error('fno') ? 'is-invalid' : '' ?>" id="fno" name="fno" value="<?= sprintf("%03s", $noreq) . "/" . romawi_bulan(date('m')) . "/" . date("Y") . "/" . "MKT" ?>" readonly>
                                        <div class="invalid-feedback">
                                            <?= form_error('fno') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ftgl">Tanggal</label>
                                        <input type="date" class="form-control <?= form_error('ftgl') ? 'is-invalid' : '' ?>" id="ftgl" name="ftgl" placeholder="Nama customer">
                                        <div class="invalid-feedback">
                                            <?= form_error('ftgl') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fcustomer">Customer</label>
                                        <select name="fcustomer" id="fcustomer" class="form-control custom-form <?= form_error('fcustomer') ? 'is-invalid' : '' ?>" name="fcustomer">
                                            <option selected hidden value="">-- Pilih Customer --</option>
                                            <?php foreach ($customer as $dt) { ?>
                                                <option value="<?= $dt->idCustomer ?>" <?= set_value('fcustomer') == "<?= $dt->idCustomer ?>" ? "selected" : '' ?>><?= $dt->customer ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('frole'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fsales">Sales</label>
                                        <input type="text" class="form-control <?= form_error('fsales') ? 'is-invalid' : '' ?>" id="fsales" name="fsales" placeholder="Nomor telpon">
                                        <div class="invalid-feedback">
                                            <?= form_error('fsales') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-md-3"><strong>Nama Produk</strong></div>
                                <div class="col-md-2"><strong>Part No.</strong></div>
                                <div class="col-md-2"><strong>Brand</strong></div>
                                <div class="col-md-1"><strong>Qty</strong></div>
                                <div class="col-md-2"><strong>Permintaan</strong></div>
                                <div class="col-md-1"><strong>Due Date</strong></div>
                                <div class="col-md-1"><a class="btn btn-success btn-block" id="btnAdd"><i class="fa fa-plus"></i></a></div>
                            </div>
                            <div id="products">
                                <div class="product row" id="entry1">
                                    <div class="col-md-3 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control <?= form_error('fproduct') ? 'is-invalid' : '' ?>" id="fproduct" name="fproduct[]" placeholder="Nama produk">
                                            <div class="invalid-feedback">
                                                <?= form_error('fproduct') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control <?= form_error('fpartno') ? 'is-invalid' : '' ?>" id="fpartno" name="fpartno[]" placeholder="Part nomor">
                                            <div class="invalid-feedback">
                                                <?= form_error('fpartno') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control <?= form_error('fbrand') ? 'is-invalid' : '' ?>" id="fbrand" name="fbrand[]" placeholder="Brand produk">
                                            <div class="invalid-feedback">
                                                <?= form_error('fbrand') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control <?= form_error('fqty') ? 'is-invalid' : '' ?>" id="fqty" name="fqty[]" placeholder="Qty">
                                            <div class="invalid-feedback">
                                                <?= form_error('fqty') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control <?= form_error('fpermintaan') ? 'is-invalid' : '' ?>" id="fpermintaan" name="fpermintaan[]" placeholder="Permintaan">
                                            <div class="invalid-feedback">
                                                <?= form_error('fpermintaan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 mb-2">
                                        <div class="form-group">
                                            <input type="date" class="form-control <?= form_error('fduedate') ? 'is-invalid' : '' ?>" id="fduedate" name="fduedate[]" placeholder="Due date">
                                            <div class="invalid-feedback">
                                                <?= form_error('fduedate') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 mb-2"><a class="btn btn-danger btn-block" id="btnDel"><i class="fa fa-trash"></i></a></div>
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
<script>
    //define template
    var template = $('#products .product:first').clone();

    //define counter
    var sectionsCount = 1;

    //add new section
    $('body').on('click', '#btnAdd', function() {

        //increment
        sectionsCount++;

        //loop through each input
        var section = template.clone().find(':input').each(function() {

                //set id to store the updated section number
                var newId = this.id + sectionsCount;

                //update for label
                $(this).prev().attr('for', newId);

                //update id
                this.id = newId;

            }).end()

            //inject new section
            .appendTo('#products');
        return false;
    });
    //remove section
    $('#products').on('click', '#btnDel', function() {
        //fade out section
        $(this).parent().fadeOut(300, function() {
            //remove parent element (main section)
            $(this).parent().empty();
            return false;
        });
        return false;
    });
</script>
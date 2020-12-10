<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Permintaan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Edit Permintaan</li>
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
                    <form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <input type="hidden" name="fid" value="<?= uniqid('req') ?>" style="display: none">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fno">Nomor Permintaan</label>
                                        <input type="text" class="form-control <?= form_error('fno') ? 'is-invalid' : '' ?>" id="fno" name="fno" readonly>
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
                                    <div class="form-group">
                                        <label for="fnote">Note</label>
                                        <input type="text" class="form-control <?= form_error('fnote') ? 'is-invalid' : '' ?>" id="fnote" name="fnote" placeholder="Note">
                                        <div class="invalid-feedback">
                                            <?= form_error('fnote') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fsales">Sales</label>
                                        <input type="text" class="form-control <?= form_error('fsales') ? 'is-invalid' : '' ?>" id="fsales" name="fsales" value="<?= ucwords($this->session->userdata('name')); ?>" readonly>
                                        <input type="hidden" class="form-control" id="fnik" name="fnik" value="<?= $this->session->userdata('nik'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="fcustomer">Customer</label>
                                        <select name="fcustomer" id="fcustomer" class="form-control custom-form <?= form_error('fcustomer') ? 'is-invalid' : '' ?>" name="fcustomer">
                                            <option selected hidden value="">-- Pilih Customer --</option>
                                            <?php foreach ($customer as $dt) { ?>
                                                <option value="<?= $dt->idCustomer ?>" <?= set_value('fcustomer') == "<?= $dt->idCustomer ?>" ? "selected" : '' ?>><?= $dt->customer ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('fcustomer'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-md-2"><strong>Nama Produk</strong></div>
                                <div class="col-md-2"><strong>Part No.</strong></div>
                                <div class="col-md-2"><strong>Brand</strong></div>
                                <div class="col-md-1"><strong>Qty</strong></div>
                                <div class="col-md-2"><strong>Permintaan</strong></div>
                                <div class="col-md-2"><strong>Due Date</strong></div>
                                <div class="col-md-1"><a class="btn btn-success btn-block" id="btnAdd"><i class="fa fa-plus"></i></a></div>
                            </div>
                            <div id="products">
                                <div class="product row" id="entry1">
                                    <div class="col-md-2 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control <?= form_error('fproduct[]') ? 'is-invalid' : '' ?>" id="fproduct" name="fproduct[]" placeholder="Nama produk">
                                            <div class="invalid-feedback">
                                                <?= form_error('fproduct[]') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control <?= form_error('fpartno[]') ? 'is-invalid' : '' ?>" id="fpartno" name="fpartno[]" placeholder="Part nomor">
                                            <div class="invalid-feedback">
                                                <?= form_error('fpartno[]') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control <?= form_error('fbrand[]') ? 'is-invalid' : '' ?>" id="fbrand" name="fbrand[]" placeholder="Brand produk">
                                            <div class="invalid-feedback">
                                                <?= form_error('fbrand[]') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control <?= form_error('fqty[]') ? 'is-invalid' : '' ?>" id="fqty" name="fqty[]" placeholder="Qty">
                                            <div class="invalid-feedback">
                                                <?= form_error('fqty[]') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-group">
                                            <select class="select2 select2-hidden-accessible <?= form_error('fpermintaan[]') ? 'is-invalid' : '' ?>" name="fpermintaan1[]" id="fpermintaan" multiple="" data-placeholder=" Pilih permintaan" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true" autocomplete="off">
                                                <option value="1">Gambar</option>
                                                <option value="2">MCC</option>
                                                <option value="3">FP3B</option>
                                                <option value="4">Test Lab</option>
                                                <option value="5">Sample</option>
                                                <option value="6">Compare</option>
                                            </select>

                                            <div class="invalid-feedback">
                                                <?php echo form_error('fpermintaan[]'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-group">
                                            <input type="date" class="form-control <?= form_error('fduedate[]') ? 'is-invalid' : '' ?>" id="fduedate" name="fduedate[]" placeholder="Due date">
                                            <div class="invalid-feedback">
                                                <?= form_error('fduedate[]') ?>
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
    // select 2
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
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
                if (this.id == 'fpermintaan' + sectionsCount) {
                    this.name = "fpermintaan" + sectionsCount + "[]"
                }

            }).end()
            //inject new section
            .appendTo('#products');
        $('.select2').select2({
            theme: 'bootstrap4'
        });
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
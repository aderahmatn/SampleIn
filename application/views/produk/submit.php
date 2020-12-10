<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Submit Hasil</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item "><a href="<?= base_url('produk') ?>">List Sample</a></li>
                    <li class=" breadcrumb-item active">Submit result</li>
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
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    Detail Sample
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <strong>Part No : </strong>
                                <?= $produk->partNo ?> <br>
                                <strong>Nama Produk : </strong>
                                <?= $produk->namaProduk ?> <br>
                                <strong>Brand : </strong>
                                <?= $produk->brand ?> <br>
                                <strong>Aplikasi : </strong>
                                <?= $produk->aplikasi ?> <br>
                                <strong>Quantity : </strong>
                                <?= $produk->qty ?>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <strong>No Permintaan : </strong>
                                <?= $produk->noPermintaan ?> <br>
                                <strong>Customer : </strong>
                                <?= $produk->customer ?> <br>
                                <strong>Sales : </strong>
                                <?= $produk->nama ?> <br>
                                <strong>Permintaan :</strong>
                                <?php
                                $data = $produk->permintaan;
                                $req = explode("/", $data);
                                for ($i = 0; $i < count($req); $i++) {
                                    switch ($req[$i]) {
                                        case 1:
                                            echo '<span class="badge badge-secondary mr-1">Gambar</span>';
                                            break;
                                        case 2:
                                            echo '<span class="badge badge-secondary mr-1">MCC</span>';
                                            break;
                                        case 3:
                                            echo '<span class="badge badge-secondary mr-1">FP3B</span>';
                                            break;
                                        case 4:
                                            echo '<span class="badge badge-secondary mr-1">Test Lab</span>';
                                            break;
                                        case 5:
                                            echo '<span class="badge badge-secondary mr-1">Sample</span>';
                                            break;
                                        case 6:
                                            echo '<span class="badge badge-secondary mr-1">Compare</span>';
                                            break;
                                    }
                                }
                                ?> <br>
                                <strong>Due Date :</strong>
                                <?= date_indo($produk->duedate) ?>
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <strong>Foto Produk</strong><br>
                                <a href="" data-toggle="modal" data-target="#fotoProduk">
                                    <img src="<?= base_url() . 'upload/product/' . $produk->foto ?>" alt="..." class="img-thumbnail" width="100">
                                </a>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <hr>
                        <form method="POST" action="<?= base_url('produk/process_file') ?>" autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <input type="text" name="fidproduk" value="<?= $produk->idProduk ?>" style="display: none">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="ffile">File Hasil Permintaan</label>
                                        <input type="file" class="form-control-file <?= form_error('ffile') ? 'is-invalid' : '' ?> form-control-sm" id="ffile" name="ffile" required>
                                        <div class="invalid-feedback">
                                            <?= form_error('ffile') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                        <!-- end form file hasil -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.content -->
</div>
<!-- Modal -->
<div class="modal fade" id="fotoProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="<?= base_url() . 'upload/product/' . $produk->foto ?>" alt="..." class="img-thumbnail">
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-exclamation-triangle" style="font-size: 70px; color:red;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>
                        <span>Data yang dihapus tidak akan bisa dikembalikan.</span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#"> Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirm -->
<script type="text/javascript">
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>

<!-- Datatables Config -->
<?php if ($this->session->userdata('role') == 2) { ?>
    <script type="text/javascript">
        $(function() {
            $("#customer").DataTable({
                "responsive": true,
                "autoWidth": true,
                "info": false,
                "lengthChange": false,
                "scrollY": 400,
                "paging": false,
                dom: 'Bfrtip',
                buttons: [{
                    text: 'Buat Permintaan',
                    action: function() {
                        window.location.href = "permintaan/create"
                    }
                }]
            });
        });
    </script>
<?php } else { ?>
    <!-- Datatables Config -->
    <script type="text/javascript">
        $(function() {
            $("#customer").DataTable({
                "responsive": true,
                "autoWidth": true,
                "info": false,
                "lengthChange": false,
                "paging": false,
            });
        });
    </script>
<?php } ?>
<!-- End Datatables Config -->
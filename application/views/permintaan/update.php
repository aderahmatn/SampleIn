<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Permintaan <span class="text-muted text-md"><?= $detail->noPermintaan ?></span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('permintaan') ?>">List permintaan</a></li>
                    <li class="breadcrumb-item active">Update permintaan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="invoice p-3 mb-3">

            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong>Customer :</strong><br>
                        <?= ucwords($detail->customer) ?><br>
                        <?= ucwords($detail->alamat) ?><br>
                        Phone: <?= ucwords($detail->telpon) ?><br>
                        Negara: <?= ucwords($detail->negara) ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>No. Permintaan :</b> <?= $detail->noPermintaan ?><br>
                    <b>Tanggal : </b> <?= $detail->tanggal ?><br>
                    <b>Sales : </b> <?= ucwords($detail->nama) ?><br>
                    <b>Status : </b>
                    <?php if ($detail->statusPermintaan == 1) { ?>
                        <span class="badge badge-danger">Created</span>
                    <?php } ?>
                    <?php if ($detail->statusPermintaan == 2) { ?>
                        <span class="badge badge-warning">Accepted</span>
                    <?php } ?>
                    <?php if ($detail->statusPermintaan == 3) { ?>
                        <span class="badge badge-primary">On Progress</span>
                    <?php } ?>
                    <?php if ($detail->statusPermintaan == 4) { ?>
                        <span class="badge badge-success">Finished</span>
                    <?php } ?>
                    <br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Part No</th>
                                <th>Brand</th>
                                <th>Due Date</th>
                                <th>Aplikasi</th>
                                <th>Company</th>
                                <th>Foto Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                <input type="hidden" name="fidPermintaan" value="<?= $detail->idPermintaan ?>">
                                <?php
                                $no = 1;
                                foreach ($produk as $key) { ?>
                                    <tr>
                                        <td><?= $key->namaProduk ?></td>
                                        <td><?= $key->partNo ?></td>
                                        <td><?= $key->brand ?></td>
                                        <td><?= $key->duedate ?></td>
                                        <td>
                                            <div class="form-group">
                                                <input type="hidden" value="<?= $key->idProduk ?>" name="fid[]">
                                                <input type="text" class="form-control <?= form_error('faplikasi[]') ? 'is-invalid' : '' ?> form-control-sm" id="faplikasi" name="faplikasi[]" placeholder="aplikasi ">
                                                <div class="invalid-feedback">
                                                    <?= form_error('faplikasi[]') ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <select name="fcompany[]" id="fcompany[]" class="form-control custom-form form-control-sm <?= form_error('fcompany[]') ? 'is-invalid' : '' ?>" name="fcompany[]">
                                                    <option hidden selected value="">Pilih Company</option>
                                                    <option value="4">SS/SO</option>
                                                    <option value="5">PJM</option>
                                                    <option value="6">SS E/T</option>
                                                    <option value="7">ADR Shanghai</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('fcompany[]'); ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="file" class="form-control-file <?= form_error('fimage[]') ? 'is-invalid' : '' ?> form-control-sm" id="fimage[]" name="fimage[]" placeholder="pilih foto" required>
                                                <div class="invalid-feedback">
                                                    <?= form_error('fimage[]') ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <label for="fnotePenerimaan">Note Penerimaan</label>
                        <input type="text" class="form-control <?= form_error('fnotePenerimaan') ? 'is-invalid' : '' ?> form-control-sm" id="faplikasi" name="fnotePenerimaan" placeholder="Note ">
                        <div class="invalid-feedback">
                            <?= form_error('fnotePenerimaan') ?>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row mb-4">
                <div class="col-12 ">
                    <div class="card-footer text-muted">
                        <button class="btn btn-primary float-right" type="submit">Submit</button>
                    </div>
                </div>
            </div>
            </form>

            <!-- /.row -->

        </div>
    </div>
    <!-- /.content -->
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

<!-- Modal -->
<div class="modal fade" id="fotoProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="<?= base_url() . 'upload/product/' . $detail->foto ?>" alt="..." class="img-thumbnail">
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
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
<script type="text/javascript">
    $(function() {
        $("#customer").DataTable({
            "responsive": true,
            "autoWidth": true,
            "info": false,
            "lengthChange": false,
            "scrollY": 600,
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
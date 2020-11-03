<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Permintaan <span class="text-muted text-md"><?= $detail->noPermintaan ?></span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Detail permintaan</li>
                    <li class="breadcrumb-item"><a href="<?= base_url('permintaan') ?>">List permintaan</a></li>
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
            <!-- title row -->
            <div class="row mb-2">
                <div class="col-12">
                    <h4>
                        <strong>Detail Permintaan</strong>
                        <?php if ($this->session->userdata('role') == 2) { ?>
                            <a href="" class="btn btn-default btn-sm float-right"><i class="fa fa-edit"></i> Edit</a>
                        <?php } ?>
                        <?php if ($this->session->userdata('role') == 3) { ?>
                            <a href="" class="btn btn-warning btn-sm float-right"><i class="fa fa-check"></i> Accept</a>
                        <?php } ?>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
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
                    <?php if ($detail->status == 1) { ?>
                        <span class="badge badge-danger">Created</span>
                    <?php } ?>
                    <?php if ($detail->status == 2) { ?>
                        <span class="badge badge-warning">Accepted</span>
                    <?php } ?>
                    <?php if ($detail->status == 3) { ?>
                        <span class="badge badge-primary">On Progress</span>
                    <?php } ?>
                    <?php if ($detail->status == 4) { ?>
                        <span class="badge badge-success">Finished</span>
                    <?php } ?>
                    <br>
                    <b>Foto Produk : </b> <a href="#" data-toggle="modal" data-target="#fotoProduk" class="text-primary">Lihat</a><br>

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
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Part No</th>
                                <th>Brand</th>
                                <th>Qty</th>
                                <th>Permintaan</th>
                                <th>Aplikasi</th>
                                <th>Due Date</th>
                                <th>Company</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($produk as $key) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $key->namaProduk ?></td>
                                    <td><?= $key->partNo ?></td>
                                    <td><?= $key->brand ?></td>
                                    <td><?= $key->qty ?></td>
                                    <td><?= $key->permintaan ?></td>
                                    <td>
                                        <?php if ($key->aplikasi == null) { ?>
                                            <small class="text-muted">tidak ada</small>
                                        <?php }
                                        echo $key->aplikasi ?>
                                    </td>
                                    <td><?= $key->duedate ?></td>
                                    <td>
                                        <?php if ($key->company == null) { ?>
                                            <small class="text-muted">tidak ada</small>
                                        <?php }
                                        echo $key->company ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row mb-4">
                <div class="col-md-4">
                    <p class="lead text-sm">Permintaan :</p>
                    <ol class="text-muted well well-sm shadow-none mt-n3 text-sm">
                        <li>Gambar</li>
                        <li>MCC</li>
                        <li>FP3B</li>
                        <li>Test Lab</li>
                        <li>Sample</li>
                        <li>Compare (Specification Test)</li>
                    </ol>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <p class="lead text-sm">Company :</p>
                    <ol class="text-muted well well-sm shadow-none mt-n3 text-sm">
                        <li>SS/SO</li>
                        <li>PJM</li>
                        <li>SS E/T</li>
                        <li>ADR Shanghai</li>

                    </ol>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <p class="lead text-sm">Note :</p>
                    <p class="text-muted well well-sm shadow-none mt-n3 text-sm">
                        <?= $detail->note ?>
                    </p>
                </div>
                <!-- /.col -->

            </div>
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
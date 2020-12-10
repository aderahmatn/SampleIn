<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Sample</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">List Sample</li>
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
                        <table id="customer" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No. Permintaan</th>
                                    <th>No Part</th>
                                    <th>Nama Produk</th>
                                    <th>Aplikasi</th>
                                    <th>Permintaan</th>
                                    <th>Qty</th>
                                    <th>Due Date</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produk as $key) { ?>
                                    <tr>
                                        <td><?= $key->noPermintaan ?></td>
                                        <td><?= $key->partNo ?></td>
                                        <td><?= $key->namaProduk ?></td>
                                        <td><?= $key->aplikasi ?></td>
                                        <td><?php
                                            $data = $key->permintaan;
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
                                            ?></td>
                                        <td><?= $key->qty ?></td>
                                        <td><?= $key->duedate ?></td>
                                        <td><a href="#" data-toggle="modal" data-target="#fotoProduk<?= $key->idProduk ?>" class="text-primary">Lihat</a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="fotoProduk<?= $key->idProduk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <img src="<?= base_url() . 'upload/product/' . $key->foto ?>" alt="..." class="img-thumbnail">
                                                        </div>
                                                        <div class=" modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($key->statusEng != 1) { ?>
                                                <a href="<?= base_url() . 'produk/status/' . $key->idProduk ?>" class="btn btn-primary btn-sm">On Progress</a>
                                            <?php } ?>
                                            <?php if ($key->statusEng == 1) { ?>
                                                <a href="<?= base_url('produk/submit_result/') . $key->idProduk ?>" class="btn btn-default btn-sm"> Submit Hasil</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Permintaan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">List permintaan</li>
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
                                    <th>Customer</th>
                                    <th>Tanggal</th>
                                    <th>Sales</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($permintaan as $key) { ?>
                                    <tr>
                                        <td><?= $key->noPermintaan ?></td>
                                        <td><?= $key->customer ?></td>
                                        <td><?= $key->tanggal ?></td>
                                        <td><?= $key->nama ?></td>
                                        <td>
                                            <?php if ($key->status == 1) { ?>
                                                <span class="badge badge-danger">Created</span>
                                            <?php } ?>
                                            <?php if ($key->status == 2) { ?>
                                                <span class="badge badge-warning">Accepted</span>
                                            <?php } ?>
                                            <?php if ($key->status == 3) { ?>
                                                <span class="badge badge-primary">On Progress</span>
                                            <?php } ?>
                                            <?php if ($key->status == 4) { ?>
                                                <span class="badge badge-success">Finished</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url() . 'permintaan/detail/' . $key->idPermintaan ?>" class="btn btn-default btn-sm">Detail</a>
                                            <?php if ($this->session->userdata('role') == 3) { ?>
                                                <a href="<?= base_url('permintaan/status/') . $key->idPermintaan ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Accept</a>
                                            <?php } ?>
                                            <?php if ($this->session->userdata('role') == 2) { ?>
                                                <button class="btn btn-default btn-sm" onclick="deleteConfirm('<?= base_url() . 'permintaan/delete/' . $key->idPermintaan ?>')">hapus</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="alert alert-light" role="alert">
                                    <strong class="text-muted text-sm">Keterangan :</strong>
                                    <ul>
                                        <li class="text-muted text-sm"><span class="badge badge-danger">Created</span> Permintaan sudah dibuat dan dikirim kepada product development.</li>

                                        <li class="text-muted text-sm"><span class="badge badge-warning">Accepted</span> Permintaan sudah diterima product development.</li>
                                        <li class="text-muted text-sm"><span class="badge badge-primary">On Progress</span> Permintaan sudah diterima engineering terkait dan sedang proses pengerjaan.</li>
                                        <li class="text-muted text-sm"><span class="badge badge-success">Finished</span> Permintaan sudah selesai.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
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
                "scrollY": 400,
                "paging": true,
            });
        });
    </script>
<?php } ?>
<!-- End Datatables Config -->
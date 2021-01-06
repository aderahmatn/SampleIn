<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">dashboard</li>
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
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><strong>F</strong></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Finished</span>
                        <span class="info-box-number"><?= $finished ?></span>
                        <span class="text-sm text-right"><a href="" class="text-primary">More Info</a></span>

                    </div>

                </div>

            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><strong>P</strong></span>

                    <div class="info-box-content">
                        <span class="info-box-text">On Progress</span>
                        <span class="info-box-number"><?= $onprogress ?></span>
                        <span class="text-sm text-right"><a href="" class="text-primary">More Info</a></span>

                    </div>

                </div>

            </div>



            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><strong>A</strong></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Accepted</span>
                        <span class="info-box-number"><?= $accepted ?></span>
                        <span class="text-sm text-right"><a href="" class="text-primary">More Info</a></span>

                    </div>

                </div>

            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><strong>C</strong></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Created</span>
                        <span class="info-box-number"><?= $created ?></span>
                        <span class="text-sm text-right"><a href="" class="text-primary">More Info</a></span>
                    </div>

                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">


                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


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
                "paging": false,
            });
        });
    </script>
<?php } ?>
<!-- End Datatables Config -->
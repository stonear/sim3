<div class="row clearfix">
    <div class="col-xs-12 text-right tambah-fakultas">
        <button type="button" class="btn bg-light-blue waves-effect">Tambah Fakultas</button>
        <br><br>
    </div>
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2>FAKULTAS</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Nama Fakultas</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fakultas as $f): ?>
                                <tr>
                                    <td><?php echo $f->nama ?></td>
                                    <td class="text-right">
                                        <button type="button" class="update-fakultas-<?php echo $f->id ?> btn bg-light-blue btn-xs waves-effect"><i class="material-icons">edit</i></button>
                                        <button type="button" class="hapus-fakultas-<?php echo $f->id ?> btn btn-danger btn-xs waves-effect"><i class="material-icons">delete</i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahfakultas" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-col-light-blue">
            <form autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/tambah_fakultas/" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Fakultas</h4>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Fakultas" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn btn-link waves-effect">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($fakultas as $f): ?>
    <div class="modal fade" id="updatefakultas-<?php echo $f->id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-col-light-blue">
                <form autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/update_fakultas/<?php echo $f->id ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Update Fakultas</h4>
                    </div>
                    <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Fakultas" value="<?php echo $f->nama ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-link waves-effect">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusfakultas-<?php echo $f->id ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-col-red">
                <form autocomplete="off" class="form-horizontal" role="form" action="<?php echo base_url(); ?>Admin/hapus_fakultas/<?php echo $f->id ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Hapus Fakultas</h4>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus <?php echo $f->nama ?>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-link waves-effect">HAPUS</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
    $(function ()
    {
        $('.tambah-fakultas .btn').on('click', function ()
        {
            $('#tambahfakultas').modal('show');
        });
        <?php foreach ($fakultas as $f): ?>
            $('.update-fakultas-<?php echo $f->id ?>.btn').on('click', function ()
            {
                $('#updatefakultas-<?php echo $f->id ?>').modal('show');
            });
            $('.hapus-fakultas-<?php echo $f->id ?>.btn').on('click', function ()
            {
                $('#hapusfakultas-<?php echo $f->id ?>').modal('show');
            });
        <?php endforeach; ?>

        //Exportable table
        $('.js-exportable').DataTable
        ({
            dom: 'Bfrtip',
            responsive: true,
            buttons:
            [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
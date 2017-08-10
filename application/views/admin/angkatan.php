<div class="row clearfix">
    <div class="col-xs-12 text-right tambah-angkatan">
        <button type="button" class="btn bg-light-blue waves-effect">Tambah Angkatan</button>
        <br><br>
    </div>
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2>ANGKATAN</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Angkatan</th>
                                <th class="text-right" style="width: 50px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($angkatan as $a): ?>
                                <tr>
                                    <td><?php echo $a->tahun ?></td>
                                    <td class="text-right">
                                        <button type="button" class="update-angkatan-<?php echo $a->tahun ?> btn bg-light-blue btn-xs waves-effect"><i class="material-icons">edit</i></button>
                                        <button type="button" class="hapus-angkatan-<?php echo $a->tahun ?> btn btn-danger btn-xs waves-effect"><i class="material-icons">delete</i></button>
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
<div class="modal fade" id="tambahangkatan" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/tambah_angkatan/" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Angkatan</h4>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="tahun" class="form-control" placeholder="Masukkan Tahun" required>
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
<?php foreach ($angkatan as $a): ?>
    <div class="modal fade" id="updateangkatan-<?php echo $a->tahun ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-col-light-blue">
                <form autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/update_angkatan/<?php echo $a->tahun ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Update Angkatan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="tahun" class="form-control" placeholder="Masukkan Tahun" value="<?php echo $a->tahun ?>" required>
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
    <div class="modal fade" id="hapusangkatan-<?php echo $a->tahun ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-col-red">
                <form autocomplete="off" class="form-horizontal" role="form" action="<?php echo base_url(); ?>Admin/hapus_angkatan/<?php echo $a->tahun ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Hapus Angkatan</h4>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus Angkatan tahun <?php echo $a->tahun ?>?
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
        $('.tambah-angkatan .btn').on('click', function ()
        {
            $('#tambahangkatan').modal('show');
        });
        <?php foreach ($angkatan as $a): ?>
        $('.update-angkatan-<?php echo $a->tahun ?>.btn').on('click', function ()
        {
            $('#updateangkatan-<?php echo $a->tahun ?>').modal('show');
        });
        $('.hapus-angkatan-<?php echo $a->tahun ?>.btn').on('click', function ()
        {
            $('#hapusangkatan-<?php echo $a->tahun ?>').modal('show');
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
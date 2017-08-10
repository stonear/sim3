<div class="row clearfix">
    <div class="col-xs-12">
        <div class="btn-group">
            <button type="button" class="btn bg-pink waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pilih Angkatan <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <?php foreach ($angkatan as $a): ?>
                    <li><a href="<?php echo base_url(); ?>Admin/mahasiswa/<?php echo $a->id ?>"><?php echo $a->tahun ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a href="<?php echo base_url(); ?>Admin/tambah_mahasiswa/get" class="btn bg-cyan waves-effect">Tambah Mahasiswa</a>
        <a href="<?php echo base_url(); ?>Admin/download_excel" class="btn bg-light-green waves-effect">Download Excel</a>
        <a href="<?php echo base_url(); ?>Admin/download_foto" class="btn bg-orange waves-effect">Download Foto</a>
        <br><br>
    </div>
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2>MAHASISWA</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>No. HP</th>
                                <th>Last Login</th>
                                <th class="text-right" style="width: 50px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $u): ?>
                                <tr>
                                    <td><?php echo $u->nrp ?></td>
                                    <td><?php echo $u->nama ?></td>
                                    <td><?php echo $u->departemen ?></td>
                                    <td><?php echo $u->no ?></td>
                                    <td><?php echo $u->lastlogin ?></td>
                                    <td class="text-right">
                                        <a href="<?php echo base_url(); ?>Admin/detil_mahasiswa/<?php echo $u->nrp ?>" class="btn bg-light-blue btn-xs waves-effect"><i class="material-icons">edit</i></a>
                                        <button type="button" class="hapus-mahasiswa-<?php echo $u->nrp ?> btn btn-danger btn-xs waves-effect"><i class="material-icons">delete</i></button>
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
<?php foreach ($user as $u): ?>
    <div class="modal fade" id="hapusmahasiswa-<?php echo $u->nrp ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-col-red">
                <form autocomplete="off" class="form-horizontal" role="form" action="<?php echo base_url(); ?>Admin/hapus_mahasiswa/<?php echo $id_angkatan.'/'.$u->nrp ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Hapus Mahasiswa</h4>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus <?php echo $u->nama ?>?
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
         <?php foreach ($user as $u): ?>
            $('.hapus-mahasiswa-<?php echo $u->nrp ?>.btn').on('click', function ()
            {
                $('#hapusmahasiswa-<?php echo $u->nrp ?>').modal('show');
            });
        <?php endforeach; ?>
         //Exportable table
         $('.js-exportable').DataTable
         ({
            dom: 'frtip',
            responsive: true
        });
     });
 </script>
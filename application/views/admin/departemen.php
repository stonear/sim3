<div class="row clearfix">
	<div class="col-xs-12 text-right tambah-departemen">
		<button type="button" class="btn bg-light-blue waves-effect">Tambah Departemen</button>
		<br><br>
	</div>
	<div class="col-xs-12">
		<div class="card">
			<div class="header">
				<h2>DEPARTEMEN</h2>
			</div>
			<div class="body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover dataTable js-exportable">
						<thead>
							<tr>
								<th>Nama Departemen</th>
								<th>Fakultas</th>
								<th class="text-right">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($departemen as $d): ?>
								<tr>
									<td><?php echo $d->nama ?></td>
									<td><?php echo $d->fakultas ?></td>
									<td class="text-right">
										<button type="button" class="update-departemen-<?php echo $d->id ?> btn bg-light-blue btn-xs waves-effect"><i class="material-icons">edit</i></button>
										<button type="button" class="hapus-departemen-<?php echo $d->id ?> btn btn-danger btn-xs waves-effect"><i class="material-icons">delete</i></button>
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
<div class="modal fade" id="tambahdepartemen" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-col-light-blue">
			<form autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/tambah_departemen/" method="post">
				<div class="modal-header">
					<h4 class="modal-title" id="defaultModalLabel">Tambah Departemen</h4>
				</div>
				<div class="modal-body">
					<div class="row clearfix">
						<div class="col-xs-12">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Departemen" required>
								</div>
							</div>
							<div class="form-group">
								<div class="form-line">
									<select class="form-control show-tick" name="fakultas">
										<?php foreach ($fakultas as $f): ?>
											<option value="<?php echo $f->id ?>"><?php echo $f->nama ?></option>
										<?php endforeach; ?>
									</select>
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
<?php foreach ($departemen as $d): ?>
	<div class="modal fade" id="updatedepartemen-<?php echo $d->id ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-col-light-blue">
				<form autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/update_departemen/<?php echo $d->id ?>" method="post">
					<div class="modal-header">
					<h4 class="modal-title" id="defaultModalLabel">Update Departemen</h4>
					</div>
					<div class="modal-body">
						<div class="row clearfix">
							<div class="col-xs-12">
								<div class="form-group">
									<div class="form-line">
										<input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Departemen" value="<?php echo $d->nama ?>" required>
									</div>
								</div>
								<div class="form-group">
									<div class="form-line">
										<select class="form-control show-tick" name="fakultas">
											<?php foreach ($fakultas as $f): ?>
												<option value="<?php echo $f->id ?>"<?php if($f->nama == $d->fakultas){echo 'selected';} ?>><?php echo $f->nama ?></option>
											<?php endforeach; ?>
										</select>
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
	<div class="modal fade" id="hapusdepartemen-<?php echo $d->id ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-col-red">
				<form autocomplete="off" class="form-horizontal" role="form" action="<?php echo base_url(); ?>Admin/hapus_departemen/<?php echo $d->id ?>" method="post">
					<div class="modal-header">
						<h4 class="modal-title" id="defaultModalLabel">Hapus Departemen</h4>
					</div>
					<div class="modal-body">
						Apakah anda yakin ingin menghapus <?php echo $d->nama ?>?
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
		$('.tambah-departemen .btn').on('click', function ()
		{
			$('#tambahdepartemen').modal('show');
		});
		<?php foreach ($departemen as $d): ?>
		$('.update-departemen-<?php echo $d->id ?>.btn').on('click', function ()
		{
			$('#updatedepartemen-<?php echo $d->id ?>').modal('show');
		});
		$('.hapus-departemen-<?php echo $d->id ?>.btn').on('click', function ()
		{
			$('#hapusdepartemen-<?php echo $d->id ?>').modal('show');
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
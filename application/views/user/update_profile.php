<div class="row clearfix">
	<div class="col-sm-3 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Foto Profil</h2>
				<ul class="header-dropdown m-r--5">
					<li class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="material-icons">more_vert</i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li><a data-toggle="modal" data-target="#foto">Update</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="body">
				<?php $path = FCPATH."uploads/".$mahasiswa[0]->nrp.".jpg"; ?>
				<?php if (file_exists($path)) : ?>
					<img class="img-responsive" src="<?php echo base_url().'uploads/'.$mahasiswa[0]->nrp.'.jpg' ?>" />
				<?php else : ?>
					<img class="img-responsive" src="<?php echo base_url(); ?>asset/images/user.png" />
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="col-sm-9 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Biodata</h2>
			</div>
			<div class="body">
				<form class="form-horizontal" autocomplete="off" role="form" action="<?php echo base_url(); ?>User/update_profile/post" method="post">
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="nrp">NRP<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="number" id="nrp" name="nrp" class="form-control" placeholder="masukkan nrp" value="<?php echo $mahasiswa[0]->nrp ?>" disabled required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="nama">Nama Lengkap<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="nama" name="nama" class="form-control" placeholder="masukkan nama lengkap" value="<?php echo $mahasiswa[0]->nama ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="panggilan">Nama Panggilan<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="panggilan" name="panggilan" class="form-control" placeholder="masukkan nama panggilan" value="<?php echo $mahasiswa[0]->panggilan ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="angkatan">Angkatan<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select id="angkatan" name="angkatan" class="form-control" required>
									<option disabled selected value style="display:none">pilih angkatan</option>
									<?php foreach ($angkatan as $a): ?>
										<option value="<?php echo $a->id ?>" <?php if ($a->id == $mahasiswa[0]->angkatan) echo  "selected"?>><?php echo $a->tahun ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="departemen">Departemen<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select id="departemen" name="departemen" class="form-control" required>
									<option disabled selected value style="display:none">pilih departemen</option>
									<?php foreach ($departemen as $d): ?>
										<option value="<?php echo $d->id ?>" <?php if ($d->id == $mahasiswa[0]->departemen) echo  "selected"?>><?php echo $d->nama ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="sex">Jenis Kelamin<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select id="sex" name="sex" class="form-control" required>
									<option disabled value style="display:none">pilih jenis kelamin</option>
									<option value="L" <?php if ('L' == $mahasiswa[0]->sex) echo  "selected" ?>>Laki-laki</option>
									<option value="P" <?php if ('P' == $mahasiswa[0]->sex) echo  "selected" ?>>Perempuan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="status">Status<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select id="status" name="status" class="form-control" required>
									<option disabled selected value style="display:none">pilih status</option>
									<option value="A" <?php if ('A' == $mahasiswa[0]->status) echo  "selected" ?>>Anggota Aktif</option>
									<option value="B" <?php if ('B' == $mahasiswa[0]->status) echo  "selected" ?>>Alumni</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="tempat">Tempat Lahir<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="tempat" name="tempat" class="form-control" placeholder="masukkan tempat lahir" value="<?php echo explode(', ', $mahasiswa[0]->ttl, 2)[0] ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="tanggal">Tanggal Lahir<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="tanggal" name="tanggal" class="datepicker form-control" placeholder="masukkan tanggal lahir"  value="<?php echo explode(', ', $mahasiswa[0]->ttl, 2)[1] ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="no">No. Telp<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="no" name="no" class="form-control" placeholder="masukkan no. telp" pattern="[0-9]+" value="<?php echo $mahasiswa[0]->no ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="email">e-Mail<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="email" id="email" name="email" class="form-control" placeholder="masukkan email" value="<?php echo $mahasiswa[0]->email ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="asal">Alamat Asal<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<textarea rows="3" id="asal" name="asal" class="form-control no-resize auto-growth" placeholder="Masukkan alamat asal" required><?php echo $mahasiswa[0]->asal ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="kos">Alamat Sekarang<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<textarea rows="3" id="kos" name="kos" class="form-control no-resize auto-growth" placeholder="Masukkan alamat sekarang" required><?php echo $mahasiswa[0]->kos ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="pesantren">Pesantren<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="pesantren" name="pesantren" class="form-control" placeholder="masukkan nama pesantren"  value="<?php echo $mahasiswa[0]->pesantren ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="alamatpesantren">Alamat Pesantren<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<textarea rows="3" id="alamatpesantren" name="alamatpesantren" class="form-control no-resize auto-growth" placeholder="Masukkan alamat pesantren" required><?php echo $mahasiswa[0]->alamatpesantren ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="tk">TK/RA<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="tk" name="tk" class="form-control" placeholder="masukkan nama TK/RA" value="<?php echo $mahasiswa[0]->tk ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="sd">SD/MI<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="sd" name="sd" class="form-control" placeholder="masukkan nama SD/MI" value="<?php echo $mahasiswa[0]->sd ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="smp">SMP/MTs<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="smp" name="smp" class="form-control" placeholder="masukkan nama SMP/MTs" value="<?php echo $mahasiswa[0]->smp ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="sma">SMA/MA<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="sma" name="sma" class="form-control" placeholder="masukkan nama SMA/MA" value="<?php echo $mahasiswa[0]->sma ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="ayah">Ayah<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="ayah" name="ayah" class="form-control" placeholder="masukkan nama ayah" value="<?php echo $mahasiswa[0]->ayah ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="ibu">Ibu<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="ibu" name="ibu" class="form-control" placeholder="masukkan nama ibu" value="<?php echo $mahasiswa[0]->ibu ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5">
							<button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="foto" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?php echo base_url(); ?>User/upload_foto" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h4 class="modal-title" id="defaultModalLabel">Update Foto</h4>
				</div>
				<div class="modal-body">
					<div class="row clearfix">
						<div class="col-xs-12">
							<div class="form-group">
								<div class="form-line">
									<input style="opacity: 0; cursor: pointer;" type="file" id="file" name="img" class="form-control" accept="image/jpeg, image/pjpeg, image/png', image/x-png" required>
									<label for="file" id="labelfile" style="cursor: pointer;">Pilih foto . . .</label>
								</div>
							</div>
							<small>Ukuran maksimal foto yang diperbolehkan adalah <strong>1 MB</strong>.</small>
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
<script>
	$(function ()
	{
		$("#file").change(function()
		{
			$("#labelfile").text("Foto telah terpilih, silahkan click ADD!");
		});
		$('.datepicker').bootstrapMaterialDatePicker({
			format: 'dddd, DD MMMM YYYY',
			clearButton: true,
			weekStart: 1,
			time: false,
			lang: 'id'
		});
	});
</script>
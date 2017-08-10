<div class="row clearfix">
	<div class="col-sm-3 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>FOTO</h2>
				<ul class="header-dropdown m-r--5">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-trigger="focus" data-container="body" data-toggle="popover" data-placement="bottom" title="Help?" data-content="Foto profil dapat diubah setelah akun selesai dibuat.">
							<i class="material-icons">more_vert</i>
						</a>
					</li>
				</ul>
			</div>
			<div class="body">
				<img class="img-responsive" src="<?php echo base_url(); ?>asset/images/user.png" />
			</div>
		</div>
	</div>
	<div class="col-sm-9 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>BIODATA</h2>
			</div>
			<div class="body">
				<form class="form-horizontal" autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/tambah_mahasiswa/post" method="post">
					<div class="alert bg-pink alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						Akun baru yang akan dibuat menggunakan password default "Pass12345", tanpa tanda petik.
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="nrp">NRP<span class="col-red"> *</span></label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="number" id="nrp" name="nrp" class="form-control" placeholder="masukkan nrp" required>
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
									<input type="text" id="nama" name="nama" class="form-control" placeholder="masukkan nama lengkap" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="panggilan">Nama Panggilan</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="panggilan" name="panggilan" class="form-control" placeholder="masukkan nama panggilan">
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
										<option value="<?php echo $a->id ?>"><?php echo $a->tahun ?></option>
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
										<option value="<?php echo $d->id ?>"><?php echo $d->nama ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="sex">Jenis Kelamin</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select id="sex" name="sex" class="form-control">
									<option disabled selected value style="display:none">pilih jenis kelamin</option>
									<option value="L">Laki-laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="status">Status</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<select id="status" name="status" class="form-control">
									<option disabled selected value style="display:none">pilih status</option>
									<option value="A">Anggota Aktif</option>
									<option value="B">Alumni</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="tempat">Tempat Lahir</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="tempat" name="tempat" class="form-control" placeholder="masukkan tempat lahir">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="tanggal">Tanggal Lahir</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="tanggal" name="tanggal" class="datepicker form-control" placeholder="masukkan tanggal lahir">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="no">No. Telp</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="no" name="no" class="form-control" placeholder="masukkan no. telp" pattern="[0-9]+">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="email">e-Mail</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="email" id="email" name="email" class="form-control" placeholder="masukkan email">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="asal">Alamat Asal</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<textarea rows="3" id="asal" name="asal" class="form-control no-resize auto-growth" placeholder="Masukkan alamat asal"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="kos">Alamat Sekarang</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<textarea rows="3" id="kos" name="kos" class="form-control no-resize auto-growth" placeholder="Masukkan alamat sekarang"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="pesantren">Pesantren</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="pesantren" name="pesantren" class="form-control" placeholder="masukkan nama pesantren">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="alamatpesantren">Alamat Pesantren</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<textarea rows="3" id="alamatpesantren" name="alamatpesantren" class="form-control no-resize auto-growth" placeholder="Masukkan alamat pesantren"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="tk">TK/RA</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="tk" name="tk" class="form-control" placeholder="masukkan nama TK/RA">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="sd">SD/MI</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="sd" name="sd" class="form-control" placeholder="masukkan nama SD/MI">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="smp">SMP/MTs</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="smp" name="smp" class="form-control" placeholder="masukkan nama SMP/MTs">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="sma">SMA/MA</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="sma" name="sma" class="form-control" placeholder="masukkan nama SMA/MA">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="ayah">Ayah</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="ayah" name="ayah" class="form-control" placeholder="masukkan nama ayah">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
							<label for="ibu">Ibu</label>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="ibu" name="ibu" class="form-control" placeholder="masukkan nama ibu">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5">
							<button type="submit" class="btn btn-primary m-t-15 waves-effect">ADD</button>
						</div>
					</div>
				</form>
			</div>
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
		$('[data-toggle="popover"]').popover();
	});
</script>
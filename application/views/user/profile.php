<div class="row clearfix">
	<div class="col-sm-3 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>FOTO</h2>
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
		<a class="btn btn-block bg-light-blue" href="<?php echo base_url(); ?>User/update_profile/get">Update Biodata</a>
	</div>
	<div class="col-sm-9 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>BIODATA</h2>
			</div>
			<div class="body">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#profil" data-toggle="tab">
							<i class="material-icons">face</i> UMUM
						</a>
					</li>
					<li role="presentation">
						<a href="#pendidikan" data-toggle="tab">
							<i class="material-icons">school</i> PENDIDIKAN
						</a>
					</li>
					<li role="presentation">
						<a href="#lain" data-toggle="tab">
							<i class="material-icons">dashboard</i> LAIN-LAIN
						</a>
					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="profil">
						<div class="form-horizontal">
							<div class="row clearfix">
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
									<label for="nrp">NRP</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
									<div class="form-group">
										<div class="form-line">
											<div class="form-control">
												<?php echo $mahasiswa[0]->nrp ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
									<label for="nama">Nama Lengkap</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
									<div class="form-group">
										<div class="form-line">
											<div class="form-control">
												<?php echo $mahasiswa[0]->nama ?>
											</div>
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
											<div class="form-control">
												<?php echo $mahasiswa[0]->panggilan ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
									<label for="angkatan">Angkatan</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
									<div class="form-group">
										<div class="form-line">
											<div class="form-control">
												<?php foreach ($angkatan as $a): ?>
													<?php if ($a->id == $mahasiswa[0]->angkatan) echo $a->tahun ?>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
									<label for="departemen">Departemen</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
									<div class="form-group">
										<div class="form-line">
											<div class="form-control">
												<?php foreach ($departemen as $d): ?>
													<?php if ($d->id == $mahasiswa[0]->departemen) echo $d->nama ?>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
									<label for="sex">Jenis Kelamin</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
									<div class="form-group">
										<div class="form-line">
											<div class="form-control">
												<?php if ('L' == $mahasiswa[0]->sex) echo  "Laki-laki" ?>
												<?php if ('P' == $mahasiswa[0]->sex) echo  "Perempuan" ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
									<label for="status">Status</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
									<div class="form-group">
										<div class="form-line">
											<div class="form-control">
												<?php if ('A' == $mahasiswa[0]->status) echo  "Anggota Aktif" ?>
												<?php if ('B' == $mahasiswa[0]->status) echo  "Alumni" ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
									<label for="tempat">TTL</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
									<div class="form-group">
										<div class="form-line">
											<div class="form-control">
												<?php
													$ttl = explode(', ', $mahasiswa[0]->ttl, 3);
													echo $ttl[0];
													echo ', ';
													if (array_key_exists(2, $ttl)) echo $ttl[2];
												?>
											</div>
										</div>
									</div>
								</div>
							</div>						
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="pendidikan">
						<div class="form-horizontal">
							<div class="row clearfix">
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
									<label for="pesantren">Pesantren</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
									<div class="form-group">
										<div class="form-line">
											<div class="form-control">
												<?php echo $mahasiswa[0]->pesantren ?>
											</div>
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
											<textarea rows="3" class="form-control no-resize auto-growth" disabled><?php echo $mahasiswa[0]->alamatpesantren ?></textarea>
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
											<div class="form-control">
												<?php echo $mahasiswa[0]->tk ?>
											</div>
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
											<div class="form-control">
												<?php echo $mahasiswa[0]->sd ?>
											</div>
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
											<div class="form-control">
												<?php echo $mahasiswa[0]->smp ?>
											</div>
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
											<div class="form-control">
												<?php echo $mahasiswa[0]->sma ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="lain">
						<div class="form-horizontal">
							<div class="row clearfix">
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
									<label for="ayah">Ayah</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
									<div class="form-group">
										<div class="form-line">
											<div class="form-control">
												<?php echo $mahasiswa[0]->ayah ?>
											</div>
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
											<div class="form-control">
												<?php echo $mahasiswa[0]->ibu ?>
											</div>
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
											<div class="form-control">
												<?php echo $mahasiswa[0]->no ?>
											</div>
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
											<div class="form-control">
												<?php echo $mahasiswa[0]->email ?>
											</div>
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
											<textarea rows="3" class="form-control no-resize auto-growth" disabled><?php echo $mahasiswa[0]->asal ?></textarea>
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
											<textarea rows="3" id="kos" name="kos" class="form-control no-resize auto-growth" disabled><?php echo $mahasiswa[0]->kos ?></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
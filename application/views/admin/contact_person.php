<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>UPDATE CONTACT PERSON</h2>
				<small>Data <i>contact person ini</i> akan tampil pada <i>page</i> login</small>
			</div>
			<div class="body">
				<form autocomplete="off" class="form-horizontal" role="form" action="<?php echo base_url(); ?>Admin/update_cp/" method="post">
					<div class="row clearfix">
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
							<label for="nama">Nama</label>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" value="<?php echo $cp[0]->nama; ?>" required autofocus>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
							<label for="no">No. Telp</label>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="no" name="no" class="form-control" placeholder="Masukkan No. Contact Person" value="<?php echo $cp[0]->no; ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
							<button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
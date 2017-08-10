<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>RESET PASSWORD</h2>
				<small>It's a good idea to use a strong password that you're not using elsewhere</small>
			</div>
			<div class="body">
				<form autocomplete="off" class="form-horizontal" role="form" action="<?php echo base_url(); ?>User/reset_password" method="post">
					<div class="row clearfix">
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
							<label for="old">Password Lama</label>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="password" id="old" name="old" class="form-control" placeholder="Masukkan password lama" required autofocus>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
							<label for="new">Password Baru</label>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="password" id="new" name="new" class="form-control" placeholder="Masukkan password baru" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
							<label for="new2"></label>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
							<div class="form-group">
								<div class="form-line">
									<input type="password" id="new2" name="new2" class="form-control" placeholder="Ulangi masukkan password baru" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
									<div class="help-info">Password harus 8 karakter atau lebih, mengandung huruf kapital, huruf kecil, dan angka.</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
							<button type="submit" class="btn btn-primary m-t-15 waves-effect">RESET</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
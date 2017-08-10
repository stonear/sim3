<?php if ($role == 'User') : ?>
	<li class="<?php if($module == 'dashboard'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>User">
			<i class="material-icons col-light-blue">home</i>
			<span>Home</span>
		</a>
	</li>
	<li class="<?php if($module == 'profile' || $module == 'update_profile'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>User/profile">
			<i class="material-icons col-light-blue">account_box</i>
			<span>Biodata</span>
		</a>
	</li>
	<li class="<?php if($module == 'pesan'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>User/pesan">
			<i class="material-icons col-light-blue">message</i>
			<span>Pesan</span>
		</a>
	</li>
	<li class="<?php if($module == 'password'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>User/password">
			<i class="material-icons col-light-blue">vpn_key</i>
			<span>Reset Password</span>
		</a>
	</li>
<?php elseif ($role == 'Admin') : ?>
	<li class="<?php if($module == 'dashboard'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>Admin">
			<i class="material-icons col-light-blue">home</i>
			<span>Home</span>
		</a>
	</li>
	<li class="<?php if($module == 'fakultas' || $module == 'tambah_fakultas' || $module == 'departemen'){echo 'active';} ?>">
		<a href="#" class="menu-toggle">
			<i class="material-icons col-light-blue">business</i>
			<span>Institusi</span>
		</a>
		<ul class="ml-menu">
			<li class="<?php if($module == 'fakultas' || $module == 'tambah_fakultas'){echo 'active';} ?>">
				<a href="<?php echo base_url(); ?>Admin/fakultas">Fakultas</a>
			</li>
			<li class="<?php if($module == 'departemen'){echo 'active';} ?>">
				<a href="<?php echo base_url(); ?>Admin/departemen">Departemen</a>
			</li>
		</ul>
	</li>
	<li class="<?php if($module == 'angkatan' || $module == 'mahasiswa' || $module == 'tambah_mahasiswa' || $module == 'detil_mahasiswa'){echo 'active';} ?>">
		<a href="#" class="menu-toggle">
			<i class="material-icons col-light-blue">group</i>
			<span>Pengguna</span>
		</a>
		<ul class="ml-menu">
			<li class="<?php if($module == 'angkatan'){echo 'active';} ?>">
				<a href="<?php echo base_url(); ?>Admin/angkatan">Angkatan</a>
			</li>
			<li class="<?php if($module == 'mahasiswa' || $module == 'tambah_mahasiswa' || $module == 'detil_mahasiswa'){echo 'active';} ?>">
				<a href="<?php echo base_url(); ?>Admin/mahasiswa">Mahasiswa</a>
			</li>
		</ul>
	</li>
	<li class="<?php if($module == 'pesan'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>Admin/pesan">
			<i class="material-icons col-light-blue">message</i>
			<span>Pesan</span>
		</a>
	</li>
	<li class="<?php if($module == 'admin'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>Admin/admin">
			<i class="material-icons col-light-blue">code</i>
			<span>Admin</span>
		</a>
	</li>
	<li class="<?php if($module == 'contact_person'){echo 'active';} ?>">
		<a href="<?php echo base_url(); ?>Admin/cp">
			<i class="material-icons col-light-blue">call</i>
			<span>Contact Person</span>
		</a>
	</li>
<?php endif; ?>
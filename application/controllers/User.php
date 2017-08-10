<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	protected $data;
	function __construct()
	{
    	parent::__construct();
    	$this->load->helper('form');
    	$this->load->library('session');
    	$this->load->model('Database');

    	if($this->session->userdata('status') != 'login' or $this->session->userdata('role') != 'User')
		{
      		redirect('login');
    	}

		$this->data['nama'] = $this->session->userdata('nama');
		$this->data['nrp'] = $this->session->userdata('nrp');
		$this->data['role'] = $this->session->userdata('role');
  	}
  	
	public function index()
	{
		$jumlah_pengunjung[0] = $this->Database->jumlah_pengunjung(date("m", strtotime("now")), date("Y", strtotime("now")))[0]->jumlah_pengunjung;

		for ($i = 1; $i <= 6; $i++)
		{
    		$jumlah_pengunjung[$i] = $this->Database->jumlah_pengunjung(date("m", strtotime("-".$i." month")), date("Y", strtotime("-".$i." month")))[0]->jumlah_pengunjung;
		}
		$data = array
		(
			'nama' => $this->data['nama'],
			'nrp' => $this->data['nrp'],
			'role' => $this->data['role'],
			'title' => 'Dashboard',
			'module' => 'dashboard',

			'jumlah_fakultas' => $this->Database->count_fakultas(),
			'jumlah_departemen' => $this->Database->count_departemen(),
			'jumlah_angkatan' => $this->Database->count_angkatan(),
			'jumlah_mahasiswa' => $this->Database->count_user(),
			'jumlah_pengunjung' => $jumlah_pengunjung
		);
		$this->load->view('master-layout', $data);
	}
	public function profile()
	{
		$data = array
		(
			'nama' => $this->data['nama'],
			'nrp' => $this->data['nrp'],
			'role' => $this->data['role'],
			'title' => 'Profile',
			'module' => 'profile',

			'mahasiswa' => $this->Database->read_bio($this->data['nrp']),
			'angkatan' => $this->Database->read_angkatan(),
			'departemen' => $this->Database->read_departemen(),
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function update_profile($method = 'get')
	{
		if ($method == 'get')
		{
			$data = array
			(
				'nama' => $this->data['nama'],
				'nrp' => $this->data['nrp'],
				'role' => $this->data['role'],
				'title' => 'Profile',
				'module' => 'update_profile',

				'mahasiswa' => $this->Database->read_bio($this->data['nrp']),
				'angkatan' => $this->Database->read_angkatan(),
				'departemen' => $this->Database->read_departemen()
			);
			$this->load->view('master-layout', $data);
		}
		else if ($method == 'post')
		{
			$nrp = $this->input->post('nrp');
			$nrp = $this->security->xss_clean($nrp);
			$nama = $this->input->post('nama');
			$nama = $this->security->xss_clean($nama);
			$panggilan = $this->input->post('panggilan');
			$panggilan = $this->security->xss_clean($panggilan);
			$angkatan = $this->input->post('angkatan');
			$angkatan = $this->security->xss_clean($angkatan);
			$departemen = $this->input->post('departemen');
			$departemen = $this->security->xss_clean($departemen);
			$sex = $this->input->post('sex');
			$sex = $this->security->xss_clean($sex);
			$status = $this->input->post('status');
			$status = $this->security->xss_clean($status);
			$ttl = $this->input->post('tempat').", ".$this->input->post('tanggal');
			$ttl = $this->security->xss_clean($ttl);
			$no = $this->input->post('no');
			$no = $this->security->xss_clean($no);
			$email = $this->input->post('email');
			$email = $this->security->xss_clean($email);
			$asal = $this->input->post('asal');
			$asal = $this->security->xss_clean($asal);
			$kos = $this->input->post('kos');
			$kos = $this->security->xss_clean($kos);
			$pesantren = $this->input->post('pesantren');
			$pesantren = $this->security->xss_clean($pesantren);
			$alamatpesantren = $this->input->post('alamatpesantren');
			$alamatpesantren = $this->security->xss_clean($alamatpesantren);
			$tk = $this->input->post('tk');
			$tk = $this->security->xss_clean($tk);
			$sd = $this->input->post('sd');
			$sd = $this->security->xss_clean($sd);
			$smp = $this->input->post('smp');
			$smp = $this->security->xss_clean($smp);
			$sma = $this->input->post('sma');
			$sma = $this->security->xss_clean($sma);
			$ayah = $this->input->post('ayah');
			$ayah = $this->security->xss_clean($ayah);
			$ibu = $this->input->post('ibu');
			$ibu = $this->security->xss_clean($ibu);
			$this->Database->update_user($this->data['nrp'], $nama, $panggilan, $angkatan, $departemen, $sex, $status, $ttl, $no, $email, $asal, $kos, $pesantren, $alamatpesantren, $tk, $sd, $smp, $sma, $ayah, $ibu, $this->data['nrp']);
			$this->Database->log($this->data['nrp'], 'update profil');
			$this->data['nama'] = $nama;
			$this->session->set_userdata('nama', $nama);
			$this->session->set_flashdata('message', 'Berhasil mengupdate database');
			$this->session->set_flashdata('message_bg', 'bg-green');
			redirect('User/profile');
		}
	}
	public function pesan()
	{
		$data = array
		(
			'nama' => $this->data['nama'],
			'nrp' => $this->data['nrp'],
			'role' => $this->data['role'],
			'title' => 'Pesan',
			'module' => 'pesan'
		);
		$this->load->view('master-layout', $data);
	}
	public function password()
	{
		$data = array
		(
			'nama' => $this->data['nama'],
			'nrp' => $this->data['nrp'],
			'role' => $this->data['role'],
			'title' => 'Reset Password',
			'module' => 'password',
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function reset_password()
	{
		$old = $this->input->post('old');
		$new = $this->input->post('new');
		$new2 = $this->input->post('new2');
		if ($new == $new2)
		{
			$old2 = $this->Database->select_password($this->data['nrp'])[0]->password;
			if (password_verify($old, $old2))
			{
				$this->Database->reset_password_user($this->data['nrp'], password_hash($new, PASSWORD_BCRYPT));
				$this->Database->log($this->data['nrp'], 'update password');
				$this->session->set_flashdata('message', 'Berhasil mereset password');
				$this->session->set_flashdata('message_bg', 'bg-green');
			}
			else
			{
				$this->session->set_flashdata('message', 'Password lama tidak sesuai');
				$this->session->set_flashdata('message_bg', 'bg-red');
			}
		}
		else
		{
			$this->session->set_flashdata('message', 'Masukkan password baru dengan benar');
			$this->session->set_flashdata('message_bg', 'bg-red');
		}
		redirect('User/password');
	}
	public function upload_foto()
	{
		if ($this->Database->exist_user($this->data['nrp']) == TRUE)
		{
			$config['upload_path']		= './uploads/'; 
			$config['allowed_types']	= 'jpg|png';
			$config['overwrite']		= TRUE;
			$config['max_size']			= 1024;
			$config['max_width']		= 0;
			$config['max_height']		= 0; 
			$config['file_name']		= $this->data['nrp'].'.jpg';
			$config['file_ext_tolower']	= TRUE;
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload("img"))
			{
				//$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('message', $this->upload->display_errors());
				$this->session->set_flashdata('message_bg', 'bg-red');
			}
			else
			{ 
				$data = array('upload_data' => $this->upload->data());
				$this->Database->log($this->data['nrp'], 'update foto');
				$this->session->set_flashdata('message', 'Berhasil mengupdate foto');
				$this->session->set_flashdata('message_bg', 'bg-green');
			}
		}
		redirect('User/profile');
	}
}
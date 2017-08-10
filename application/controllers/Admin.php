<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	protected $data;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Database');

		if($this->session->userdata('status') != 'login' or $this->session->userdata('role') != 'Admin')
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
			'jumlah_pengunjung' => $jumlah_pengunjung,
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function cp()
	{
		$data = array
		(
			'nama' => $this->data['nama'],
			'nrp' => $this->data['nrp'],
			'role' => $this->data['role'],
			'title' => 'Contact Person',
			'module' => 'contact_person',

			'cp' => $this->Database->read_cp(),
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function update_cp()
	{
		$nama = $this->input->post('nama');
		$nama = $this->security->xss_clean($nama);
		$no = $this->input->post('no');
		$no = $this->security->xss_clean($no);

		$this->Database->update_cp($nama, $no);
		$this->session->set_flashdata('message', 'Berhasil mengupdate contact person');
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/cp');
	}
	public function fakultas()
	{
		$data = array
		(
			'nama' => $this->data['nama'],
			'nrp' => $this->data['nrp'],
			'role' => $this->data['role'],
			'title' => 'Fakultas',
			'module' => 'fakultas',

			'fakultas' => $this->Database->read_fakultas(),
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function tambah_fakultas()
	{
		$nama = $this->input->post('nama');
		$nama = $this->security->xss_clean($nama);
		$this->Database->create_fakultas($nama);
		$this->session->set_flashdata('message', 'Berhasil menambah fakultas '.$nama);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/fakultas');
	}
	public function update_fakultas($id = '')
	{
		$id = $this->security->xss_clean($id);
		$nama = $this->input->post('nama');
		$nama = $this->security->xss_clean($nama);
		$this->Database->update_fakultas($id, $nama);
		$this->session->set_flashdata('message', 'Berhasil mengupdate fakultas '.$nama);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/fakultas');
	}
	public function hapus_fakultas($id = '')
	{	
		$this->Database->delete_fakultas($id);
		$this->session->set_flashdata('message', 'Berhasil menghapus fakultas');
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/fakultas');
	}
	public function departemen()
	{
		$data = array
		(
			'nama' => $this->data['nama'],
			'nrp' => $this->data['nrp'],
			'role' => $this->data['role'],
			'title' => 'Departemen',
			'module' => 'departemen',

			'departemen' => $this->Database->read_departemen(),
			'fakultas' => $this->Database->read_fakultas(),
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function tambah_departemen()
	{
		$nama = $this->input->post('nama');
		$nama = $this->security->xss_clean($nama);
		$fakultas = $this->input->post('fakultas');
		$fakultas = $this->security->xss_clean($fakultas);
		$this->Database->create_departemen($nama, $fakultas);
		$this->session->set_flashdata('message', 'Berhasil menambah departemen '.$nama);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/departemen');
	}
	public function update_departemen($id = '')
	{
		$id = $this->security->xss_clean($id);
		$nama = $this->input->post('nama');
		$nama = $this->security->xss_clean($nama);
		$fakultas = $this->input->post('fakultas');
		$fakultas = $this->security->xss_clean($fakultas);
		$this->Database->update_departemen($id, $nama, $fakultas);
		$this->session->set_flashdata('message', 'Berhasil mengupdate departemen '.$nama);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/departemen');
	}
	public function hapus_departemen($id = '')
	{	
		$this->Database->delete_departemen($id);
		$this->session->set_flashdata('message', 'Berhasil menghapus departemen');
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/departemen');
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
	public function admin()
	{
		$data = array
		(
			'nama' => $this->data['nama'],
			'nrp' => $this->data['nrp'],
			'role' => $this->data['role'],
			'title' => 'Admin',
			'module' => 'admin',

			'admin' => $this->Database->read_admin(),
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function tambah_admin()
	{
		$username = $this->input->post('username');
		$username = $this->security->xss_clean($username);
		$password = $this->input->post('password');
		$password = $this->security->xss_clean($password);
		$password = password_hash($password, PASSWORD_BCRYPT);
		if ($this->Database->exist_admin($username) == FALSE)
		{
			$this->Database->create_admin($username, $password);
			$this->session->set_flashdata('message', 'Berhasil menambah admin '.$username);
			$this->session->set_flashdata('message_bg', 'bg-green');
		}
		else
		{
			$this->session->set_flashdata('message', 'Admin '.$username.' telah terdaftar di database');
			$this->session->set_flashdata('message_bg', 'bg-red');
		}
		redirect('Admin/admin');
	}
	public function update_admin($username_old = '')
	{
		$username_old = $this->security->xss_clean($username_old);
		$username = $this->input->post('username');
		$username = $this->security->xss_clean($username);
		$password = $this->input->post('password');
		$password = $this->security->xss_clean($password);
		$password = password_hash($password, PASSWORD_BCRYPT);
		$this->Database->update_admin($username, $password, $username_old);
		$this->data['nama'] = $username;
		$this->session->set_userdata('nama', $username);
		$this->session->set_flashdata('message', 'Berhasil mengupdate admin '.$username);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/admin');
	}
	public function hapus_admin($username = '')
	{	
		$this->Database->delete_admin($username);
		$this->session->set_flashdata('message', 'Berhasil menghapus admin '.$username);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/admin');
	}
	public function angkatan()
	{
		$data = array
		(
			'nama' => $this->data['nama'],
			'nrp' => $this->data['nrp'],
			'role' => $this->data['role'],
			'title' => 'Angkatan',
			'module' => 'angkatan',

			'angkatan' => $this->Database->read_angkatan(),
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function tambah_angkatan()
	{
		$tahun = $this->input->post('tahun');
		$tahun = $this->security->xss_clean($tahun);
		if ($this->Database->exist_angkatan($tahun) == FALSE)
		{
			$this->Database->create_angkatan($tahun);
			$this->session->set_flashdata('message', 'Berhasil menambah angkatan '.$tahun);
			$this->session->set_flashdata('message_bg', 'bg-green');
		}
		else
		{
			$this->session->set_flashdata('message', 'Angkatan '.$tahun.' telah terdaftar di database');
			$this->session->set_flashdata('message_bg', 'bg-red');
		}
		redirect('Admin/angkatan');
	}
	public function update_angkatan($tahun_old = '')
	{
		$tahun = $this->input->post('tahun');
		$tahun = $this->security->xss_clean($tahun);
		$this->Database->update_angkatan($tahun, $tahun_old);
		$this->session->set_flashdata('message', 'Berhasil mengupdate angkatan '.$tahun_old.' menjadi '.$tahun);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/angkatan');
	}
	public function hapus_angkatan($tahun = '')
	{	
		$this->Database->delete_angkatan($tahun);
		$this->session->set_flashdata('message', 'Berhasil menghapus angkatan '.$tahun);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/angkatan');
	}
	public function mahasiswa($id_angkatan = '')
	{
		$data = array
		(
			'nama' => $this->data['nama'],
			'nrp' => $this->data['nrp'],
			'role' => $this->data['role'],
			'title' => 'Mahasiswa',
			'module' => 'mahasiswa',

			'angkatan' => $this->Database->read_angkatan(),
			'id_angkatan' => $id_angkatan,
			'user' => $this->Database->read_user($id_angkatan),
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function tambah_mahasiswa($method = 'get')
	{
		if ($method == 'get')
		{
			$data = array
			(
				'nama' => $this->data['nama'],
				'nrp' => $this->data['nrp'],
				'role' => $this->data['role'],
				'title' => 'Mahasiswa',
				'module' => 'tambah_mahasiswa',

				'angkatan' => $this->Database->read_angkatan(),
				'departemen' => $this->Database->read_departemen()
			);
			$this->load->view('master-layout', $data);
		}
		else if ($method == 'post')
		{
			$nrp = $this->input->post('nrp');
			$nrp = $this->security->xss_clean($nrp);
			$password = password_hash('Pass12345', PASSWORD_BCRYPT);
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
			$lastlogin = date("d-m-Y", time());
			if ($this->Database->exist_user($nrp) == FALSE)
			{
				$this->Database->create_user($nrp, $password, $nama, $panggilan, $angkatan, $departemen, $sex, $status, $ttl, $no, $email, $asal, $kos, $pesantren, $alamatpesantren, $tk, $sd, $smp, $sma, $ayah, $ibu, $lastlogin);
				$this->session->set_flashdata('message', 'Berhasil menambah mahasiswa dengan NRP '.$nrp);
				$this->session->set_flashdata('message_bg', 'bg-green');
			}
			else
			{
				$this->session->set_flashdata('message', 'Mahasiswa dengan NRP '.$nrp.' telah terdaftar di database');
				$this->session->set_flashdata('message_bg', 'bg-red');
			}
			redirect('Admin/mahasiswa');
		}
	}
	public function detil_mahasiswa($nrp = '')
	{
		if ($this->Database->exist_user($nrp) == TRUE)
		{
			$data = array
			(
				'nama' => $this->data['nama'],
				'nrp' => $this->data['nrp'],
				'role' => $this->data['role'],
				'title' => 'Mahasiswa',
				'module' => 'detil_mahasiswa',

				'mahasiswa' => $this->Database->read_bio($nrp),
				'angkatan' => $this->Database->read_angkatan(),
				'departemen' => $this->Database->read_departemen(),
				'message' => $this->session->flashdata('message'),
				'message_bg' => $this->session->flashdata('message_bg')
			);
			$this->load->view('master-layout', $data);
		}
		else
		{
			redirect('Admin/mahasiswa');
		}
		
	}
	public function update_mahasiswa($nrp_old = '')
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
		$this->Database->update_user($nrp, $nama, $panggilan, $angkatan, $departemen, $sex, $status, $ttl, $no, $email, $asal, $kos, $pesantren, $alamatpesantren, $tk, $sd, $smp, $sma, $ayah, $ibu, $nrp_old);
		$this->session->set_flashdata('message', 'Berhasil mengupdate database '.$nama);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/detil_mahasiswa/'.$nrp);
	}
	public function hapus_mahasiswa($id_angkatan = '', $nrp = '')
	{
		$this->Database->delete_user($nrp);
		$this->session->set_flashdata('message','Berhasil menghapus mahasiswa dengan NRP '.$nrp);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/mahasiswa/'.$id_angkatan);
	}
	public function download_excel()
	{
		$this->load->library('Excel');
		$styleArray = array
		(
			'borders' => array
			(
				'allborders' => array
				(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array
					(
						'argb' => '00000000'
					), 
				), 
			), 
		);
		$fontHeader = array
		( 
			'font' => array
			(
				'bold' => true
			),
			'alignment' => array
			(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'rotation'   => 0,
			),
			'fill' => array
			(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => '6CCECB')
			)
		);
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setTitle("sim3")->setDescription("sistem informasi mahasantri")->setCreator("ARStone")->setLastModifiedBy("ARStone");

		$angkatan = $this->Database->read_angkatan();
		for ($i = 0; $i < count($angkatan); $i++)
		{
			//echo 'i '.$i.'<br>';
			if ($i != 0) $objPHPExcel->createSheet();
			$objPHPExcel->setActiveSheetIndex($i);
			$objPHPExcel->getActiveSheet()->setTitle($angkatan[$i]->tahun);
			$mahasiswa = $this->Database->data_export($angkatan[$i]->id);
			
			for ($j = 0; $j < count($mahasiswa); $j++)
			{
				if ($j == 0)
				{
					$kolom = 'A';
					foreach (array_keys((array) $mahasiswa[$j]) as $header)
					{
						$objPHPExcel->getActiveSheet()->setCellValue($kolom.($j + 1), $header);
						$objPHPExcel->getActiveSheet()->getColumnDimension($kolom)->setAutoSize(true);
						$objPHPExcel->getActiveSheet()->getStyle($kolom.($j + 1))->applyFromArray($fontHeader);
						$objPHPExcel->getActiveSheet()->getStyle($kolom.($j + 1))->applyFromArray($styleArray);
						$kolom++;
					}
				}
				$kolom = 'A';
				foreach (array_keys((array) $mahasiswa[$j]) as $header)
				{
					if ($header == 'status')
					{
						if ($mahasiswa[$j]->$header == 'A') $objPHPExcel->getActiveSheet()->setCellValue($kolom.($j + 2), "Anggota Aktif");
						else if ($mahasiswa[$j]->$header == 'B') $objPHPExcel->getActiveSheet()->setCellValue($kolom.($j + 2), "Alumni");	
					}
					else
					{
						$objPHPExcel->getActiveSheet()->setCellValue($kolom.($j + 2), $mahasiswa[$j]->$header);	
					}
					$objPHPExcel->getActiveSheet()->getStyle($kolom.($j + 2))->applyFromArray($styleArray);
					$kolom++;
				}
			}
		}

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="sim3.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}
	public function download_foto()
	{
		$this->load->library('zip');
		$path = FCPATH.'/uploads';
		$this->zip->read_dir($path, FALSE);
		$this->zip->download('foto.zip');
	}
	public function upload_foto($nrp = '')
	{
		if ($this->Database->exist_user($nrp) == TRUE)
		{
			$config['upload_path']		= './uploads/'; 
			$config['allowed_types']	= 'jpg|png';
			$config['overwrite']		= TRUE;
			$config['max_size']			= 1024;
			$config['max_width']		= 0;
			$config['max_height']		= 0; 
			$config['file_name']		= $nrp.'.jpg';
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
				$this->session->set_flashdata('message', 'Berhasil mengupdate foto');
				$this->session->set_flashdata('message_bg', 'bg-green');
			}
		}
		redirect('Admin/detil_mahasiswa/'.$nrp);
	}
	public function reset_password()
	{
		$nrp = $this->input->post('nrp');
		$nrp = $this->security->xss_clean($nrp);
		$password = $this->input->post('password');
		$password = password_hash($password, PASSWORD_BCRYPT);
		if ($this->Database->exist_user($nrp) == TRUE)
		{		
			$this->Database->reset_password_user($nrp, $password);
			$this->session->set_flashdata('message', 'Berhasil reset password mahasiswa dengan nrp '.$nrp);
			$this->session->set_flashdata('message_bg', 'bg-green');
		}
		else
		{
			$this->session->set_flashdata('message', 'Mahasiswa dengan nrp '.$nrp.' tidak terdaftar di SIM3');
			$this->session->set_flashdata('message_bg', 'bg-red');
		}
		redirect('Admin');
	}
}
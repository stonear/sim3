<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Auth');
		$this->load->model('Database');
	}

	public function index()
	{
		if($this->session->userdata('status') == 'login')
		{
			redirect($this->session->userdata('role'));
		}
		else
		{
			$data = array
			(
				'title' => 'Login',
				'cp' => $this->Database->read_cp()
				);
			$this->load->view('login', $data);
		}
	}
	public function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->Auth->auth_user($username);
		if(count($user) > 0)
		{
			if (password_verify($password, $user[0]->password))
			{
				$bio = $this->Database->read_bio($username);
				$data_session = array
				(
					'nama' => $bio[0]->nama,
					'nrp' => $bio[0]->nrp,
					'status' => 'login',
					'role' => 'User'
				);
				$this->session->set_userdata($data_session);
				$this->Auth->lastlogin($bio[0]->nrp, date("d-m-Y"));
				$this->Database->log($bio[0]->nrp, 'login');
				//echo 'logged in';
				redirect('User');
			}
			//else echo 'password salah';
			else redirect('Login');
		}
		else
		{
			//echo 'user tidak ditemukan';
			$admin = $this->Auth->auth_admin($username);
			if(count($admin) > 0)
			{
				//echo $password.' '.$admin[0]->password;
				if (password_verify($password, $admin[0]->password))
				{
					$data_session = array
					(
						'nama' => $admin[0]->username,
						'nrp' => 'Administrator',
						'status' => 'login',
						'role' => 'Admin'
					);
					$this->session->set_userdata($data_session);
					//echo 'logged in';
					redirect('Admin');
				}
				//else echo 'password salah';
				else redirect('Login');
			}
			//else echo 'admin tidak ditemukan';
			else redirect('Login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}

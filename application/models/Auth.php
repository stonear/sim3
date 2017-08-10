<?php
class Auth extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function auth_user($username)
	{
		$query = $this->db->query("SELECT * FROM sim3_user WHERE nrp = ?", array($username));
		return $query->result();
	}

	function auth_admin($username)
	{
		$query = $this->db->query("SELECT * FROM sim3_admin WHERE username = ?", array($username));
		return $query->result();
	}

	function lastlogin($nrp, $date)
	{
		$query = $this->db->query("UPDATE sim3_bio SET lastlogin = ? WHERE nrp = ?", array($date, $nrp));
	}
}
?>
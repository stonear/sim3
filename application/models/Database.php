<?php
class Database extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function jumlah_pengunjung($month, $year)
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah_pengunjung FROM sim3_log WHERE EXTRACT(month FROM waktu) = ? AND EXTRACT(year FROM waktu) = ? AND log = 'login'", array($month, $year));
		return $query->result();
	}

	function read_cp()
	{
		$query = $this->db->query("SELECT nama, no FROM sim3_cp WHERE id = 0");
		return $query->result();
	}

	function update_cp($nama, $no)
	{
		$query = $this->db->query("UPDATE sim3_cp SET nama = ?, no = ? WHERE id = 0", array($nama, $no));
	}

	function count_fakultas()
	{
		//$query = $this->db->query("SELECT COUNT(*) AS count FROM sim3_fakultas");
		$query = $this->db->query("SELECT COUNT(DISTINCT d.fakultas) AS count FROM sim3_bio b, sim3_departemen d WHERE b.departemen = d.id");
		return $query->result();
	}

	function create_fakultas($nama)
	{
		$query = $this->db->query("INSERT INTO sim3_fakultas(nama) VALUES (?)", array($nama));
	}

	function read_fakultas()
	{
		$query = $this->db->query("SELECT * FROM sim3_fakultas");
		return $query->result();
	}

	function update_fakultas($id, $nama)
	{
		$query = $this->db->query("UPDATE sim3_fakultas SET nama = ? WHERE id = ?", array($nama, $id));
	}

	function delete_fakultas($id)
	{
		$query = $this->db->query("DELETE FROM sim3_fakultas WHERE id = ?", array($id));
	}

	function count_departemen()
	{
		//$query = $this->db->query("SELECT COUNT(*) AS count FROM sim3_departemen");
		$query = $this->db->query("SELECT COUNT(DISTINCT departemen) AS count FROM sim3_bio");
		return $query->result();
	}

	function create_departemen($nama, $fakultas)
	{
		$query = $this->db->query("INSERT INTO sim3_departemen(nama, fakultas) VALUES (?, ?)", array($nama, $fakultas));
	}

	function read_departemen()
	{
		$query = $this->db->query("SELECT j.id as id, j.nama as nama, f.nama as fakultas FROM sim3_departemen j, sim3_fakultas f WHERE j.fakultas = f.id");
		return $query->result();
	}

	function update_departemen($id, $nama, $fakultas)
	{
		$query = $this->db->query("UPDATE sim3_departemen SET nama = ?, fakultas = ? WHERE id = ?", array($nama, $fakultas, $id));
	}

	function delete_departemen($id)
	{
		$query = $this->db->query("DELETE FROM sim3_departemen WHERE id = ?", array($id));
	}

	function create_admin($username, $password)
	{
		$query = $this->db->query("INSERT INTO sim3_admin(username, password) VALUES (?, ?)", array($username, $password));
	}

	function read_admin()
	{
		$query = $this->db->query("SELECT * FROM sim3_admin");
		return $query->result();
	}

	function update_admin($username, $password, $username_old)
	{
		$query = $this->db->query("UPDATE sim3_admin SET username = ?, password = ? WHERE username = ?", array($username, $password, $username_old));
	}

	function delete_admin($username)
	{
		$query = $this->db->query("DELETE FROM sim3_admin WHERE username = ?", array($username));
	}

	function exist_admin($username)
	{
		$query = $this->db->query("SELECT * FROM sim3_admin WHERE username = ?", array($username));
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function count_angkatan()
	{
		//$query = $this->db->query("SELECT COUNT(*) AS count FROM sim3_angkatan");
		$query = $this->db->query("SELECT COUNT(DISTINCT angkatan) AS count FROM sim3_bio");
		return $query->result();
	}

	function create_angkatan($tahun)
	{
		$query = $this->db->query("INSERT INTO sim3_angkatan(tahun) VALUES (?)", array($tahun));
	}

	function read_angkatan()
	{
		$query = $this->db->query("SELECT * FROM sim3_angkatan");
		return $query->result();
	}

	function update_angkatan($tahun, $tahun_old)
	{
		$query = $this->db->query("UPDATE sim3_angkatan SET tahun = ? WHERE tahun = ?", array($tahun, $tahun_old));
	}

	function delete_angkatan($tahun)
	{
		$query = $this->db->query("DELETE FROM sim3_angkatan WHERE tahun = ?", array($tahun));
	}

	function exist_angkatan($tahun)
	{
		$query = $this->db->query("SELECT * FROM sim3_angkatan WHERE tahun = ?", array($tahun));
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function count_user()
	{
		$query = $this->db->query("SELECT COUNT(*) AS count FROM sim3_bio");
		return $query->result();
	}

	function create_user($nrp, $password, $nama, $panggilan, $angkatan, $departemen, $sex, $status, $ttl, $no, $email, $asal, $kos, $pesantren, $alamatpesantren, $tk, $sd, $smp, $sma, $ayah, $ibu, $lastlogin)
	{
		$query = $this->db->query("INSERT INTO sim3_user(nrp, password) VALUES (?, ?)", array($nrp, $password));
		$query2 = $this->db->query("INSERT INTO sim3_bio(nama, panggilan, nrp, angkatan, departemen, sex, status, ttl, no, email, asal, kos, pesantren, alamatpesantren, tk, sd, smp, sma, ayah, ibu, lastlogin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($nama, $panggilan, $nrp, $angkatan, $departemen, $sex, $status, $ttl, $no, $email, $asal, $kos, $pesantren, $alamatpesantren, $tk, $sd, $smp, $sma, $ayah, $ibu, $lastlogin));
	}

	function read_user($angkatan)
	{
		$query = $this->db->query("SELECT b.nrp AS nrp, b.nama AS nama, d.nama AS departemen, b.no AS no, b.lastlogin AS lastlogin FROM sim3_bio AS b, sim3_departemen AS d, sim3_fakultas AS f WHERE b.departemen = d.id AND d.fakultas = f.id AND b.angkatan = ?", array($angkatan));
		return $query->result();
	}

	function update_user($nrp, $nama, $panggilan, $angkatan, $departemen, $sex, $status, $ttl, $no, $email, $asal, $kos, $pesantren, $alamatpesantren, $tk, $sd, $smp, $sma, $ayah, $ibu, $nrp_old)
	{
		$query = $this->db->query("UPDATE sim3_user SET nrp = ? WHERE nrp = ?", array($nrp, $nrp_old));
		$query2 = $this->db->query("UPDATE sim3_bio SET nrp = ?, nama = ?, panggilan = ?, angkatan = ?, departemen = ?, sex = ?, status = ?, ttl = ?, no = ?, email = ?, asal = ?, kos = ?, pesantren = ?, alamatpesantren = ?, tk = ?, sd = ?, smp = ?, sma = ?, ayah = ?, ibu = ? WHERE nrp = ?", array($nrp, $nama, $panggilan, $angkatan, $departemen, $sex, $status, $ttl, $no, $email, $asal, $kos, $pesantren, $alamatpesantren, $tk, $sd, $smp, $sma, $ayah, $ibu, $nrp_old));
	}

	function delete_user($nrp)
	{
		$query = $this->db->query("DELETE FROM sim3_user WHERE nrp = ?", array($nrp));
		$query2 = $this->db->query("DELETE FROM sim3_bio WHERE nrp = ?", array($nrp));
	}

	function exist_user($nrp)
	{
		$query = $this->db->query("SELECT * FROM sim3_user WHERE nrp = ?", array($nrp));
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function read_bio($nrp)
	{
		$query = $this->db->query("SELECT * FROM sim3_bio WHERE nrp = ?", array($nrp));
		return $query->result();
	}

	function reset_password_user($nrp, $password)
	{
		$query = $this->db->query("UPDATE sim3_user SET password = ? WHERE nrp = ?", array($password, $nrp));
	}

	function select_password($nrp)
	{
		$query = $this->db->query("SELECT password FROM sim3_user WHERE nrp = ?", array($nrp));
		return $query->result();
	}

	function data_export($tahun)
	{
		$query = $this->db->query("SELECT b.nrp AS nrp, b.nama AS nama, d.nama AS departemen, f.nama AS fakultas, b.sex AS jenis_kelamin, b.status AS status, b.ttl AS ttl, b.no AS no, b.email AS email, b.asal AS asal, b.kos AS kos, b.pesantren AS pesantren, b.alamatpesantren AS alamatpesantren, b.tk AS tk, b.sd AS sd, b.smp AS smp, b.sma AS sma, b.ayah AS ayah, b.ibu AS ibu FROM sim3_bio AS b, sim3_departemen AS d, sim3_fakultas AS f WHERE b.departemen = d.id AND d.fakultas = f.id AND b.angkatan = ? ORDER BY b.nrp", array($tahun));
		return $query->result();
	}

	function log($nrp, $log)
	{
		$query = $this->db->query("INSERT INTO sim3_log(nrp, log, waktu) VALUES (?, ?, CURRENT_TIMESTAMP)", array($nrp, $log));
	}
}
?>
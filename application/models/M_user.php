<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model {
	public function __construct() {
		parent::__construct();
		// $this->load->library('session');
	}

	/*
	得到全部成員getAllUser()
	得到成員資料
	*/

	/*
	 * 函數名稱
	 * 說明
	 * @param   $abc 		string
	 * @return 	$r3[] = [$user_name, $empno, $r1, $r2];
	*/
	public function register($account, $password) {
		$sql = 'INSERT INTO  users(`account`,`password`) VALUES (?,?)';
		$q = $this->db->query($sql, [$account, md5($password)]);
		if ($this->db->affected_rows() > 0) {
			$r = true;
		} else {
			$r = false;
		}
		return $r;
	}
}

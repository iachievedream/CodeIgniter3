<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}

	/*
	註冊register($account,$password)

	登入login($account,$password)

	登出logout

	頁面驗證SessionVerification

	是否登入狀態isLogin()

	得到session getSession($account)

	清除session clearSession

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

	public function login($account, $password) {
		$sql = 'SELECT * FROM  `users` WHERE `account`=? and password=?';
		$q = $this->db->query($sql, [$account, md5($password)]);
		if ($q->num_rows() > 0) {
			//   $r = $q->first_row('array');
			$r = true;
		} else {
			$r = false;
		}
		return $r;
	}

	// public function isLogin() {
	// 	if ($this->session->userdata(PROJECT_NAME . '_user_id') == false ||
	// 		$this->session->userdata(PROJECT_NAME . '_user_account') == false
	// 	) {
	// 		return false;
	// 	} else {
	// 		return true;
	// 	}
	// }

	public function getSession($account) {
		$sql = 'SELECT * FROM `users` WHERE `account`=?';
		$q = $this->db->query($sql, $account);
		echo $q->num_rows();
		if ($q->num_rows() > 0) {
			$r = $q->first_row('array');
			$account_id = $r['id'];
			$this->session->set_userdata(PROJECT_NAME . '_user_id', $account_id);
			$this->session->set_userdata(PROJECT_NAME . '_user_account', $account);
		} else {
			$this->ClearSession($account);
		}
	}

	public function clearSession() {
		$this->session->unset_userdata(PROJECT_NAME . '_user_id');
		$this->session->unset_userdata(PROJECT_NAME . '_user_account');
	}
}

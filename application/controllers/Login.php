<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('loginpage');
	}

	public function sign_in() {
		$account = $this->input->post('account');
		$password = $this->input->post('password');
		if (!empty($account) and !empty($password)) {
			$sql = 'SELECT * FROM  users WHERE account=? and password=?';
			$q = $this->db->query($sql, [$account, md5($password)]);
			if ($q->num_rows() > 0) {
				//   $r = $q->first_row('array');
				$r = true;
			} else {
				$r = false;
			}
		} else {
			$r = false;
		}

		if ($r) {
			// echo '正確';
		// $this->load->model('m_login');
			// $this->m_login->AccountLogin($account);
			// redirect('/layout_dashboard');
		} else {
			echo '錯誤';
			redirect('/loginpage');
		}

		// echo base_url();
		// echo '成功';
		// echo $r;
		// return $r;

		$this->data['title'] = '出勤狀況';
		$this->data['content'] = 'checkin.php';
		$this->load->view('layout_dashboard', $this->data);
	}

	public function register() {
		$account = $this->input->post('account');
		$password = $this->input->post('password');
		$sql = 'INSERT INTO  users(`account`,`password`) VALUES (?,?)';
		$q = $this->db->query($sql, [$account, md5($password)]);
		if ($this->db->affected_rows() > 0) {
		} else {
		}
		echo '成功';
	}

	public function AccountLogin($name, $password) {
	}

	public function GetSession() {
	}
}

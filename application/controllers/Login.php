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

	public function index2() {
		$this->load->view('register');
	}

	public function sign_in() {
		$account = $this->input->post('account');
		$password = $this->input->post('password');
		$this->load->model('m_login');
		if ($this->m_login->login($account, $password)) {
			$this->m_login->getSession($account);
			// 寫入log
			$this->load->model('m_log');
			$this->m_log->add($this->router->fetch_class(), $this->router->fetch_method(), $account . '登入', '');
		// echo '正確';
		} else {
			// echo '錯誤';
			redirect('/');
		}
		// echo '成功';
		// echo base_url();//127.0.0.1
		redirect('/dashboard');
	}

	public function register() {
		$account = $this->input->post('account');
		$password = $this->input->post('password');
		$sql = 'INSERT INTO  users(`account`,`password`) VALUES (?,?)';
		$q = $this->db->query($sql, [$account, md5($password)]);
		if ($this->db->affected_rows() > 0) {
		} else {
		}
		echo '註冊成功，需手動登入原登入頁面';
	}

	public function logout() {
		$this->load->model('m_login');
		$this->m_login->clearSession();
		redirect('/');
	}
}

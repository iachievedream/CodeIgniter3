<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata(PROJECT_NAME . '_user_account') == '') {
			redirect('/');
		}
	}

	public function index() {
		$this->data['title'] = '主頁';
		$this->data['content'] = 'dashboard.php';
		$this->load->view('layout_dashboard', $this->data);
	}
}

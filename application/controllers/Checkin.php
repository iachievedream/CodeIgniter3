<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata(PROJECT_NAME . '_user_account') == '') {
			redirect('/');
		}
	}

	public function index() {
		$date = date('Y-m-d');
		$this->load->model('m_check');
		$check = $this->m_check->getAllCheck($date);
		// echo '<pre>';
		// print_r($check);
		// echo '</pre>';
		$this->data['r'] = $check;
		$this->data['title'] = '出勤系統';
		$this->data['content'] = 'check.php';
		$this->load->view('layout_dashboard', $this->data);
	}

	/*
	出勤頁面index
	上班簽到按鈕功能checkInTime
	下班簽到按鈕功能checkOutTime
	測試功能test
	*/

	public function checkeIn() {
		$account = $this->session->userdata(PROJECT_NAME . '_user_account');
		$date = date('Y-m-d');
		$in_time = date('H:i:s');
		$this->load->model('m_check');
		$r = $this->m_check->createCheckIn($account, $date, $in_time);
		if ($r = true) {
			echo '上班打卡成功';
		} else {
			echo '上班打卡失敗';
		}
	}

	public function checkeOut() {
		$account = $this->session->userdata(PROJECT_NAME . '_user_account');
		$date = date('Y-m-d');
		$out_time = date('H:i:s');
		$this->load->model('m_check');
		$r = $this->m_check->createCheckOut($account, $date, $out_time);
		if ($r = true) {
			echo '下班打卡成功';
		} else {
			echo '下班打卡失敗';
		}
	}

	public function test() {
		$account = $this->session->userdata(PROJECT_NAME . '_user_account');
		$date = date('Y-m-d');
		$in_time = date('H:i:s');
		$out_time = date('H:i:s', strtotime('+3 hours'));
		$this->load->model('m_check');
		$r = $this->m_check->createCheck($account, $date, $in_time, $out_time);
		if ($r = true) {
			echo '成功';
		} else {
			echo '失敗';
		}
	}
}

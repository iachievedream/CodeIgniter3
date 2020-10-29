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

	/*
	先用getAllCheck抓到所有人的打卡資訊
	再用打卡資訊中讀account做參數使用getAllUser取得正常上下班的時間，
	兩個時間判斷是否正常上下班，在修改資料庫的數值
	*/

	public function index() {
		$date = date('Y-m-d');
		$this->load->model('m_check');
		$all_check = $this->m_check->getAllCheck();
		// echo '<pre>';
		// print_r($all_check);
		// echo '</pre>';
		$this->load->model('m_user');
		foreach ($all_check as $k => $v) {
			$all_user = $this->m_user->getUser($v['account']);
			// echo '<pre>';print_r($all_user);echo '</pre>';
			$in_time = $v['in_time'];
			$work_am_start = $all_user['0']['work_am_start'];
			// echo '打卡時間' . $in_time . ' 上班時間' . $work_am_start . '<br>';
			if ($this->m_check->isCheckInNormal($in_time, $work_am_start)) {
				// echo '上班正常';
				$this->m_check->changeCheckIn($v['account'], $date, 2);
			} else {
				// echo '上班異常';
				$this->m_check->changeCheckIn($v['account'], $date, 3);
			}

			$out_time = $v['out_time'];
			$work_pm_end = $all_user['0']['work_pm_end'];
			// echo '打卡時間' . $out_time . ' 下班時間' . $work_pm_end . '<br>';
			if ($this->m_check->isCheckOutNormal($out_time, $work_pm_end)) {
				$this->m_check->changeCheckOut($v['account'], $date, 2);
			} else {
				$this->m_check->changeCheckOut($v['account'], $date, 3);
			}
			$all_check[$k]['in_status'] = $this->m_check->getCheckStatus($v['in_status']);
			$all_check[$k]['out_status'] = $this->m_check->getCheckStatus($v['out_status']);
		}
		$this->data['r'] = $all_check;
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

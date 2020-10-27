<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_check extends CI_Model {
	public function __construct() {
		parent::__construct();
		// $this->load->library('session');
	}

	/*
	確認是否存在isExist($account,$date,$in_time,$out_time)
	建立check資料createCheck($account,$date,$in_time,$out_time)
	得到check全部資料getAllCheck($date)
	得到check單一資料getCheck($account,$date)

	建立上班打卡資料createCheckIn($account,$date,$in_time)
	判斷上班打卡資料isCheckInNormal($account,$date,$in_status)
	更改上班打卡狀態changeCheckIn($account,$date,$in_status)

	建立下班打卡資料createCheckOut($account,$date,$out_time)
	判斷下班打卡資料isCheckOutNormal($account,$date,$out_status)
	更改下班打卡狀態changeCheckOut($account,$date,$in_status)

	*/
	public function isExist($account,$date,$in_time,$out_time){
		// $sql  =  "SELECT `in_time` FROM `check` WHERE ";
		// $q    =  $this->db->query($sql);
		// if($q->num_rows() > 0){
	   	// 	$r = $q->first_row('array');
		// }
	}
	public function createCheck($account,$date,$in_time,$out_time){
		$sql  =  "INSERT INTO `check` (`account`,`date`,`in_time`,`out_time`) VALUES (?,?,?,?)";
		$q    =  $this->db->query($sql,array($account,$date,$in_time,$out_time));
		if($this->db->affected_rows()>0)
		{
			$r=true;
		}else{
			$r=false;
		}
		return $r;
	}
	public function getAllCheck($date){
		$sql  =  "SELECT * FROM `check`";
		$q    =  $this->db->query($sql);
		if($q->num_rows() > 0){
			$r = $q->result_array();
		}else{
			$r=false;
		}
		return $r;
	}
	public function getCheck($account,$date){
		$sql  =  "SELECT * FROM `check` WHERE account=?";
		$q    =  $this->db->query($sql,$account);
		if($q->num_rows() > 0){
			$r = $q->result_array();
		}else{
			$r=false;
		}
		return $r;
	}
	public function createCheckIn($account,$date,$in_time){
		// $sql  =  "INSERT INTO `check` (in_time) VALUES (?) WHERE `account`=? AND `date`=?";
		// $q    =  $this->db->query($sql,array($in_time,$account,$date));
		$sql  =  "INSERT INTO `check` (`account`,`date`,`in_time`) VALUES (?,?,?)";
		$q    =  $this->db->query($sql,array($account,$date,$in_time));
		if($this->db->affected_rows()>0)
		{
			$r=true;
		}else{
			$r=false;
		}
		return $r;
	}
	public function isCheckInNormal($account,$date,$in_status){
		if($q->num_rows() > 0){
			$r = $q->first_row('array');
		}
	}
	public function changeCheckIn($account,$date,$in_status){

	}
	public function createCheckOut($account,$date,$out_time){
		// $sql  =  "INSERT INTO `check` (out_time) VALUES (?) WHERE `account`=? AND `date`=?";
		// $q    =  $this->db->query($sql,array($out_time,$account,$date));
		$sql  =  "INSERT INTO `check` (`account`,`date`,`out_time`) VALUES (?,?,?)";
		$q    =  $this->db->query($sql,array($account,$date,$out_time));
		if($this->db->affected_rows()>0)
		{
			$r=true;
		}else{
			$r=false;
		}
		return $r;

	}
	public function isCheckOutNormal($account,$date,$out_status){

	}
	public function changeCheckOut($account,$date,$in_status){

	}

	/*
	 * 函數名稱
	 * 說明
	 * @param   $abc 		string
	 * @return 	$r3[] = [$user_name, $empno, $r1, $r2];
	*/
}

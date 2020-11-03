<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_log extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function add($controller, $function, $title, $content) {
		$sql = 'INSERT INTO log (date_created,controller_name,function_name,log_title,log_content) VALUES (?,?,?,?,?)';
		$q = $this->db->query($sql, [date('Y-m-d H:i:s'), $controller, $function, $title, $content]);
		if ($this->db->affected_rows() > 0) {
			//$this->db->insert_id();
			return true;
		} else {
			return false;
		}
	}
}

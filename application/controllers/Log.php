<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller {
	public $crud;

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata(PROJECT_NAME . '_user_account') == '') {
			redirect('/');
		}
		$this->load->library('grocery_CRUD');
		$this->crud = new grocery_CRUD();
		$this->crud->set_language('chinese');
		$this->crud->unset_jquery();
	}

	public function index() {
		$crud = new grocery_CRUD();
		//資料表
		$crud->set_table('log');
		$crud->set_subject('紀錄');
		//顯示欄位
		$crud->columns('id', 'date_created', 'controller_name', 'function_name', 'log_title', 'log_content');
		$crud->display_as('id', 'ID');
		$crud->display_as('date_created', '時間');
		$crud->display_as('controller_name', 'class');
		$crud->display_as('function_name', 'function');
		$crud->display_as('log_title', '標題');
		$crud->display_as('log_content', '內容');

		$output = $crud->render();
		// $this->load->view('Grocery.php', (array)$output);

		// $this->data['title'] = '紀錄';
		// $this->data['content'] = 'Grocery.php';
		// $this->load->view('layout_dashboard', $this->data);

		$this->data['title'] = '記錄';
		$this->data['content'] = 'crudpage.php';
		$this->load->view('crudpage.php', $this->data);
		$this->load->view('layout_dashboard', (array)$output);
	}
}

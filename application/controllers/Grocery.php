<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Grocery extends CI_Controller {
	public $crud;

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		// $this->crud = new grocery_CRUD();
		// $this->crud->set_language('chinese');
		// $this->crud->unset_jquery();
	}

	public function index() {
		$crud = new grocery_CRUD();
		// $crud->set_theme('datatables');//??
		//資料表
		$crud->set_table('message_board');
		$crud->set_subject('留言板');
		//顯示欄位
		$crud->columns('id', 'name', 'msg', 'create_time', 'update_time');
		//必填
		$crud->required_fields('name', 'msg');
		//欄位顯示名稱
		$crud->display_as('id', 'ID');
		$crud->display_as('name', '姓名');
		$crud->display_as('msg', '留言');
		$crud->display_as('create_time', '新增時間');
		$crud->display_as('update_time', '更新時間');
		//關聯
		$crud->set_relation('name', 'users', 'account');
		//排列規則
		$crud->order_by('id', 'ASC');//DESC
		//模板的css
		$crud->set_field_upload('file_url', 'assets/uploads/files');
		// $crud->unset_add();
		// $crud->unset_delete();
		// $crud->unset_columns('productDescription');
		// $crud->callback_column('buyPrice',array($this,'valueToEuro'));

		//新增顯示欄位
		$crud->add_fields('name', 'msg');
		//自動插入新增時間
		$crud->callback_after_insert(function ($post_array, $primary_key) {
			$p['create_time'] = date('Y-m-d H:i:s');
			$p['update_time'] = date('Y-m-d H:i:s');
			$this->db->update('message_board', $p, ['id' => $primary_key]);
			return true;
		});

		//編輯顯示欄位
		$crud->edit_fields('name', 'msg');
		//自動更新更新時間
		$crud->callback_after_update(function ($post_array, $primary_key) {
			$p['update_time'] = date('Y-m-d H:i:s');
			$this->db->update('message_board', $p, ['id' => $primary_key]);
			return true;
		});
		//編輯選擇欄位(mysql指令)
		$crud->callback_field(
			'name',
			function ($value, $primary_key) {
				$html = '<select name=name>';
				$sql = 'SELECT id,account FROM users';
				// $sql = "SELECT u.account,m.name FROM users AS u, messageboard AS m  WHERE u.id=m.iname";
				$q = $this->db->query($sql);
				if ($q->num_rows() > 0) {
					$r = $q->result_array();
					foreach ($r as $k => $v) {
						if ($value == $v['account']) {
							$html .= '<option value=' . $v['id'] . ' selected>' . $v['account'] . '</option>';
						} else {
							$html .= '<option value=' . $v['id'] . '>' . $v['account'] . '</option>';
						}
					}
				}
				$html .= '</select>';
				return $html;
			}
		);

		$output = $crud->render();
		// $this->index1($output);

		// $this->data['title']	= "記錄";
		// $this->data['content'] = "crudpage.php";
		// $this->load->view('index1.php',$this->data);
		$this->load->view('Grocery.php', (array)$output);
	}

	public function user() {
		// $crud = $this->crud;
		$crud = new grocery_CRUD();
		$crud->set_table('users');
		$crud->set_subject('使用者帳號');
		$crud->columns('id', 'account', 'date_created','date_last');

		$crud->display_as('id', '編號');
		$crud->display_as('account', '使用者');
		$crud->display_as('date_created', '建立日期');
		$crud->display_as('date_last', '修改日期');
		//模板的css
		$crud->set_field_upload('file_url', 'assets/uploads/files');
		//新增顯示欄位
		$crud->add_fields('account');
		//自動插入新增時間
		$crud->callback_after_insert(function ($post_array, $primary_key) {
			$p['date_created'] = date('Y-m-d H:i:s');
			$p['date_last'] = date('Y-m-d H:i:s');
			$this->db->update('users', $p, ['id' => $primary_key]);
			return true;
		});

		//編輯顯示欄位
		$crud->edit_fields('account');
		//自動更新更新時間
		$crud->callback_after_update(function ($post_array, $primary_key) {
			$p['date_last'] = date('Y-m-d H:i:s');
			$this->db->update('users', $p, ['id' => $primary_key]);
			return true;
		});

		//傳送view資料過去
		$output = $crud->render();
		$this->load->view('Grocery', (array)$output);
	}

	public function datetime() {
		$a = '2020-08-01 12:00:00';
		$b = '2020-08-02 13:30:30';
		echo '<br>';
		// echo date('Y-m-d H:i:s',strtotime($a));

		$total = strtotime($b) - strtotime($a);
		// $data = $c/60/60/24;
		// $hour = $c/60/60;
		// $minute = $c/60;

		$day = $total / (60 * 60 * 24);
		echo $day . '天';
		echo '<br>';

		$total1 = $total - (floor($day) * 60 * 60 * 24);
		$hour = $total1 / (60 * 60);
		echo $hour . '時';
		echo '<br>';

		$total2 = $total1 - (floor($hour) * 60 * 60);
		$minute = $total2 / 60;
		echo $minute . '分';
		echo '<br>';

		$total3 = $total2 - (floor($minute) * 60);
		$datasecond = $total3;
		echo $datasecond . '秒';
		echo '<br>';
		echo '<br>';
		echo $day . '天' . $hour . '時' . $minute . '分' . $datasecond . '秒';
	}

	public function age() {
		// $born = "2010-08-16";
		// $born = "2010-08-17";
		$born = '2010-08-18';

		list($year, $month, $day) = explode('-', $born);
		$year_diff = date('Y') - $year;
		$month_diff = date('m') - $month;
		$day_diff = date('d') - $day;
		echo $month_diff;
		if ($month_diff > 0) {
			$ageyear = $year_diff;
		} elseif ($month_diff == 0) {
			if ($day_diff >= 0) {
				$ageyear = $year_diff;
			} else {
				$ageyear = $year_diff - 1;
			}
		} else {
			$ageyear = $year_diff - 1;
		}
		echo '年紀為' . $ageyear . '歲';
	}

	public function vacation() {
		$thisday = '2020-08-17'; //date('Y-m-d H:i:s');
		$thisday = date('Y-m-d H:i:s');
		// $thisday = "2020-09-3";
		$weekday = date('w', strtotime($thisday));
		//sun 1 2 3 4 5 6
		//  0 1 2 3 4 5
		//$weekday = $weekday-1;

		if ($weekday == 0) {
			$weekday = 7;
		} else {
			$weekday -= 1;
		}

		//該週的第一天
		$week_fday = date('Y-m-d', strtotime("$thisday -" . ($weekday) . ' days'));
		//該週的最後一天
		$week_lday = date('Y-m-d', strtotime("$week_fday +6 days"));
		echo '<br>' . $week_fday . '為第一天<br>' . $week_lday . '為最後一天<br><br>';

		// $week [] = $week_fday;
		$week[] = date('Y-m-d', strtotime("$week_fday"));
		$week[] = date('Y-m-d', strtotime("$week_fday +1 days"));
		$week[] = date('Y-m-d', strtotime("$week_fday +2 days"));
		$week[] = date('Y-m-d', strtotime("$week_fday +3 days"));
		$week[] = date('Y-m-d', strtotime("$week_fday +4 days"));
		$week[] = date('Y-m-d', strtotime("$week_fday +5 days"));
		$week[] = date('Y-m-d', strtotime("$week_fday +6 days"));
		// for ($i=0;$i<6;$i++){
		// $week_fday = "$week_fday +i days";
		// $week [] = date("Y-m-d", strtotime("$week_fday +1 days"));
		// $week [] = date("Y-m-d", strtotime("$week_fday +i days"));
		// $week [] = date("Y-m-d", strtotime("$week_fday"));
		// }

		// $week [] = $week_fday+1 days;
		for ($i = 0;$i < 2;$i++) {
			// foreach ($week as $ab){
			// echo $ab."<br>";
			$sql = 'select * from vacation where day=' . $week[$i];
		}
	}

	public function usersession() {
	}

	public function ABC() {
		// $thisday = time();
		$thisday = '2020-07-21';
		$r = $this->weeknowday(0, $thisday);
		// echo "<pre>";print_r($r);echo "</pre>";
		echo '<br><br>這周';
		foreach ($r as $k => $v) {
			if (!empty($v[0])) {
				$r2 = $v[0];
				// echo "<pre>";print_r($r);echo "</pre>";
				echo '<br><br>這天請假人員<br>';
				foreach ($r2 as $k2 => $v2) {
					echo $v2['name'] . ' 日期 : ' . $v2['off_date'] . ' 事由 : ' . $v2['type_name'] . '<br>';
				}
			}
		}
	}

	public function weeknowday($nuber, $thisday) {
		echo '今天日期' . $thisday . '<br>';
		// $today = date("Y-m-d",strtotime($thisday));
		$weeknowday = date('w', strtotime($thisday));
		// $today = date($thisday);
		echo '今天周' . $weeknowday . '<br>';

		$Sunday = date('Y-m-d', strtotime("$thisday-" . $weeknowday . ' days'));
		$weekf = date('Y-m-d', strtotime("$Sunday+" . '1 days'));
		echo '這周周一的日期' . $weekf . '<br>';
		//隔幾周的周一日期
		$thisweekf = date('Y-m-d', strtotime("$weekf+" . ($nuber * 7) . ' days'));
		echo '隔幾周的周一的日期' . $thisweekf . '<br>';
		$r = $this->week($thisweekf);
		return $r;
	}

	public function week($thisweekf) {
		$week = [];
		for ($i = 0; $i < 7; $i++) {
			// echo $i."<br>";
			$week[$i] = date('Y-m-d', strtotime("$thisweekf+" . ' ' . $i . ' days'));
			// echo $week[$i]."<br>";
		}
		// echo "<pre>";print_r($week);echo "</pre>";
		// $r =array();
		foreach ($week as $k => $v) {
			// echo "<pre>";print_r($v);echo "</pre>";
			$r[] = $this->sqlday($v);
		}
		return $r;
	}

	public function sqlday($week) {
		$r = [];
		$sql = 'SELECT b.name,v.off_date,vt.type_name FROM vacation AS v, bsuser AS b, vacation_type AS vt  WHERE v.user_id=b.id AND v.vacation_type_id=vt.id  AND off_date=?';
		// echo $sql;
		// echo $week;
		// return $sql;
		$q = $this->db->query($sql, $week);
		if ($q->num_rows() > 0) {
			$r[] = $q->result_array();
		}
		// echo "<pre>";print_r($r);echo "</pre>";
		return $r;
	}
}

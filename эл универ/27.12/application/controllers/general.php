<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Controller {


	public function index()
	{
		if ($this->session->userdata('USER_LOGININ')) 
			$this->load->view('profile');
		else $this->load->view('login');
	}
	
	function profile()
	{
		if (!$this->session->userdata('USER_LOGININ')) $this->my->mesSend(1,'Доступно только для авторизованных пользователей', base_url().'index.php/general');
		$this->load->view('profile');
	}
	
	function statistic($group = "", $mode = "", $year = "", $month = "")
	{
		$group = $this->my->FormChars($group);
		$mode = $this->my->FormChars($mode);
		$year = $this->my->FormChars($year);
		$month = $this->my->FormChars($month);
		if (!$this->session->userdata('USER_LOGININ')) $this->my->mesSend(1,'Доступно только для авторизованных пользователей', base_url().'index.php/general');
		if ($group == "") if ($this->session->userdata('ACCESS')<2) {$group = $this->session->userdata('GROUP');}
		else $this->my->mesSend(1,'Не указанна группа', base_url().'index.php/general');
		if ($mode == "") $mode = 1;
		if (($year == "") or ($month == "")) {$year = date("Y"); $month = date("m");}
		if (!(($month>8 or $month<6) and (($month<=date("m")and$year==date("Y"))or($year<date("Y"))))) $this->my->mesSend(1,'Выход за доступные временные рамки', base_url().'index.php/general/statistic/'.$group);
		$data['group'] = $group;
		$data['year'] = $year;
		$data['month'] = $month;
		$data['mode'] = $mode;
		$this->load->view('stat', $data);
	}
	
	function tops($group = "", $mode = "", $year = "", $month = "")
	{
		$group = $this->my->FormChars($group);
		$mode = $this->my->FormChars($mode);
		$year = $this->my->FormChars($year);
		$month = $this->my->FormChars($month);
		if (!$this->session->userdata('USER_LOGININ')) $this->my->mesSend(1,'Доступно только для авторизованных пользователей', base_url().'index.php/general');
		if ($group == "") $group = 'PI_2_01';
		if ($mode == "") $mode = 1;
		if (($year == "") or ($month == "")) {$year = date("Y"); $month = date("m");}
		$data['group'] = $group;
		$data['year'] = $year;
		$data['month'] = $month;
		$data['mode'] = $mode;
		$this->load->view('top', $data);
	}
	
	function calendar($mode = "", $group = "")
	{
		$mode = $this->my->FormChars($mode);
		$group = $this->my->FormChars($group);
		if (!$this->session->userdata('USER_LOGININ')) $this->my->mesSend(1,'Доступно только для авторизованных пользователей', base_url().'index.php/general');
		if ($this->session->userdata('ACCESS') < 2) $group = $this->session->userdata('GROUP');
		if (($group == "")or($mode == "")) $this->my->mesSend(1,'Не указанн режим либо группа', base_url().'index.php/general');
		$data['group'] = $group;
		$data['mode'] = $mode;
		$this->load->view('general', $data);
	}
	
	function ff()
	{
		$this->load->view('ff');
	}
	
	function jurnal($group, $year = ' ', $month = ' ', $day = ' ')
	{
		//экранирование полученных параметров, через функцию, ранее созданную в пользовательской библиотеке
		$group = $this->my->FormChars($group);
		$month = $this->my->FormChars($month);
		$day = $this->my->FormChars($day);
		$year = $this->my->FormChars($year);
		//проверка авторизации
		if (!$this->session->userdata('USER_LOGININ')) $this->my->mesSend(1,'Доступно только для авторизованных пользователей', base_url().'index.php/general');
		if ($year == ' ') 
		{
			$year = date("Y");
			$month = date("m");
			$day = date("d");
		}
		//проверка наявности параметров, а также их правильность
		if (!$group or !$month or !$day or $month < 1 or $month > 12) $this->my->mesSend(1,'Дата либо группа не были указаны либо были указаны неверно', base_url().'index.php/general');
		if ($day < 1 or $day > date("t", strtotime($year."-".$month))) $this->my->mesSend(1,'Дата была указана неверно', base_url().'index.php/general');
		//проверка, входит ли день в диапазон обучения
		$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'.txt';
		if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
		$table = unserialize( fread($file_handle, filesize($file_pointer)) );
		fclose($file_handle);
		if (isset($table[5])) $sat = 8; else $sat = 6;
		if (isset($table[0])) $mon = 8; else $mon = 1;
		if (date("w", strtotime($day.'-'.$month.'-'.$year)) == 0 || date("w", strtotime($day.'-'.$month.'-'.$year)) == $mon || date("w", strtotime($day.'-'.$month.'-'.$year)) == $sat) $this->my->mesSend(1,'Дата была указана неверно', base_url().'index.php/general/calendar');
		else
		if (date("m") > 8 && (($month < 9 && $year == date("Y"))||($month > 5 && $year == date("Y")+1)||($year < date("Y")||$year > date("Y")+1))) $this->my->mesSend(1,'Дата была указана неверно', base_url().'index.php/general/calendar');
		else
		if (date("m") < 6 && (($month < 9 && $year == date("Y")-1)||($month > 5 && $year == date("Y"))||($year < date("Y")-1||$year > date("Y")))) $this->my->mesSend(1,'Дата была указана неверно', base_url().'index.php/general/calendar');
		//загрузка вида jurnal с передачей ему параметров
		$data['group'] = $group;
		$data['month'] = $month;
		$data['day'] = $day;
		$data['year'] = $year;
		$this->load->view('jurnal', $data);
	}
	
	function marks($group, $year = ' ', $month = ' ', $day = ' ')
	{
		//экранирование полученных параметров, через функцию, ранее созданную в пользовательской библиотеке
		$group = $this->my->FormChars($group);
		$month = $this->my->FormChars($month);
		$day = $this->my->FormChars($day);
		$year = $this->my->FormChars($year);
		//проверка авторизации
		if (!$this->session->userdata('USER_LOGININ')) $this->my->mesSend(1,'Доступно только для авторизованных пользователей', base_url().'index.php/general');
		if ($year == ' ') 
		{
			$year = date("Y");
			$month = date("m");
			$day = date("d");
		}
		//проверка наявности параметров, а также их правильность
		if (!$group or !$month or !$day or $month < 1 or $month > 12) $this->my->mesSend(1,'Дата либо группа не были указаны либо были указаны неверно', base_url().'index.php/general');
		if ($day < 1 or $day > date("t", strtotime($year."-".$month))) $this->my->mesSend(1,'Дата была указана неверно', base_url().'index.php/general');
		//проверка, входит ли день в диапазон обучения
		$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'.txt';
		if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
		$table = unserialize( fread($file_handle, filesize($file_pointer)) );
		fclose($file_handle);
		if (isset($table[5])) $sat = 8; else $sat = 6;
		if (isset($table[0])) $mon = 8; else $mon = 1;
		if (date("w", strtotime($day.'-'.$month.'-'.$year)) == 0 || date("w", strtotime($day.'-'.$month.'-'.$year)) == $mon || date("w", strtotime($day.'-'.$month.'-'.$year)) == $sat) $this->my->mesSend(1,'Дата была указана неверно', base_url().'index.php/general/calendar');
		else
		if (date("m") > 8 && (($month < 9 && $year == date("Y"))||($month > 5 && $year == date("Y")+1)||($year < date("Y")||$year > date("Y")+1))) $this->my->mesSend(1,'Дата была указана неверно', base_url().'index.php/general/calendar');
		else
		if (date("m") < 6 && (($month < 9 && $year == date("Y")-1)||($month > 5 && $year == date("Y"))||($year < date("Y")-1||$year > date("Y")))) $this->my->mesSend(1,'Дата была указана неверно', base_url().'index.php/general/calendar');
		//загрузка вида marks с передачей ему параметров
		$data['group'] = $group;
		$data['month'] = $month;
		$data['day'] = $day;
		$data['year'] = $year;
		$this->load->view('marks', $data);
	}
	
	function editTable($group = "")
	{
		if ((!$this->session->userdata('USER_LOGININ'))or($this->session->userdata('ACCESS')!=3)) $this->my->mesSend(1,'Доступно только для авторизованных пользователей 3 уровня доступа', base_url().'index.php/general');
		if (isset($_POST['surname'])) 
		{
			$this->load->model('mydb');
			$data = $this->mydb->get_article('teachers', 'login', 'surname', $_POST['surname']);
			if ($data)
				$group = $data[0]['login'];
			else
				$group = my::makeGroupNameCleanReverse($_POST['surname']);
		}
		$data['group'] = $group;
		$this->load->view('table_op', $data);
	}
}
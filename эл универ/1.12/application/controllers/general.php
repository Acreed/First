<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Controller {


	public function index()
	{
		if ($this->session->userdata('USER_LOGININ')) 
			exit(header('Location: '.base_url().'index.php/general/profile'));
		else $this->load->view('login');
	}
	
	function profile()
	{
		if (!$this->session->userdata('USER_LOGININ')) exit(header('Location: '.base_url().'index.php/general'));
		$this->load->view('profile');
	}
	
	function statistic($group = "", $mode = "", $year = "", $month = "")
	{
		$group = $this->my->FormChars($group);
		$mode = $this->my->FormChars($mode);
		$year = $this->my->FormChars($year);
		$month = $this->my->FormChars($month);
		if (!$this->session->userdata('USER_LOGININ')) exit(header('Location: '.base_url().'index.php/general'));
		if ($group == "") if ($this->session->userdata('ACCESS')<2) $group = $this->session->userdata('GROUP');
		if ($mode == "") $mode = 1;
		if (($year == "") or ($month == "")) {$year = date("Y"); $month = date("m");}
		if (date("m") > 8 && (($month < 9 && $year == date("Y"))||($month > 5 && $year == date("Y")+1)||($year < date("Y")||$year > date("Y")+1))) exit(header('Location: '.base_url().'index.php/general/statistic'));
		else
		if (date("m") < 6 && (($month < 9 && $year == date("Y")-1)||($month > 5 && $year == date("Y"))||($year < date("Y")-1||$year > date("Y")))) exit(header('Location: '.base_url().'index.php/general/statistic'));
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
		if (!$this->session->userdata('USER_LOGININ')) exit(header('Location: '.base_url().'index.php/general'));
		if ($group == "") $group = 'PI_2_01';
		if ($mode == "") $mode = 1;
		if (($year == "") or ($month == "")) {$year = date("Y"); $month = date("m");}
		$data['group'] = $group;
		$data['year'] = $year;
		$data['month'] = $month;
		$data['mode'] = $mode;
		$this->load->view('top', $data);
	}
	
	function calendar($group = "")
	{
		if (!$this->session->userdata('USER_LOGININ')) exit(header('Location: '.base_url().'index.php/general'));
		if ($this->session->userdata('ACCESS') < 2) $group = $this->session->userdata('GROUP');
		if ($group == "") $group = 'PI_2_01';
		$data['group'] = $group;
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
		if (!$this->session->userdata('USER_LOGININ')) exit(header('Location: '.base_url().'index.php/general'));
		if ($year == ' ') 
		{
			$year = date("Y");
			$month = date("m");
			$day = date("d");
		}
		//проверка наявности параметров, а также их правильность
		if (!$group or !$month or !$day or $month < 1 or $month > 12) exit(header('Location: '.base_url().'index.php/general'));
		if ($day < 1 or $day > date("t", strtotime($year."-".$month))) exit(header('Location: '.base_url().'index.php/general'));
		//проверка, входит ли день в диапазон обучения
		$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'.txt';
		if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
		$table = unserialize( fread($file_handle, filesize($file_pointer)) );
		fclose($file_handle);
		if (isset($table['sat'])) $sat = 8; else $sat = 6;
		if (isset($table['mon'])) $mon = 8; else $mon = 1;
		if (date("w", strtotime($day.'-'.$month.'-'.$year)) == 0 || date("w", strtotime($day.'-'.$month.'-'.$year)) == $mon || date("w", strtotime($day.'-'.$month.'-'.$year)) == $sat) exit(header('Location: '.base_url().'index.php/general/calendar'));
		else
		if (date("m") > 8 && (($month < 9 && $year == date("Y"))||($month > 5 && $year == date("Y")+1)||($year < date("Y")||$year > date("Y")+1))) exit(header('Location: '.base_url().'index.php/general/calendar'));
		else
		if (date("m") < 6 && (($month < 9 && $year == date("Y")-1)||($month > 5 && $year == date("Y"))||($year < date("Y")-1||$year > date("Y")))) exit(header('Location: '.base_url().'index.php/general/calendar'));
		//загрузка вида jurnal с передачей ему параметров
		$data['group'] = $group;
		$data['month'] = $month;
		$data['day'] = $day;
		$data['year'] = $year;
		$this->load->view('jurnal', $data);
	}
	function editTable($group)
	{
		if (!$this->session->userdata('USER_LOGININ')) exit(header('Location: '.base_url().'index.php/general')); 
		$data['group'] = $group;
		$this->load->view('table_op', $data);
	}
}
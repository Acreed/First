<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Controller {


	public function index()
	{
		if ($this->session->userdata('USER_LOGININ')) 
		{
			if ($this->session->userdata('ACCESS') < 2) exit(header('Location: '.base_url().'index.php/general/jurnal/'.$this->session->userdata('GROUP').'/'.date("Y").'/'.date("m").'/'.date("d"))); 
			else exit(header('Location: '.base_url().'index.php/general/calendar')); 
		}
		else $this->load->view('login');
	}
	
	function calendar($group)
	{
		if (!$this->session->userdata('USER_LOGININ')) exit(header('Location: '.base_url().'index.php/general'));
		if ($this->session->userdata('ACCESS') < 2) $group = $this->session->userdata('GROUP');
		if (!$group) $group = 'PI_2_01';
		$data['group'] = $group;
		$this->load->view('general', $data);
	}
	
	function ff()
	{
		$this->load->view('ff');
	}
	
	function jurnal($group, $year, $month, $day)
	{
		//экранирование полученных параметров, через функцию, ранее созданную в пользовательской библиотеке
		$group = $this->my->FormChars($group);
		$month = $this->my->FormChars($month);
		$day = $this->my->FormChars($day);
		$year = $this->my->FormChars($year);
		//проверка авторизации
		if (!$this->session->userdata('USER_LOGININ')) exit(header('Location: '.base_url().'index.php/general')); 
		//проверка наявности параметров, а также их правильность
		if (!$group or !$month or !$day or $month < 1 or $month > 12) exit(header('Location: '.base_url().'index.php/general'));
		if ($day < 1 or $day > date("t", strtotime($year."-".$month))) exit(header('Location: '.base_url().'index.php/general'));
		//проверка, входит ли день в диапазон обучения
		$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'/6ч.txt';
		if (file_exists($file_pointer)) $sat = 8; else $sat = 6;
		$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'/1ч.txt';
		if (file_exists($file_pointer)) $mon = 8; else $mon = 1;
		if (date("w", strtotime($day.'-'.$month.'-'.$year)) == 0 || date("w", strtotime($day.'-'.$month.'-'.$year)) == $mon || date("w", strtotime($day.'-'.$month.'-'.$year)) == $sat) exit(header('Location: '.base_url().'index.php/general/calendar'));
		else
		if (date("m") > 8 && ((date("m", strtotime($day.'-'.$month.'-'.$year)) < 9 && date("Y", strtotime($day.'-'.$month.'-'.$year)) == date("Y"))||(date("m", strtotime($day.'-'.$month.'-'.$year)) > 5 && date("Y", strtotime($day.'-'.$month.'-'.$year)) == date("Y")+1)||(date("Y", strtotime($day.'-'.$month.'-'.$year)) < date("Y")||date("Y", strtotime($day.'-'.$month.'-'.$year)) > date("Y")+1))) exit(header('Location: '.base_url().'index.php/general/calendar'));
		else
		if (date("m") < 6 && ((date("m", strtotime($day.'-'.$month.'-'.$year)) < 9 && date("Y", strtotime($day.'-'.$month.'-'.$year)) == date("Y")-1)||(date("m", strtotime($day.'-'.$month.'-'.$year)) > 5 && date("Y", strtotime($day.'-'.$month.'-'.$year)) == date("Y"))||(date("Y", strtotime($day.'-'.$month.'-'.$year)) < date("Y")-1||date("Y", strtotime($day.'-'.$month.'-'.$year)) > date("Y")))) exit(header('Location: '.base_url().'index.php/general/calendar'));
		//загрузка вида jurnal с передачей ему параметров
		$data['group'] = $group;
		$data['month'] = $month;
		$data['day'] = $day;
		$data['year'] = $year;
		$this->load->view('jurnal', $data);
	}
}
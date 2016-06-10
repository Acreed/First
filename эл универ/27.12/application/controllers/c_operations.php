<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Operations extends CI_Controller {


	public function index()
	{
		
	}
	
	//функция сохранения состояния журнала на заданный день
	function savejurnal($group, $year, $month, $day , $cFIO, $cClasses) 
	{
		//экранирование полученных параметров, через функцию, ранее созданную в пользовательской библиотеке
		$group = $this->my->FormChars($group);
		$year = $this->my->FormChars($year);
		$month = $this->my->FormChars($month);
		$day = $this->my->FormChars($day);
		$cFIO = $this->my->FormChars($cFIO);
		$cClasses = $this->my->FormChars($cClasses);
		//проверка авторизации
		if (!$this->session->userdata('USER_LOGININ')) $this->my->mesSend(1,'Доступно только для авторизованных пользователей', base_url().'index.php/general');
		//состовление строки из полученной информации методом POST
		$active = '';
		$n = 0;
		if (isset($_POST['active'])) $_POST['active'][count($_POST['active'])] = 'end';
		for ($j = 0; $j<$cFIO; $j++)
			for ($i = 0; $i<$cClasses;$i++)
			{
				if (isset($_POST['active']))
				{
					if ($_POST['active'][$n]==($i+1).'.'.($j+1)) 
					{
						$active .= '1 '; 
						$n++;
					}
					else $active .= '0 ';
				}
				else $active .= '0 ';
			}
		//загрузка модели для работы с бд
		$this->load->model('mydb');
		//создание, либо редактирование записи в бд
		$id = null;
		$data = $this->mydb->get_article('jurnal', 'id, day, month, active', 'group', $group);
		if ($data)
			foreach ($data as $item) 
				if (($item['day'] == $day)and($item['month'] == $month)) $id = $item['id'];
		if ($id)
		{
			$Edata['active'] = $active;
			$Edata['access'] = $this->session->userdata('ACCESS');
			$this->mydb->edit_article('jurnal', $Edata, 'id', $id);
			$logData['date'] = date("c");
			$logData['table'] = 'jurnal';
			$logData['login'] = $this->session->userdata('USER_LOGIN');
			$logData['data'] = 'active access';
			$logData['change'] = 'edit';
			$logData['edit_id'] = $id;
			$this->mydb->add_article('logs', $logData);
		}			
		else
		{
			$Edata['group'] = $group;
			$Edata['month'] = $month;
			$Edata['day'] = $day;
			$Edata['active'] = $active;
			$Edata['access'] = $this->session->userdata('ACCESS');
			$this->mydb->add_article('jurnal', $Edata);
			$logData['date'] = date("c");
			$logData['table'] = 'jurnal';
			$logData['login'] = $this->session->userdata('USER_LOGIN');
			$logData['change'] = 'add';
			$this->mydb->add_article('logs', $logData);
		}
		exit(header('Location: '.base_url().'index.php/general/jurnal/'.$group.'/'.$year.'/'.$month.'/'.$day)); 
		//$data['active'] = $active; $this->load->view("debug", $data);
		//$data['active'] = $_POST; $this->load->view("debug", $data);
	}
	
	function savemarks($group, $year, $month, $day , $cFIO, $cClasses) 
	{
		//экранирование полученных параметров, через функцию, ранее созданную в пользовательской библиотеке
		$group = $this->my->FormChars($group);
		$year = $this->my->FormChars($year);
		$month = $this->my->FormChars($month);
		$day = $this->my->FormChars($day);
		$cFIO = $this->my->FormChars($cFIO);
		$cClasses = $this->my->FormChars($cClasses);
		//проверка авторизации
		if (!$this->session->userdata('USER_LOGININ')) $this->my->mesSend(1,'Доступно только для авторизованных пользователей', base_url().'index.php/general');
		
		$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'.txt';
		if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
		$table = unserialize( fread($file_handle, filesize($file_pointer)) );
		fclose($file_handle);
		$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$this->session->userdata('USER_LOGIN').'les.txt';
		if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
		$tableLes = unserialize( fread($file_handle, filesize($file_pointer)) );
		fclose($file_handle);
		$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$this->session->userdata('USER_LOGIN').'gr.txt';
		if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
		$tableGr = unserialize( fread($file_handle, filesize($file_pointer)) );
		fclose($file_handle);
		$ii = 0;
		$unbanLes = 0;
		$wDay = date("w", strtotime($day.'-'.$month.'-'.$year))-1;
		$wdEN = ["mon", "tue", "wed", "thu", "fri", "sat"];
		$ch = date('W',strtotime($day.'.'.$month.'.'.$year));
		if(($ch % 2) == 0) $ch = 1; else $ch = 0; 
		$j=0;
		for ($i=0;$i<8;$i++)
		{
			if ((isset($tableGr[$wDay][$i*2+$ch]))and(isset($table[$wDay][$i*2+$ch])))
				if (($tableGr[$wDay][$i*2+$ch]==$group)and($tableLes[$wDay][$i*2+$ch]==$table[$wDay][$i*2+$ch]))
				{
					$unbanLes++;
					$nUnbanLess[$ii] = $j;
					$ii++;
				}
			if (isset($table[$wDay][$i*2+$ch])) $j++;
		}
		if (count($_POST['marks'])!=($unbanLes*$cFIO))
			$this->my->mesSend(1,'Введены неверные данные', base_url().'index.php/general/marks/'.$group.'/'.$year.'/'.$month.'/'.$day);
		$this->load->model('mydb'); //загрузка модели для работы с бд
		$data = mydb::get_article('marks', 'day, month, marks', 'group', $group);
		if ($data)
		{
			foreach ($data as $item) 
			{
				if (($item['day'] == $day)and($item['month'] == $month)) 
					$dbActive = $item['marks'];
			}
		}
		if (isset($dbActive))
			$markses = explode(" ", $dbActive);
		else
			for ($i=0;$i<$cClasses*$cFIO;$i++)
				$markses[$i] = '-';
		//состовление строки из полученной информации методом POST
		$marks = '';
		$ii=0;
		//if (isset($_POST['marks'])) $_POST['marks'][count($_POST['marks'])] = 'end';
		for ($i = 0; $i<$cFIO; $i++)
		{
			$ii = 0;
			for ($j = 0; $j<$cClasses; $j++)
			{
				if ($nUnbanLess[$ii]==$j)
				{
					$TrimMark = trim($_POST['marks'][$i*$unbanLes+$ii]);
					if ($TrimMark == "")
						$marks .= '-';
					else
						$marks .= $TrimMark;
					if (isset($nUnbanLess[$ii+1])) $ii++;
				}
				else
				{
					$marks .= $markses[$i*$cClasses+$j];
				}
				$marks .= ' ';
			}
		}
		//создание, либо редактирование записи в бд
		$id = null;
		$data = $this->mydb->get_article('marks', 'id, day, month, marks', 'group', $group);
		if ($data)
			foreach ($data as $item) 
				if (($item['day'] == $day)and($item['month'] == $month)) $id = $item['id'];
		if ($id)
		{
			$Edata['marks'] = $marks;
			$this->mydb->edit_article('marks', $Edata, 'id', $id);
			$logData['date'] = date("c");
			$logData['table'] = 'marks';
			$logData['login'] = $this->session->userdata('USER_LOGIN');
			$logData['data'] = 'marks';
			$logData['change'] = 'edit';
			$logData['edit_id'] = $id;
			$this->mydb->add_article('logs', $logData);
		}			
		else
		{
			$Edata['group'] = $group;
			$Edata['month'] = $month;
			$Edata['day'] = $day;
			$Edata['marks'] = $marks;
			$this->mydb->add_article('marks', $Edata);
			$logData['date'] = date("c");
			$logData['table'] = 'marks';
			$logData['login'] = $this->session->userdata('USER_LOGIN');
			$logData['change'] = 'add';
			$this->mydb->add_article('logs', $logData);
		}
		$this->my->mesSend(2,'Данные сохранены', base_url().'index.php/general/marks/'.$group.'/'.$year.'/'.$month.'/'.$day);
		//$data['active'][0] = $nUnbanLess[0]; $this->load->view("debug", $data);
	}
	
	function saveNU($group, $year, $month, $cFIO)
	{
		if (!$this->session->userdata('USER_LOGININ')) $this->my->mesSend(1,'Доступно только для авторизованных пользователей', base_url().'index.php/general');
		$this->load->model('mydb');
		$data = $this->mydb->get_article_sort('jurnal', 'id, day, month, active, access', 'day', 'group', $group);
		if ($data)
		{
			if (isset($_POST['active'][1])) 
				$i = 1; 
			else 
				$i = 0; //дабы избежать исключений
			$student = substr($_POST['active'][0], 0, strripos($_POST['active'][0], '.'));//отделение в 0 строке POST подстроки до первой точки, тоесть номер искомого студента в списке
			foreach ($data as $item) 
			{
				$studentPos = $student*(strlen($item['active'])/$cFIO); //позиция студента в строке active
				if ($item['month'] == $month)
				{
					if (strripos(substr($item['active'], $studentPos, (strlen($item['active'])/$cFIO)), "0") !== false)// поиск нулей в части строки active, отвечающей за искомого студента(поиск пропусков по неуваж. причине)
					{
						if ($item['day'] == substr($_POST['active'][$i], strripos($_POST['active'][0], '.') + 1))// проверка, есть ли галочка на этом дне в календаре
						{
							$dbFinish['active'] = substr_replace($item['active'], str_ireplace("0 ", "2 ", substr($item['active'], $studentPos, strlen($item['active'])/$cFIO)), $studentPos , strlen($item['active'])/$cFIO);// замена в подстроке с пропущенными парами студента 0 на 2 и замена в строке активности этой части на обновлённую
							$this->mydb->edit_article('jurnal', $dbFinish, 'id', $item['id']);
							$logData['date'] = date("c");
							$logData['table'] = 'jurnal';
							$logData['login'] = $this->session->userdata('USER_LOGIN');
							$logData['data'] = 'active';
							$logData['change'] = 'edit';
							$logData['edit_id'] = $item['id'];
							$this->mydb->add_article('logs', $logData);
							if (isset($_POST['active'][$i+1])) $i++;
						}
					}
					else if (strripos(substr($item['active'], $studentPos, (strlen($item['active'])/$cFIO)), "2") !== false)// поиск двоек в части строки active, отвечающей за искомого студента(поиск пропусков по уваж. причине)
					{
						if ($item['day'] != substr($_POST['active'][$i], strripos($_POST['active'][0], '.') + 1))// проверка, есть ли галочка на этом дне в календаре
						{
							$dbFinish['active'] = substr_replace($item['active'], str_ireplace("2 ", "0 ", substr($item['active'], $studentPos, strlen($item['active'])/$cFIO)), $studentPos , strlen($item['active'])/$cFIO);// замена в подстроке с пропущенными парами студента 0 на 2 и замена в строке активности этой части на обновлённую
							$this->mydb->edit_article('jurnal', $dbFinish, 'id', $item['id']);
							$logData['date'] = date("c");
							$logData['table'] = 'jurnal';
							$logData['login'] = $this->session->userdata('USER_LOGIN');
							$logData['data'] = 'active';
							$logData['change'] = 'edit';
							$logData['edit_id'] = $item['id'];
							$this->mydb->add_article('logs', $logData);
						}
						else
							if (isset($_POST['active'][$i+1])) $i++;
					}
				}
			}
		}
		//$data['active'] = $dbFinish1; $this->load->view("debug", $data);
		//$data['active'] = $_POST; $this->load->view("debug", $data);
		$this->my->mesSend(2,'Данные сохранены', base_url().'index.php/general/statistic/'.$group.'/1/'.$year.'/'.$month);
	}
	function saveTable($group)
	{
		$student = false;
		unset($_POST['enter']);
		if (isset($_POST['product']))
		{
			for ($i=0;$i<count($_POST['product']);$i++)
			{
				if ($_POST['product'][$i] != '')
				{
					if ($i%2!=0) $ch = 1; else $ch = 0;
					$tableGr[abs((floor($i/12)*12-$i)/2)][floor($i/12)*2+$ch] = $this->my->makeGroupNameCleanReverse($_POST['product'][$i]);
				}
			}
			unset($_POST['product']);
		}
		else $student = true;
		$j=0;
		foreach ($_POST as $item)
		{
			for ($i=0;$i<count($item);$i++)
				if ($item[$i] != '')
				{
					if ($i%2!=0) $ch = 1; else $ch = 0;
					$tableLes[floor($i/2)][$j*2+$ch] = $item[$i];
				}
			$j++;
		}
		if (!$student)
		{
			$file_pointer = $_SERVER['DOCUMENT_ROOT']."/table/".$group."les.txt";
			if (!$file_handle = fopen($file_pointer, 'wb')) exit;
			flock($file_handle, LOCK_EX);
			if (fwrite($file_handle, serialize($tableLes)) === false) exit;
			flock($file_handle, LOCK_UN);
			fclose($file_handle);
			
			$file_pointer = $_SERVER['DOCUMENT_ROOT']."/table/".$group."gr.txt";
			if (!$file_handle = fopen($file_pointer, 'wb')) exit;
			flock($file_handle, LOCK_EX);
			if (fwrite($file_handle, serialize($tableGr)) === false) exit;
			flock($file_handle, LOCK_UN);
			fclose($file_handle);
		}
		else
		{
			$file_pointer = $_SERVER['DOCUMENT_ROOT']."/table/".$group.".txt";
			if (!$file_handle = fopen($file_pointer, 'wb')) exit;
			flock($file_handle, LOCK_EX);
			if (fwrite($file_handle, serialize($tableLes)) === false) exit;
			flock($file_handle, LOCK_UN);
			fclose($file_handle);
		}
		$this->my->mesSend(2,'Данные сохранены', base_url().'index.php/general/editTable/'.$group);
		//$Fdata['active'] = $tableGr; $this->load->view('debug', $Fdata);
	}
}
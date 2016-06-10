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
		if (!$this->session->userdata('USER_LOGININ')) exit(header('Location: '.base_url().'index.php/general'));
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
	}
	
	function saveNU($group, $month, $cFIO)
	{
		if (!$this->session->userdata('USER_LOGININ')) exit(header('Location: '.base_url().'index.php/general'));
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
					if (strripos(substr($item['active'], $studentPos, strlen($item['active'])/$cFIO), "0") !== false)// поиск нулей в части строки active, отвечающей за искомого студента(поиск пропусков по неуваж. причине)
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
						}
					if (strripos(substr($item['active'], $studentPos, strlen($item['active'])/$cFIO), "2") !== false)// поиск двоек в части строки active, отвечающей за искомого студента(поиск пропусков по уваж. причине)
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
					if (isset($_POST['active'][$i+1])) $i++;
				}
			}
		}
		//$data['active'] = $dbFinish; $this->load->view("debug", $data);
		exit(header('Location: '.base_url().'index.php/general/statistic'));
	}
	function saveTable($group)
	{
		unset($_POST['enter']);
		$groups = array();
		$les = array();
		$i=0;
		foreach ($_POST as $item)
		{
			for ($j=0;$j<count($item);$j++)
			{
				$les[$i][$j] = substr($item[$j], 0, strpos($item[$j], " "));
				$groups[$i][$j] = substr($item[$j], strpos($item[$j], " ")+1);
			}
			$i++;
		}
		$file_pointer = $_SERVER['DOCUMENT_ROOT']."/table/".$group."les.txt";
		if (!$file_handle = fopen($file_pointer, 'wb')) exit;
		flock($file_handle, LOCK_EX);
		if (fwrite($file_handle, serialize($les)) === false) exit;
		flock($file_handle, LOCK_UN);
		fclose($file_handle);
		
		$file_pointer = $_SERVER['DOCUMENT_ROOT']."/table/".$group."gr.txt";
		if (!$file_handle = fopen($file_pointer, 'wb')) exit;
		flock($file_handle, LOCK_EX);
		if (fwrite($file_handle, serialize($groups)) === false) exit;
		flock($file_handle, LOCK_UN);
		fclose($file_handle);
		exit(header('Location: '.base_url().'index.php/general/editTable/'.$group)); 
		//$Fdata['active'] = $groups; $this->load->view('debug', $Fdata);
	}
}
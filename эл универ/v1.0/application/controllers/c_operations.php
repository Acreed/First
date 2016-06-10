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
		$data = mydb::get_article('jurnal', 'id, day, month, active', 'group', $group);
		if ($data)
		{
		foreach ($data as $item) {
			if (($item['day'] == $day)and($item['month'] == $month)) $id = $item['id'];
			}
		}
		if ($id)
		{
			$Edata['active'] = $active;
			$Edata['access'] = $this->session->userdata('ACCESS');
			$this->mydb->edit_article('jurnal', $Edata, 'id', $id);
		}			
		else
		{
			$Edata['group'] = $group;
			$Edata['month'] = $month;
			$Edata['day'] = $day;
			$Edata['active'] = $active;
			$Edata['access'] = $this->session->userdata('ACCESS');
			$this->mydb->add_article('jurnal', $Edata);
		}
		exit(header('Location: '.base_url().'index.php/general/jurnal/'.$group.'/'.$year.'/'.$month.'/'.$day)); 
		//$data['active'] = $_POST; $this->load->view("debug", $data);
	}
}
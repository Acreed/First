<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Account extends CI_Controller {


	public function index()
	{
		
	}
	
	//функция авторизации
	function login()
	{
		//экранирование полученных параметров, через функцию, ранее созданную в пользовательской библиотеке
		$_POST['login'] = $this->my->FormChars($_POST['login']);
		$_POST['password'] = $this->my->FormChars($_POST['password']);
		//проверка наявности параметров
		if (!$_POST['login'] or !$_POST['password']) exit(header('Location: '.base_url().'index.php/general'));
		//загрузка модели для работы с бд
		$this->load->model('mydb');
		//проверка совпадения полученных параметров с данными в бд
		$data = false;
		$Tlist = $this->mydb->table_list();
		for ($i=0;$i<count($Tlist);$i++) //в будущем эту херь удалить и сделать таблицы с пользователями в отдельной бд
			if (($Tlist[$i]=='jurnal')or($Tlist[$i]=='logs'))
				unset($Tlist[$i]); 
		sort($Tlist);
		for ($c = 0; $c < count($Tlist);$c++)
		{
			if (!$data) $data = $this->mydb->get_article($Tlist[$c], 'id, name, surname, fathername, login, password, access', 'login', $_POST['login']);
			if ($data) 
			{
				$group = $Tlist[$c];
				break;
			}
		}
		if ($data)
		{
			foreach ($data as $item)
			{
				if ($item['password'] != $_POST['password']) $this->my->mesSend(1,'Неверный логин или пароль', base_url().'index.php/general/login');
				$Ses['USER_ID'] = $item['id'];
				$Ses['USER_NAME'] = $item['name'];
				$Ses['USER_SURNAME'] = $item['surname'];
				$Ses['USER_FATHERNAME'] = $item['fathername'];
				$Ses['USER_LOGININ'] = 1;
				$Ses['USER_LOGIN'] = $item['login'];
				$Ses['USER_PASSWORD'] = $item['password'];
				$Ses['ACCESS'] = $item['access'];
				if ($item['access']<2)
				{
					$Ses['GROUP'] = $group; // VXP: Sooka, USER_GROUP блеать
					$Ses['USER_GROUP'] = $group;
				}
				else 
				{
					$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$_POST['login'].'les.txt';
					if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
					$table = unserialize( fread($file_handle, filesize($file_pointer)) );
					fclose($file_handle);
					$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$_POST['login'].'gr.txt';
					if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
					$groups = unserialize( fread($file_handle, filesize($file_pointer)) );
					fclose($file_handle);
					$ch = date('W');
					if(($ch % 2) == 0) $ch = 1; else $ch = 0; 
					$now = date("G")*60+date("m");
					$less= floor(($now - 480) / 105);
					$Ses['LESSNOW'] = $table[date("w")-1][$less*2+$ch];
				}
			}
			$this->session->set_userdata($Ses);
			if ($item['access']!=2) exit(header('Location: '.base_url().'index.php/general'));
			else exit(header('Location: '.base_url().'index.php/general/jurnal/'.$groups[date("w")-1][$less*2+$ch].'/'.date("Y").'/'.date("m").'/'.date("d")));
		}
		else $this->my->mesSend(1,'Неверный логин или пароль', base_url().'index.php/general');
	}
	
	//функция закрытия сессии
	function logout()
	{
		if ($this->session->userdata('USER_LOGININ') == 1)
		{
			$this->session->sess_destroy();
			exit(header('Location: '.base_url()));
		}
	}
}
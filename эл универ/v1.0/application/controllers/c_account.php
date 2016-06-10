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
	$data = $this->mydb->get_article('users', 'id, name, surname, login, password, access, group', 'login', $_POST['login']);
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
	$Ses['GROUP'] = $item['group'];
	};
	$this->session->set_userdata($Ses);
	exit(header('Location: '.base_url().'index.php/general'));
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
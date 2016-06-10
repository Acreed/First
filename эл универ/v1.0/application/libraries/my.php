<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class my {
	public function Headme($p1) //функция добавления названия вкладки
	{
	echo '<!DOCTYPE html><html><head><meta charset="utf-8" /><title>'.$p1.'</title><meta name="keywords" content="" /><meta name="description" content="" /><link href="/resource/style.css" rel="stylesheet" type="text/css" ><link rel="icon" href="/resource/img/icon.ico" type="image/x-icon"></head>'; //заголовок вкладки и её иконка
	}
	public function AddMenu() //функция добавления кнопок меню
	{
		$CI =& get_instance();
		if ($CI->session->userdata('USER_LOGININ') != 1) $Menu = '<a href="'.base_url().'index.php/first/register"><div class="Menu">Регистрация</div></a><a href="'.base_url().'index.php/first/login"><div class="Menu">Вход</div></a></div>';
		else $Menu = '<a href="'.base_url().'index.php/first/profile"><div class="Menu">Профиль</div></a><a href="'.base_url().'index.php/account/logout"><div class="Menu">Выход</div></a><a href="'.base_url().'index.php/first/chat"><div class="Menu">Чат</div></a></div>';
		echo '<div class="MenuHead"><a href="/"><div class="Menu">Главная</div></a><a href="'.base_url().'index.php/first/news"><div class="Menu">Новости</div></a><a href="'.base_url().'index.php/first/loads"><div class="Menu">Каталог файлов</div></a>'.$Menu;
	}
	function Footme() //функция добавления внизу в углу
	{
		echo '<footer class="footer">Gregmus</footer>';
	}
	function GenPass($p1, $p2) //зашифровка пароля
	{
		return md5('Gregmus'.md5('561'.$p1.'123').md5('152'.$p2.'512'));
	}
	function mesSend($p1,$p2,$p3) //отправка сообщения об ощибке например
	{
		$CI =& get_instance();
		if ($p1 == 1) $p1 = 'Ошибка';
		else if ($p1 == 2) $p1 = 'Подсказка';
		else if ($p1 == 3) $p1 = 'Сообщение3';
		$CI->session->set_flashdata('message', '<div class="MessageBlock"><b>'.$p1.'</b>: '.$p2.'</div>');
		if ($p3) exit(header('Location: '.$p3));
	}
	function mesShow() //показ того сообщения
	{
		$CI =& get_instance();
		if ($CI->session->flashdata('message')) echo $CI->session->flashdata('message');
		$CI->session->set_flashdata('message', array());
	}
	function FormChars($p1) //защита от взломов, путём (взломы путём) написания скрипта в поле для воода текста
	{
		return nl2br(htmlspecialchars(trim($p1), ENT_QUOTES), false);
	}
	function AddLogout()
	{
		echo '<a class="logout" href="'.base_url().'index.php/c_account/logout">Выход</a>';
	}
}
?>
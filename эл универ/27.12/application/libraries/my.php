<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class my {
	public function Headme($p1) //функция добавления названия вкладки
	{
	echo '<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8" />
			<title>'.$p1.'</title>
			<meta name="keywords" content="" />
			<meta name="description" content="" />
			<!--<meta name="viewport" content="width=device-width">-->
			<meta name="viewport" content="width=400">
			<link href="/resource/style.css" rel="stylesheet" type="text/css" >
			<link rel="icon" href="/resource/img/icon.ico" type="image/x-icon">
		</head>'; //заголовок вкладки и её иконка
	}
	function Menu()
	{
		$CI =& get_instance();
		$CI->load->model('mydb');
		$userAccess = $CI->session->userdata('ACCESS');
		$userLogin = $CI->session->userdata('USER_LOGIN');
		
		// $IKPI[курс][индекс группы]
		$IKPI = array();
		if ($userAccess > 2)
		{
			$Tlist = $CI->mydb->table_list();
			foreach($Tlist as $item)
			{
				for ($i=0;$i<strlen($item);$i++)
				{
					if (is_numeric($item[$i]))
					{
						$n=$item[$i];
						break;
					}
				}
				if (isset($n))
				{
					if(!isset($IKPI[$n][0]))
						$IKPI[$n] = array();
					array_push($IKPI[$n], $item);
				}
				$n=null;
			}
		}
		else if ($userAccess == 2)
		{
			// Korablinovagr.txt: $groups[день недели][пара] = группа
			$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$userLogin.'gr.txt';
			if (!$file_handle = fopen($file_pointer, 'rb')) exit;
		//	if ( filesize($file_pointer) <= 0 ) exit;
		//	$file_handle = fopen($file_pointer, 'rb');
		//	if (!$file_handle) exit;
			$groups = unserialize(fread($file_handle, filesize($file_pointer)));
			fclose($file_handle);
			
			// Создаёт массив с группами, убирая из groups повторы
			$avGroups = array(); // avgroups = Список групп в расписании преподавателя
			foreach ( $groups as $dayOfWeek )
			{
				foreach ( $dayOfWeek as $lesson )
				{
					if (!empty($lesson) && !in_array($lesson, $avGroups))
					{
						array_push( $avGroups, $lesson );
					}
				}
			}
			foreach($avGroups as $item)
			{
				for ($i=0;$i<strlen($item);$i++)
				{
					if (is_numeric($item[$i]))
					{
						$n=$item[$i];
						break;
					}
				}
				if (isset($n))
				{
					if(!isset($IKPI[$n][0]))
						$IKPI[$n] = array();
					array_push($IKPI[$n], $item);
				}
				$n=null;
			}
		}
		echo '<div class="menu">
					<div class="buttons">
						<a href="'.base_url().'index.php/general/profile">Профиль</a>
						<a href="'.base_url().'index.php/c_account/logout" style="float:right">Выход</a>
					</div>';
		if ($CI->session->userdata('ACCESS')==3) 
			echo 	'<div style="text-align:center;" class="buttons">
					<a href="'.base_url().'index.php/general/editTable">Редактор расписания</a>
					</div>';
		echo		'<div class="menu-institute">';
		
		if ($userAccess < 2)
		{
			echo 		'<ul style="padding:0px;">
						<li style="padding:0;margin-left:0;"><a href="'.base_url().'index.php/general/calendar/jurnal/'.$CI->session->userdata('USER_GROUP').'"><div>Журнал</div></a></li> 
						<li style="padding:0;margin-left:0;"><a href="'.base_url().'index.php/general/calendar/marks/'.$CI->session->userdata('USER_GROUP').'"><div>Оценки</div></a></li> 
						<li style="padding:0;margin-left:0;"><a href="'.base_url().'index.php/general/statistic/'.$CI->session->userdata('USER_GROUP').'"><div>Статистика</div></a></li> 
						<li style="padding:0;margin-left:0;"><a href="'.base_url().'index.php/general/tops/'.$CI->session->userdata('USER_GROUP').'"><div>Топы</div></a></li> 
						</ul>';
		}
		
		if (!empty($IKPI)) echo 'ИКПИ';
		echo 	   '</div>';
		$indexesIKPI = array_keys($IKPI);
		sort($indexesIKPI);
		for ($i=0;$i<count($indexesIKPI);$i++)
		{
			echo '<div class="menu-curces">'.$indexesIKPI[$i].' курс</div><ul>';
			foreach($IKPI[$indexesIKPI[$i]] as $item)
			{
				echo '<li>
						<a href="#" class="menu-group"><div>'.$CI->my->makeGroupNameClean($item).'</div></a>
						<ul class="menu-subgroup">
						<li><a href="'.base_url().'index.php/general/calendar/jurnal/'.$item.'"><div>Журнал</div></a></li> 
						<li><a href="'.base_url().'index.php/general/calendar/marks/'.$item.'"><div>Оценки</div></a></li> 
						<li><a href="'.base_url().'index.php/general/statistic/'.$item.'"><div>Статистика</div></a></li> 
						<li><a href="'.base_url().'index.php/general/tops/'.$item.'"><div>Топы</div></a></li> 
						</ul>
					  </li>';
			}
			echo '</ul><hr>';
		}
		echo '</div>';
	}
	
	public function makeGroupNameClean( $str )
	{
		$cleanGroup = str_replace( "_", ".", $str );
		// VXP: Я знаю, это пизда, но всё же
		$rusGroupNames = array( "PI" => "ПИ",
								"IK" => "ИК",
								"TE" => "ТЕ", // VXP: Чо
							);
		foreach ( $rusGroupNames as $engName => $rusName )
		{
			// VXP: Check for existance in array
			$cleanGroup = str_replace( $engName, $rusName, $cleanGroup );
		}
	//	echo (!empty( $cleanGroup ) ? $cleanGroup : "&nbsp;");
		return $cleanGroup;
	}
	public function makeGroupNameCleanReverse( $str )
	{
		$cleanGroup = str_replace( ".", "_", $str );
		// VXP: Я знаю, это пизда, но всё же
		$rusGroupNames = array(  "ПИ" => "PI",
								 "ИК" => "IK",
								 "ТЕ" => "TE", // VXP: Чо
							);
		foreach ( $rusGroupNames as $engName => $rusName )
		{
			// VXP: Check for existance in array
			$cleanGroup = str_replace( $engName, $rusName, $cleanGroup );
		}
	//	echo (!empty( $cleanGroup ) ? $cleanGroup : "&nbsp;");
		return $cleanGroup;
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
		if ($p1 == 1) $p1 = '#FFA7A7';
		else if ($p1 == 2) $p1 = '#A9FFD3';
		else if ($p1 == 3) $p1 = '#C2DAE1';
		$CI->session->set_flashdata('message', '<div class="message" style="background:'.$p1.'">'.$p2.'</div>');
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
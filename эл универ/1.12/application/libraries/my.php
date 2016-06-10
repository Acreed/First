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
		$userAccess = $CI->session->userdata( 'ACCESS' );
		$userLogin = $CI->session->userdata( 'USER_LOGIN' );
		
		$IKPI = array();
		$Tlist = $CI->mydb->table_list();
		if ( $userAccess < 2 )
		{
			$j=0;
			for ($i=0;$i<count($Tlist);$i++)
			{
				if ($Tlist[$i][3] == '1')
				{
					$IKPI[0][$j] = $Tlist[$i];
					$j++;
				}
				if ($Tlist[$i][3] == '2') // PI-2_1_01, $Tlist[$i][3] = '2'
					$IKPI[1][$i-$j] = $Tlist[$i];
			}
		}
		else
		{
			// VXP: For tests
			//$IKPI[0][0] = "Ass";
			//$IKPI[0][1] = "Dick";
			//$IKPI[1][0] = "Fuck";
			//$IKPI[1][1] = "Bitch";
			// VXP: Result:
			// Журнал
			// 		ИКПИ
			// 			1 курс
			//				Ass
			//				Dick
			//			2 курс
			//				Fuck
			//				Bitch
			//
			// Korablinovagr.txt: $groups[день недели][пара] = группа
			$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$userLogin.'gr.txt';
			if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
			$groups = unserialize( fread($file_handle, filesize($file_pointer)) );
			fclose($file_handle);
			
			$listOfAvailableGroupsForMe = array(); // VXP: Rename
			foreach ( $groups as $dayOfWeek )
			{
				foreach ( $dayOfWeek as $lesson )
				{
					if ( !empty( $lesson ) && !in_array( $lesson, $listOfAvailableGroupsForMe ) )
					{
						array_push( $listOfAvailableGroupsForMe, $lesson );
					}
				}
			}
		//	print_r( $listOfAvailableGroupsForMe ); // Array ( [0] => PI-2_1_01 ) - good
			// VXP: Don't need
		//	for ( $i = 0; $i < count( $groups ); $i++ )
		//	{
		//		for ( $j = 0; $j < count( $groups[$i] ); $j++ )
		//		{
					// VXP: Нужно: Журнал > ИКПИ > 2 курс > PI-2_1_01
					// $IKPI[1][0] = "PI-2_1_01";
		//		}
		//	}
			
			$k = 0;
			foreach( $listOfAvailableGroupsForMe as $group )
			{
				$IKPI[$group[3] - 1][$k] = $group;
				$k++;
			}
		//	print_r( $IKPI ); // Array ( [1] => Array ( [0] => PI-2_1_01 ) ) - good
		}
		
		//эта система постройки выпадающего меню пока имеет полустатический характер, с идиотско построенным php, 
		//но пока нет нормальных списков и других институтов, не имеет смысла делать полноценный финальный код
		// VXP: Сделал через foreach потому что ёбаные элементы посреди массива, и хуй знает как их правильно обрабатывать
		// То, что я написал, должно работать, насколько я себе это представляю
		function group_menu($href, $IKPI)
		{
			$IKPImenu = '';
		//	for ($i=0;$i<count($IKPI);$i++)
			$i = 0;
			foreach ( $IKPI as $ass1 )
			{
			//	echo "Ass: ".(isset($IKPI[$i]) ? "Yes" : "No").", ".(is_array($IKPI[$i]) ? "Yes" : "No").", ".(($IKPI[$i] == null) ? "Yes" : "No")."<br>";
			//	if ( !isset($IKPI[$i]) && !is_array($IKPI[$i]) && ($IKPI[$i] == null) ) continue;
			//	$IKPImenu .= '<li><a href="javascript:;">'.($i+1).' курс</a>
				// VXP: Не знаю, блять, тут беру третий символ из первого элемента в списке групп, чтобы определить к какому курсу относится группа
			//	$IKPImenu .= '<li><a href="javascript:;">'.$ass1[$i][3].' курс</a>
				$IKPImenu .= '<li><a href="javascript:;">'.(isset($ass1[$i]) ? $ass1[$i][3] : $ass1[$i+1][3]).' курс</a>
								<ul class="fourth-level">';
				
			//	for ($j=0;$j<count($IKPI[$i]);$j++)
				foreach ( $ass1 as $ass2 )
				{
				//	$IKPImenu .= '<li><a href="'.$href.$IKPI[$i][$j].'">'.$IKPI[$i][$j].'</a></li>';
					$IKPImenu .= '<li><a href="'.$href.$ass2.'">'.$ass2.'</a></li>';
				//	$IKPImenu .= '<li><a href="'.$href.$ass2.'">'.$this->makeGroupNameClean( $ass2 ).'</a></li>'; // VXP: Пидорасня
				}
				$IKPImenu .= 	'</ul>
							 </li>';
				$i++;
			}
			return $IKPImenu;
		}

		$userAccess = $CI->session->userdata( 'ACCESS' );
		echo '<ul class="top-level">';
		if ( $userAccess >= 2 )
		{
			echo '<li><a href="javascript:;">Журнал</a>
					<ul class="second-level">
						<li><a href="javascript:;">ИКПИ</a>
							<ul class="third-level">
								'.group_menu(base_url().'index.php/general/calendar/', $IKPI).'			
							</ul>
						</li>
					</ul>
				</li>
				<li><a href="javascript:;">Статистика</a>
					<ul class="second-level">
						<li><a href="javascript:;">ИКПИ</a>
							<ul class="third-level">
								'.group_menu(base_url().'index.php/general/statistic/', $IKPI).'		
							</ul>
						</li>
					</ul>
				</li>
				<li><a href="javascript:;">Топ</a>
					<ul class="second-level">
						<li><a href="javascript:;">За месяц</a>
							<ul class="third-level">
								<li><a href="javascript:;">ИКПИ</a>
									<ul class="fourth-level">
										'.group_menu(base_url().'index.php/general/tops/', $IKPI).'		
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="javascript:;">За семестр</a>
							<ul class="third-level">
								<li><a href="javascript:;">ИКПИ</a>
									<ul class="fourth-level">
										'.group_menu(base_url().'index.php/general/tops/', $IKPI).'		
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>';
		}
		else
		{
			echo '<li><a href="'.base_url().'index.php/general/calendar/'.$CI->session->userdata('USER_GROUP').'">Журнал</a></li>';
			echo '<li><a href="'.base_url().'index.php/general/statistic/'.$CI->session->userdata('USER_GROUP').'">Статистика</a></li>';
			echo '<li><a href="'.base_url().'index.php/general/tops/'.$CI->session->userdata('USER_GROUP').'">Топы</a></li>';
		}
		echo '<li><a href="'.base_url().'index.php/general/profile/">Профиль</a></li>
		<li><a href="'.base_url().'index.php/c_account/logout">Выход</a></li>
		</ul>';
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
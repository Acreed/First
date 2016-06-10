<?php 
$this->my->Headme('Профиль')
?>
<body>
<?
$this->my->Menu();
?>
<div class="Page">
<div class="upperMenu">
<?php 
//$this->my->Menu(); // VXP: Почему оно в upperMenu? Переместил выше

$child = array();

if ($this->session->userdata('ACCESS') == -1)
{
	$this->load->model('mydb');
	$data = mydb::get_article('parents', 'foreign_key');
	$id = 0;
	$group = 0;
	if($data)
	{
		$par = strpos($data[0]['foreign_key'],"|");
		$id = substr($data[0]['foreign_key'], $par+1);
		$group = substr($data[0]['foreign_key'], 0, $par);
	}
	// VXP: Валера, нужно переделать
	$data = mydb::get_article('users', 'id, name, surname, fathername, access, group');
	if ($data)
	{
		foreach ($data as $item)
		{
			if ($item['id'] == $id and $item['group'] == $group)
			{
				$child['name'] = $item['name'];
				$child['surname'] = $item['surname'];
				$child['fathername'] = $item['fathername'];
			}
		}
	}
}
else if ($this->session->userdata('ACCESS') >= 0 and $this->session->userdata('ACCESS') < 2)
{
	$cFIO = 0;
	$this->load->model('mydb'); //загрузка модели для работы с бд
	$data = mydb::get_article($this->session->userdata('GROUP'), 'name, surname, fathername');
		if ($data)
		{
		foreach ($data as $item) {
				$FIO[$cFIO] = $item['surname'].' '.$item['name'].' '.$item['fathername'];
				$cFIO++;
				}
		}
	sort($FIO);
	for ($i=0;$i<$cFIO;$i++)
		if ($this->session->userdata('USER_SURNAME').' '.$this->session->userdata('USER_NAME').' '.$this->session->userdata('USER_FATHERNAME') == $FIO[$i])
			$maxOptimization = $i;
	$i=0;
	$data = mydb::get_article('jurnal', 'day, month, active, access', 'group', $this->session->userdata('GROUP'));
	if ($data)
	{
		foreach ($data as $item) 
		{
			if ($item['month'] == date("m")) 
			{
				$dbActive[$i] = $item['active'];
				$i++;
			}
		}
		//разбиение массива строк с посещаемостью на трёхмерный массив $checked[день][студент][наявность]
		for ($i=0;$i<count($dbActive);$i++)
		{
			$len = strlen($dbActive[$i]); //определение длины строки
			$len = $len / $cFIO; //разбиение длины на кол-во студентов = кол-во пар
			$check[$i] = str_split($dbActive[$i], $len); //деление строки на подстроки, длиной в кол-во пар ($len)
			for ($j=0;$j<$cFIO;$j++) $checked[$i][$j] = explode(" ", $check[$i][$j]); //образование трёхмерного массива, разделением подстрок на подстроки, обозначающие наявность студента
		}
		//обнуление массива $sumn (сумма н-ок), $sumnu (сумма н-ок по уваж. причине) и $alln (подробное кол-во пропусков)
		$sumn = 0;
		$sumnu = 0;
		//заполнение массивов $sumn и $sumnu кол-вом пропусков
		for ($i=0;$i<count($dbActive);$i++)
		{
			for ($n=0;$n<count($checked[$i][0])-1;$n++)
			{
				if ($checked[$i][$maxOptimization][$n] == '0') 
				{
					$sumn += 1;
				}
				if ($checked[$i][$maxOptimization][$n] == '2') 
				{
					$sumnu += 1;
				}
			}
		}
	}
	else
	{
		$sumn = 0;
		$sumnu = 0;
	}
}
?>


<div class="upperRightMenu">
	<div class="profileAvatar">
		<img src="/resource/avatar.png">
	</div>
	<div class="profileName">
	<? 
	//	if ($this->session->userdata('ACCESS') >= 0 and $this->session->userdata('ACCESS') < 2)
		/*if ($this->session->userdata('ACCESS') >= 0 and $this->session->userdata('ACCESS') <= 2)
			echo $this->session->userdata('USER_SURNAME')." ".$this->session->userdata('USER_NAME')." ".$this->session->userdata('USER_FATHERNAME');
		else */if($this->session->userdata('ACCESS') == -1)
			echo 'Сыночек: '.$child['name']." ".$child['surname']." ".$child['fathername'];
		else
			echo $this->session->userdata('USER_SURNAME')." ".$this->session->userdata('USER_NAME')." ".$this->session->userdata('USER_FATHERNAME');
	?>
	</div>

	<?
	if ($this->session->userdata('ACCESS')<2)
		echo '<br><div class="profilePassesCount">
	Пропусков за месяц: '.$sumn.', по уважительной причине: '.$sumnu.'&nbsp;&nbsp;|&nbsp;&nbsp;';
	$cleanGroup = $this->my->makeGroupNameClean( $this->session->userdata('USER_GROUP') );
			echo (!empty( $cleanGroup ) ? $cleanGroup : "&nbsp;").'</div>';?>
	
</div>
<!--<div class="profileDivider"><hr></div>-->
<!--<div id="Table_in_profile">-->
<?
$this->my->mesShow();
if ($this->session->userdata('ACCESS')<2)
{
	$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$this->session->userdata('USER_GROUP').'.txt';
	if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
	$tableLes = unserialize( fread($file_handle, filesize($file_pointer)) );
	fclose($file_handle);
}
else if ($this->session->userdata('ACCESS')==2)
{
	$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$this->session->userdata('USER_LOGIN').'les.txt';
	if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
	$tableLes = unserialize( fread($file_handle, filesize($file_pointer)) );
	fclose($file_handle);
	$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$this->session->userdata('USER_LOGIN').'gr.txt';
	if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
	$tableGr = unserialize( fread($file_handle, filesize($file_pointer)) );
	fclose($file_handle);
}
if ($this->session->userdata('ACCESS')<3)
{
	$formIn = '';
	for ($i=0;$i<16;$i+=2)
	{
		$formIn .= '<tr><td style="background:#3A80C6;color:#FFF;width:70px;">'.($i/2+1).' пара';
		for ($j=0;$j<6;$j++)
		{
			$formIn .= '<td';
			if ((isset($tableLes[$j][$i]))and(isset($tableLes[$j][$i+1]))and($tableLes[$j][$i] == $tableLes[$j][$i+1]))
			{
				$formIn .= ' class="lesson">'.$tableLes[$j][$i];
				if ($this->session->userdata('ACCESS')==2)
						$formIn .= ' '.my::makeGroupNameClean($tableGr[$j][$i]);
			}
			else if ((isset($tableLes[$j][$i]))and(isset($tableLes[$j][$i+1])))
			{
				$formIn .= ' class="lesson">'.$tableLes[$j][$i].'(ч)';
				if ($this->session->userdata('ACCESS')==2)
					$formIn .= ' '.my::makeGroupNameClean($tableGr[$j][$i]);
				$formIn .= '<br>';
				$formIn .= $tableLes[$j][$i+1].'(н)';
				if ($this->session->userdata('ACCESS')==2)
					$formIn .= ' '.my::makeGroupNameClean($tableGr[$j][$i+1]);
			}
			else
			{
				if (isset($tableLes[$j][$i])) 
				{
					$formIn .= ' class="lesson">'.$tableLes[$j][$i].'(ч)';
					if ($this->session->userdata('ACCESS')==2)
						$formIn .= ' '.my::makeGroupNameClean($tableGr[$j][$i]);
					$formIn .= '<br>';
				}
				if (isset($tableLes[$j][$i+1])) 
				{
					$formIn .= ' class="lesson">'.$tableLes[$j][$i+1].'(н)';
					if ($this->session->userdata('ACCESS')==2)
						$formIn .= ' '.my::makeGroupNameClean($tableGr[$j][$i+1]);
				}
				if ((!isset($tableLes[$j][$i]))and(!isset($tableLes[$j][$i+1])))
					$formIn .= '>';
			}
		}
	}
	echo '
		<table id="table">
		<thead>
		<th class="num"><th>ПН<th>ВТ<th>СР<th>ЧТ<th>ПТ<th class="sat">СБ
		<tbody>'.$formIn.'</table>';
}
?>
<!--</div>-->
</div>
</body>
</html>
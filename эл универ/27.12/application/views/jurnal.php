<? 
//Функция, взятая из пользовательской библиотеки. Добавляет начальынй html код
$this->my->Headme('Журнал') 
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js">
</script>
<script>
//функция, выделяющая все checkbox в столбце - cls, строке - std
var checkboxesChecked = true;
function checkbox(cls, std) { 
	for(var j = 0; j < std; j++)
	{		
		if (document.getElementById("cb"+cls+'.'+j).checked == true && checkboxesChecked)
		{
			document.getElementById("cb"+cls+'.'+j).checked = false;
			var sp1 = document.createTextNode('н');
			document.getElementById("cb"+cls+'.'+j).parentElement.insertBefore(sp1, document.getElementById("cb"+cls+'.'+j));
			continue;
		}
		if (document.getElementById("cb"+cls+'.'+j).checked != true && !checkboxesChecked)
		{
			document.getElementById("cb"+cls+'.'+j).checked = true;
			document.getElementById("cb"+cls+'.'+j).parentElement.removeChild(document.getElementById("cb"+cls+'.'+j).parentElement.childNodes[0]);
		}
	}
	checkboxesChecked = !checkboxesChecked;
	return false; 
}
function changeButtonHighlight( element )
{
//	var button = this;
	if (element.childNodes[1])
	{
		element.childNodes[1].checked = true;
		element.removeChild(element.childNodes[0]);
	}
	else
	{
		element.childNodes[0].checked = false;
		var sp1 = document.createTextNode('н');
		element.insertBefore(sp1, element.childNodes[0]);
	}
}
</script>
</head>
<body>

<?
$this->my->Menu();
?>
<div class="Page">
<?
$this->my->mesShow();

//массив, для будующего перевода числового представления месяца в строковый
$months=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
//массив, для будующего перевода числового представления дня недели в сроковый
$weekDays=["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"];
//проверка наличия файла рассписания на 1 и 6 дни недели, для определения диапазона учебной недели
$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'.txt';
if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
$table = unserialize( fread($file_handle, filesize($file_pointer)) );
fclose($file_handle);
if (isset($table[5])) $sat = 8; else $sat = 6;
if (isset($table[0])) $mon = 8; else $mon = 1;
//переменные, определяющие на какую дату переводит стрелка влево (day last, month last, year last)
$dl = $day - 1;
$ml = $month;
$yl = $year;
//переменные, определяющие на какую дату переводит стрелка вправо (day future, month future, year future)
$df = $day + 1;
$mf = $month;
$yf = $year;
//исправление неточностей в переменных dl,ml,yl
for ($i=1;$i<=3;$i++){ //три прохода, так как тело цикла, при нахождении ошибки, переводит лишь на 1 день назад
	if ($dl == 0) //если день = 0, то сменяет его на последний день предыдущего месяца, а также при необходимости меняет месяц и год
	{
		if ($ml == 1) {$yl = $yl - 1; $ml = 12;}
		else $ml = $ml - 1;
		$dl = date("t", strtotime($yl."-".$ml));
	}
	//проверка, является ли день - выходным
	if (date("w", strtotime($dl.'-'.$ml.'-'.$yl)) == 0 || date("w", strtotime($dl.'-'.$ml.'-'.$yl)) == $mon || date("w", strtotime($dl.'-'.$ml.'-'.$yl)) == $sat) $dl--;
}
//исправление неточностей в переменных df,mf,yf
for ($i=1;$i<=3;$i++){ //три прохода, так как тело цикла, при нахождении ошибки, переводит лишь на 1 день вперёд
	if ($df > date("t", strtotime($yf."-".$mf))) //если день выходит из диапазона месяца, то сменяет его на первое число, а также при необходимости меняет месяц и год
	{
		if ($mf == 12) {$yf = $yf + 1; $mf = 1;}
		else $mf = $mf + 1;
		$df = 1;
	}
	//проверка, является ли день - выходным
	if (date("w", strtotime($df.'-'.$mf.'-'.$yf)) == 0 || date("w", strtotime($df.'-'.$mf.'-'.$yf)) == $mon || date("w", strtotime($df.'-'.$mf.'-'.$yf)) == $sat) $df++;
}
//определение чётности недели
$ch = date('W',strtotime($day.'.'.$month.'.'.$year));
if(($ch % 2) == 0) $ch = 'н'; else $ch = 'ч'; 
?>
<!--отображение месяца -->
<div class="monthname"><?=$months[$month-1] ?></div>
<!-- отображение дня недели, числа и стрелок перехода на соседние дни, используя предыдущие переменные -->
<!-- переменные $day, $month и $year передаются этой странице контролёром general -->
<?='<div class="wdname">
<a class = "str" href="'.base_url().'index.php/general/jurnal/'.$group.'/'.$yl.'/'.$ml.'/'.$dl.'"><</a>
'.$weekDays[date("w", strtotime($day.'-'.$month.'-'.$year))].' '.$day.'-е ('.$ch.')'.
' <a class = "str" href="'.base_url().'index.php/general/jurnal/'.$group.'/'.$yf.'/'.$mf.'/'.$df.'">></a>
</div>';
//переменная счётчик для счёта студентов
$i=0;
$this->load->model('mydb'); //загрузка модели для работы с бд
$data = mydb::get_article($group, 'name, surname, fathername');
	if ($data)
	{
		foreach ($data as $item) {
			$FIO[$i] = $item['surname'].' '.$item['name'].' '.$item['fathername'];
			$i=$i+1;
		}
	}
sort($FIO); //сортировка по фамилии

//чтение строки посещаемости учеников, а также доступа, с бд ($acs - access)
$data = mydb::get_article('jurnal', 'day, month, active, access', 'group', $group);
if ($data)
{
	foreach ($data as $item) 
	{
		if (($item['day'] == $day)and($item['month'] == $month)) {$dbActive = $item['active']; $acs = $item['access'];}
	}
}
//перевод строки в массив, если в бд была запись на этот день
if (isset($dbActive)) $check = explode(" ", $dbActive);
	else $acs = 1;
//проверка на уже прошедший день и на права доступа и создание переменной $dis (disable)
$dis = true;
if ((($day == date("d"))and($month == date("m"))and($year == date("Y")))and($acs <= $this->session->userdata('ACCESS'))) $dis = false;
//та же проверка, но для учителя
$wdif = date("w");
if ($wdif == 0) $wdif = 7;
$wt = date("d") - $wdif;
if ($wt < 0)
{
	$wt = date("t", strtotime(date("Y")."-".date("m")-1)) + $wt;
	if (($day > $wt and $month == date("m")-1) or ($day <= date("d") and $month == date("m"))and($this->session->userdata('ACCESS') == 2)) $dis = false;
}
elseif (($day > $wt and $day <= date("d") and $month == date("m") and $year == date("Y"))and($this->session->userdata('ACCESS') == 2)) $dis = false;
//добавление заголовка таблицы в переменную $thead
$thead = '<tr><th class="num">№<th>ФИО';
//определение дня недели
$wd = date("w", strtotime($day.'-'.$month.'-'.$year)); 
$ch = date('W', strtotime($day.'-'.$month.'-'.$year));
if(($ch % 2) == 0) $ch = 1; else $ch = 0;
$j=0;

//for ($i=0;$i<count($table[$wd-1]);$i++)
$indexesTable = array_keys($table[$wd-1]);
$SIZE = count($indexesTable);
for($i=0;$i<$SIZE;$i++)
{
	if ($ch)
	{
		if ($indexesTable[$i]%2==0)
			unset($indexesTable[$i]);
	}
	else
	{
		if ($indexesTable[$i]%2!=0)
			unset($indexesTable[$i]);
	}
}
sort($indexesTable);
$c=0;
for($i=0;$i<=floor($indexesTable[count($indexesTable)-1]/2);$i++)
{
	if ($i == floor($indexesTable[$c]/2))
	{
		$classes[$j] = $table[$wd-1][$indexesTable[$c]];
		$j++;
		$c++;
	}
	else
	{
		$classes[$j] = '';
		$j++;
	}
}
if ($classes[count($classes)-1]=='') unset($classes[count($classes)-1]);
if ($this->session->userdata('ACCESS') == 2)
{
	$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$this->session->userdata('USER_LOGIN').'les.txt';
	if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
	$lessons = unserialize( fread($file_handle, filesize($file_pointer)) );
	fclose($file_handle);
	
	
	$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$this->session->userdata('USER_LOGIN').'gr.txt';
	if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
	$Tgroups = unserialize( fread($file_handle, filesize($file_pointer)) );
	fclose($file_handle);
}
$N = 0; //счётчик
//заполнение заголовка парами, при необходимости ссылочными элементами для выделения столбца checkbox, путём вызова функции из javascript
$Gdis = true; //хехей, ещё один dis, отвечающий теперь за то, ведёт ли препод в этот день у этой группы что-то
if (isset($Tgroups[date("w", strtotime($day.'-'.$month.'-'.$year))-1]))
	for ($i=0;$i<count($classes);$i++)
		if (isset($Tgroups[date("w", strtotime($day.'-'.$month.'-'.$year))-1][$i*2+$ch]))
			if ($Tgroups[date("w", strtotime($day.'-'.$month.'-'.$year))-1][$i*2+$ch] == $group)
			{
				$Gdis = false;
				break;
			}
$Tdis = true; //пиздец бредовая переменная, надеюсь потом заменить, это отдельный dis для учителя
for ($j = 0; $j<count($classes);$j++) 
{
	if ($j==count($classes)-1) 
		$thead .= '<th style="border-top-right-radius:10px;"';
	else
		$thead .= '<th';
	if ($classes[$j] != '') 
	{
		$Tdis = true;
		//проверка на учителя и есть ли в массиве его пар данный день и пара (условие изменится в сторону оптимизации, как сделаем нормальный редактор рассписания)
		if(($this->session->userdata('ACCESS') == 2)and(isset($lessons[date("w", strtotime($day.'-'.$month.'-'.$year))-1][$j*2+$ch]))and(!$dis))
			//если пара в массиве учителя совпадает с обрабатываемой парой, меняется значение переменной
			if ($lessons[date("w", strtotime($day.'-'.$month.'-'.$year))-1][$j*2+$ch] == $classes[$j]) 
			{
				$Tdis = false; 
			}
			else 
			{
				$Tdis = true;
			}
		if ((!$dis)and(!$Tdis)and(!$Gdis))
		{
			$thead .= ' class="active">'.$classes[$j];
		} 
		else 
			$thead .= '>'.$classes[$j];
		$N++;
	}
	else
		$thead .= '>';
}
//вычисление количества пар, не считая окон, и запись этого в переменную (count Classes)
$cClasses = 0;
for ($i = 0; $i<count($classes);$i++)
	if ($classes[$i] != '')
		$cClasses += 1;
//заполнение тела таблицы
$calendar = '';
$N = 0;
for ($i=0;$i<$cClasses;$i++) $cPropusk[$i]=0;
for ($j = 0; $j<count($FIO); $j++)
{
	$calendar .= '<tr><td class="num">'.($j+1).'<td><div class = "FIO">'.$FIO[$j].'</div>';
	$ii = 0;
	for ($i = 0; $i<count($classes);$i++) 
	{
		if ($classes[$i]!='') 
		{
			$Tdis = true;
			$calendar .= '<td';
			if(($this->session->userdata('ACCESS') == 2)and(isset($lessons[date("w", strtotime($day.'-'.$month.'-'.$year))-1][$i*2+$ch]))and(!$dis))
				if ($lessons[date("w", strtotime($day.'-'.$month.'-'.$year))-1][$i*2+$ch] == $classes[$i]) 
				{
					$Tdis = false; 
				}
				else 
				{
					$Tdis = true;
				}
			if ((!$dis)and(!$Tdis)and(!$Gdis))
				$calendar .= ' class="n" onclick="return changeButtonHighlight(this);"';
			$calendar .= '>';
			if (isset($dbActive)) 
				if ($check[$N] == '0') 
				{
					$calendar .= 'н'; 
					$cPropusk[$ii]+=1;
				}
			$calendar .= '<input type="checkbox" name="active[]" class="hiden" id="cb'.($ii).'.'.$j.'" value="'.($ii+1).'.'.($j+1).'" ';
			if (isset($dbActive)) 
			{
				if ($check[$N] == '1') 
					$calendar .= 'checked '; // проверка на отмеченный checkbox
			}
			else
				$calendar .= 'checked ';
			if ($dis) 
				$calendar .= 'disabled ';
			$calendar .= '>';
			$N++;
			$ii++;
		}
		else $calendar .= '<td>';
	}
}
$ii=0;
$calendar .= '<tr><td class="num"><td>Количество пропусков:';
for ($i = 0; $i<count($classes);$i++) 
{
	if ($classes[$i]!='') 
	{
		$calendar .= '<td>';
		$calendar .= $cPropusk[$ii];
		$ii++;
	}
	else $calendar .= '<td>';
}
?>
<form method="POST" action="<?=base_url();?>index.php/c_operations/savejurnal/<?=$group?>/<?=$year?>/<?=$month?>/<?=$day?>/<?=count($FIO)?>/<?=$cClasses?>">
<table id="calendarW">
  <thead>
	<?=$thead ?>
  <tbody>
	<?=$calendar ?>
</table>
<?
if(!$Gdis) echo '<div class="saveJurnal"><input id="submitTableEdit" type="submit" name="enter" value="Cохранить"/></div>';
?>
</form>
</div>
</body>
</html>
<? 
//Функция, взятая из пользовательской библиотеки. Добавляет начальынй html код
$this->my->Headme('Журнал') 
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js">
</script>
<script>
//функция, выделяющая все checkbox в столбце - cls, строке - std
function checkbox(cls, std) { 
for(var j = 0; j < std; j++) 
{ 
document.getElementById("cb"+cls+'.'+j).checked = true; 
}
return false; 
}
</script>
</head>
<body>
<div class="wrapper">
<div class="content">
<div class="Page">
<?
//массив, для будующего перевода числового представления месяца в строковый
$months=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
//массив, для будующего перевода числового представления дня недели в строковый
$weekDays=["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"];
//проверка наличия файла рассписания на 1 и 6 дни недели, для определения диапазона учебной недели
$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'/6ч.txt';
if (file_exists($file_pointer)) $sat = 8; else $sat = 6;
$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'/1ч.txt';
if (file_exists($file_pointer)) $mon = 8; else $mon = 1;
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
//определение дня недели
$wd = date("w", strtotime($day.'-'.$month.'-'.$year)); 
if ($wd == 0) $wd = 7; //перестановка воскресения на #7
//определение чётности недели
$ch = date('W',strtotime($day.'.'.$month.'.'.$year));
if(($ch % 2) == 0) $ch = 'н'; else $ch = 'ч'; 
?>
<!--отображение месяца -->
<div class="monthname"><?=$months[$month-1] ?></div>
<!-- отображение дня недели, числа и стрелок перехода на соседние дни, используя предыдущие переменные -->
<!-- переменные $day, $month и $year передаются этой странице контролёром general -->
<?='<div class="wdname">
<a class = "strL" href="'.base_url().'index.php/general/jurnal/'.$group.'/'.$yl.'/'.$ml.'/'.$dl.'"><</a>
'.$weekDays[date("w", strtotime($day.'-'.$month.'-'.$year))].' '.$day.'-е ('.$ch.')'.
'<a class = "strR" href="'.base_url().'index.php/general/jurnal/'.$group.'/'.$yf.'/'.$mf.'/'.$df.'">></a>
</div>';
//кнопка перехода на календарь 
echo '<a class="backToCal" href="'.base_url().'index.php/general/calendar/'.$this->session->userdata("GROUP").'"><</a>';
//функция из пользовательской библиотеки, добавляющая код завершения сессии
$this->my->AddLogout();
//переменная счётчик для счёта студентов
$i=0;
$this->load->model('mydb'); //загрузка модели для работы с бд
$data = mydb::get_article('users', 'name, surname, fathername, access', 'group', $group);
	if ($data)
	{
	foreach ($data as $item) {
			if ($item['access'] < 2){ //если студент - складывается строка ФИО
			$FIO[$i] = $item['surname'].' '.$item['name'].' '.$item['fathername'];
			$i=$i+1;
			}
			}
	}
sort($FIO); //сортировка по фамилии
//чтение рассписания с файла
$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'/'.$wd.$ch.'.txt';
if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
$classes = unserialize( fread($file_handle, filesize($file_pointer)) );
fclose($file_handle);
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
if (($day < date("d") and $month == date("m") and $year == date("Y"))or($month < date("m") and $year == date("Y"))or($year < date("Y"))or($acs > $this->session->userdata('ACCESS'))) $dis = true;else $dis = false;
//добавление заголовка таблицы в переменную $thead
$thead = '<tr><th>№<th>ФИО';
$N = 1; //счётчик
//заполнение заголовка парами, при необходимости ссылочными элементами для выделения столбца checkbox, путём вызова функции из javascript
for ($j = 0; $j<count($classes);$j++) 
{
	$thead .= '<th>';
	if ($classes[$j] != ' ') 
		if (!$dis) 
		{
			$thead .= '<a href="javascript://" onclick="checkbox(\''.$N.'\',\''.count($FIO).'\')" class="chooseAllCb">'.$classes[$j].'</a>';
			$N++;
		} else $thead .= $classes[$j];
}
//заполнение тела таблицы
$calendar = '';
$N = 0;
for ($j = 0; $j<count($FIO); $j++)
{
	$calendar .= '<tr><td>'.($j+1).'<td><div class = "FIO">'.$FIO[$j].'</div>';
	$ii = 0;
	for ($i = 0; $i<count($classes);$i++) 
	{
		if ($classes[$i]!=' ') 
		{
			$calendar .= '<td><input type="checkbox" name="active[]" id="cb'.($ii+1).'.'.$j.'" value="'.($ii+1).'.'.($j+1).'" ';
			if (isset($dbActive)) if ($check[$N] == '1') $calendar .= 'checked '; // проверка на отмеченный checkbox
			if ($dis) $calendar .= 'disabled '; 
			$calendar .= '>';
			$N++;
			$ii++;
		}
		else $calendar .= '<td>';
	}
}
//вычисление количества пар, не считая окон, и запись этого в переменную (count Classes)
$cClasses = 0;
for ($i = 0; $i<count($classes);$i++)
	if ($classes[$i] != ' ')
		$cClasses += 1;
?>
<!-- таблица, наполняемая уже заготовленной строковой переменной. Таблица обёрнутая в форму, для дальнейшей передачи значений checkBox-ов -->
<form method="POST" action="<?=base_url();?>index.php/c_operations/savejurnal/<?=$group?>/<?=$year?>/<?=$month?>/<?=$day?>/<?=count($FIO)?>/<?=$cClasses?>">
<table id="calendarW">
  <thead>
	<?=$thead ?>
  <tbody>
	<?=$calendar ?>
</table>
<?
if(!$dis) echo '<div class="saveJurnal"><input type="submit" name="enter" value="Сохранить"></div>';
?>
</form>
</div>
</div>
</div>
</body>
</html>
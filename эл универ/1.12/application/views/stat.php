<? 
//Функция, взятая из пользовательской библиотеки. Добавляет начальынй html код
$this->my->Headme('Статистика пропусков') 
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js">
</script>
<link rel="stylesheet" href="<?=base_url()?>resource/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?=base_url()?>resource/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".various").fancybox({
	//	maxWidth	: 300,
	//	maxHeight	: 400,
		fitToView	: true,
		width		: '80%',
		height		: '80%',
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
});
function showCalendar( year, month, j )
{
	$( '#fullCalendar' ).css( 'visibility', 'visible' );
	calendarStat( year, month, j );
}
function changeButtonHighlight( element )
{
//	var button = this;
	if ( element.className == "Red" )
	{
		element.className = "Green";
		element.childNodes[0].checked = true;
	}
	else
	{
		element.className = "Red";
		element.childNodes[0].checked = false;
	}
//	alert( "After: " + element.childNodes[0].checked );
}
</script>
</head>
<body>
<?
$this->my->Menu();

//массив, для будующего перевода числового представления месяца в строковый
$months=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
//определение месяца и года при переходе на предыдущий месяц

$ml = $month-1;
$yl = $year;
if ($ml <= 0) 
{
	$yl = $yl - 1; 
	$ml = 12;
}
//определение месяца и года при переходе на следующий месяц
$mf = $month+1;
$yf = $year;
if ($mf > 12)
{
	$yf = $yf + 1; 
	$mf = 1;
}
/*echo '<div class="wdname">
<a class = "strL" href="'.base_url().'index.php/general/statistic/'.$group.'/'.(1).'/'.$yl.'/'.$ml.'"><</a>
<div class="monthname">'.$months[$month-1].'</div>
<a class = "strR" href="'.base_url().'index.php/general/statistic/'.$group.'/'.(1).'/'.$yf.'/'.$mf.'">></a>
</div>';*/
if ($ml>8 or $ml<6) echo '<div class="wdname">
<a class = "strL" href="'.base_url().'index.php/general/statistic/'.$group.'/'.(1).'/'.$yl.'/'.$ml.'"><</a></div>';
echo '<div class="monthname"><font size =5>'.$months[$month-1].'</font></div>';
if (($mf>8 or $mf<6) and (($mf<=date("m")and$yf==date("Y"))or($yf<date("Y")))) echo '<div class="wdname"><a class = "strR" href="'.base_url().'index.php/general/statistic/'.$group.'/'.(1).'/'.$yf.'/'.$mf.'">></a></div>';
//кнопка перехода на меню 
//echo '<a class="backToCal" href="'.base_url().'index.php/general/calendar/'.$this->session->userdata("GROUP").'"><</a>';
//переменная счётчик для счёта студентов
$i=0;
$this->load->model('mydb'); //загрузка модели для работы с бд
$data = mydb::get_article($group, 'name, surname, fathername');
	if ($data)
	{
	foreach ($data as $item) {
			$FIO[$i] = $item['surname'].' '.$item['name'].' '.$item['fathername'];
			$i++;
			}
	}
sort($FIO); //сортировка по фамилии
//обнуление массива $sumn (сумма н-ок), $sumnu (сумма н-ок по уваж. причине) и $alln (подробное кол-во пропусков)
for ($i=0;$i<count($FIO);$i++)
{
	$sumn[$i] = 0;
	$sumnu[$i] = 0;
	for ($j=0;$j<32;$j++) 
	{
		$alln[$j][$i] = 0;
		$allnu[$j][$i] = 0;
	}
}
//чтение строк посещаемости учеников
$i=0;
$data = mydb::get_article('jurnal', 'day, month, active, access', 'group', $group);
if ($data)
{
	foreach ($data as $item) 
	{
		if ($item['month'] == $month)
		{
			$dbActive[$i] = $item['active'];
			$dbActiveDay[$i] = $item['day'];
			$i++;
		}
	}

	//разбиение массива строк с посещаемостью на трёхмерный массив $checked[день][студент][наявность]
	for ($i=0;$i<count($dbActive);$i++)
	{
		$len = strlen($dbActive[$i]); //определение длины строки
		$len = $len / count($FIO); //разбиение длины на кол-во студентов = кол-во пар
		$check[$i] = str_split($dbActive[$i], $len); //деление строки на подстроки, длиной в кол-во пар ($len)
		for ($j=0;$j<count($FIO);$j++) $checked[$i][$j] = explode(" ", $check[$i][$j]); //образование трёхмерного массива, разделением подстрок на подстроки, обозначающие наявность студента
	}
	//заполнение массивов $sumn и $sumnu кол-вом пропусков
	for ($i=0;$i<count($dbActive);$i++)
	{
		for ($j=0;$j<count($FIO);$j++)
		{
			for ($n=0;$n<count($checked[$i][0])-1;$n++)
			{
				if ($checked[$i][$j][$n] == '0') 
				{
					$sumn[$j] += 1;
					$alln[$dbActiveDay[$i]][$j] += 1;
				}
				if ($checked[$i][$j][$n] == '2') 
				{
					$sumnu[$j] += 1;
					$allnu[$dbActiveDay[$i]][$j] += 1;
				}
			}
		}
	}
}
//добавление заголовка таблицы в переменную $thead
$thead = '<tr><th>№<th>ФИО<th>Пропущено пар';
//заполнение тела таблицы
$calendar = '';
$N = 0;
for ($j = 0; $j<count($FIO); $j++)
	$calendar .= '<tr><td>'.($j+1).'<td><div class = "FIO">'.$FIO[$j].'</div><td><a class="various" href="#fullCalendar" onclick="showCalendar('.$year.', '.$month.', '.$j.')" style="color:#FF0000;display:inline-block;margin-right:20px;">'.$sumn[$j].'</a><div style="color:#00B521;display:inline-block">'.$sumnu[$j].'</div>';
?>
<table id="calendarW">
  <thead>
	<?=$thead ?>
  <tbody>
	<?=$calendar ?>
</table>

<form id="fullCalendar" method="POST" action="<?=base_url();?>index.php/c_operations/saveNU/<?=$group?>/<?=$month?>/<?=count($FIO)?>" style="visibility: hidden;">
<table id="calendarStat">
  <thead>
    <tr><td><td colspan="5"><td>
    <tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
  <tbody>
</table>
<input type="submit" name="enter" value="Подтвердить">
</form>
<script>
function calendarStat(year, month, student) {
month--;
var alln = <? echo json_encode($alln)?>;
var allnu = <? echo json_encode($allnu)?>;
var id = "calendarStat";
var Dlast = new Date(year,month+1,0).getDate(),
    D = new Date(year,month,Dlast),
    DNlast = D.getDay(),
    DNfirst = new Date(D.getFullYear(),D.getMonth(),1).getDay(),
    calendar = '<tr>',
    month=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
if (DNfirst != 0) {
  for(var  i = 1; i < DNfirst; i++) calendar += '<td>';
}else{
  for(var  i = 0; i < 6; i++) calendar += '<td>';
}
calendar += '<input type="checkbox" name="active[]" id="cb" value="'+student+'.0" checked>';
for(var  i = 1; i <= Dlast; i++) {
//console.log(alln[i-1][student]);
//if (allnu[i][student] > 0) calendar += '<td class="Green"<? if($this->session->userdata('ACCESS')>2) echo ' class=" onclick="changeButtonHighlight()"'?>><input type="checkbox" name="active[]" id="cb" value="'+student+'.'+i+'">' + i;
if (allnu[i][student] > 0) calendar += '<td <? if($this->session->userdata('ACCESS')>2) echo 'class="Green" onclick="return changeButtonHighlight(this);"'; else echo 'class="GreenDis"'?>><input type="checkbox" name="active[]" id="cb" value="'+student+'.'+i+'" checked>' + i;
else
//if (alln[i][student] > 0) calendar += '<td class="Red"<? if($this->session->userdata('ACCESS')>2) echo ' class=" onclick="changeButtonHighlight()"'?>><input type="checkbox" name="active[]" id="cb" value="'+student+'.'+i+'">' + i;
if (alln[i][student] > 0) calendar += '<td <? if($this->session->userdata('ACCESS')>2) echo 'class="Red" onclick="return changeButtonHighlight(this);"'; else echo 'class="RedDis"'?>><input type="checkbox" name="active[]" id="cb" value="'+student+'.'+i+'">' + i;
else
if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth())
    calendar += '<td>' + i;
else calendar += '<td>' + i;
  if (new Date(D.getFullYear(),D.getMonth(),i).getDay() == 0) {
    calendar += '<tr>';
  }
}
for(var  i = DNlast; i < 7; i++) calendar += '<td>&nbsp;';
document.querySelector('#'+id+' tbody').innerHTML = calendar;
document.querySelector('#'+id+' thead td:nth-child(2)').innerHTML = month[D.getMonth()] +' '+ D.getFullYear();
document.querySelector('#'+id+' thead td:nth-child(2)').dataset.month = D.getMonth();
document.querySelector('#'+id+' thead td:nth-child(2)').dataset.year = D.getFullYear();
if (document.querySelectorAll('#'+id+' tbody tr').length < 6) {  // чтобы при перелистывании месяцев не "подпрыгивала" вся страница, добавляется ряд пустых клеток. Итог: всегда 6 строк для цифр
    document.querySelector('#'+id+' tbody').innerHTML += '<tr><td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;';
}
}
</script>
</body>
</html>
<? 
//Функция, взятая из пользовательской библиотеки. Добавляет начальынй html код
$this->my->Headme('Топы') 
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js">
</script>
</head>
<body>
<?
$this->my->Menu();

//массив, для будующего перевода числового представления месяца в строковый
$months=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
echo '<div class="monthname"><font size =5>'.$months[$month-1].'</font></div>';

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
}
//разбиение массива строк с посещаемостью на трёхмерный массив $checked[день][студент][наявность]
for ($i=0;$i<count($dbActive);$i++)
{
	$len = strlen($dbActive[$i]); //определение длины строки
	$len = $len / count($FIO); //разбиение длины на кол-во студентов = кол-во пар
	$check[$i] = str_split($dbActive[$i], $len); //деление строки на подстроки, длиной в кол-во пар ($len)
	for ($j=0;$j<count($FIO);$j++) $checked[$i][$j] = explode(" ", $check[$i][$j]); //образование трёхмерного массива, разделением подстрок на подстроки, обозначающие наявность студента
}
//обнуление массива $sumn (сумма н-ок), $sumnu (сумма н-ок по уваж. причине) и $alln (подробное кол-во пропусков)
for ($i=0;$i<count($FIO);$i++)
{
	$sumn[$i] = 0;
	$sumnu[$i] = 0;
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
			}
			if ($checked[$i][$j][$n] == '2') 
			{
				$sumnu[$j] += 1;
			}
		}
	}
}

$theadTOP = '<tr><th>№<th>ФИО<th>Количество пропусков';
$calendarTOP = '';
// $users[id по списку]["FIO"]
// $users[id по списку]["nCount"]
// $users[id по списку]["nRespCount"] // VXP: Respectful n-count
$users = array();
for ($j = 0; $j<count($FIO); $j++)
{
	$users[$j]["FIO"] = $FIO[$j];
	$users[$j]["nCount"] = $sumn[$j];
	$users[$j]["nRespCount"] = $sumnu[$j];
}
$by = 'nCount'; 
usort( $users, function($first, $second) use( $by ) { 
	if( $first[$by] < $second[$by] )
	{
		return 1;
	}
	elseif( $first[$by] > $second[$by] )
	{
		return -1;
	}
	return 0; 
} );
$TOPTableNCount = 0;
$TOPTableNCountMax = 10;
for ($j = 0; $j<count($users); $j++)
{
	if( $users[$j]["nCount"] <= 0 )
		continue;
	if( $TOPTableNCount >= $TOPTableNCountMax )
		break;

	$calendarTOP .= '<tr><td>'.($j+1).'<td><div class = "FIO">'.$users[$j]["FIO"].'</div><td><div style="color:rgb(255,0,0);display:inline-block">'.$users[$j]["nCount"].'</div>';
	$TOPTableNCount++;
}
?>

<center><font size =6>ТОП-<?=$TOPTableNCount?> пропускающих занятия</font></center>
<table id="calendarW">
  <thead>
	<?=$theadTOP ?>
  <tbody>
	<?=$calendarTOP ?>
</table>

</body>
</html>
<?php 
$this->my->Headme('Календарь')
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js">
</script>
</head>
<body>

<?
$this->my->Menu();
?>
<div class="Page">
<?
$this->my->mesShow();

$sat=0;
$mon=0;

echo '<div class="groupname">'.my::makeGroupNameClean($group).'</div>';

$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'.txt';
if (file_exists($file_pointer))
{
	if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
	$table = unserialize( fread($file_handle, filesize($file_pointer)) );
	fclose($file_handle);
	if (isset($table[5])) $sat = 8; else $sat = 6;
	if (isset($table[0])) $mon = 8; else $mon = 1;

	echo '<table id="calendar3">
		  <thead>
			<tr><td>‹<td colspan="5"><td>›
			<tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
		  <tbody>
		</table>';
}
else
	echo '<div class="wdname"><font size =5>Расписание этой группы ещё не добавлено</font></div>';

$sat = json_encode($sat);
$mon = json_encode($mon);
$group = json_encode($group);
$mode = json_encode($mode);
?>
<script>
function Calendar3(id, year, month) {
var group = <?php echo $group?>;
var sat = <?php echo $sat?>;
var mon = <?php echo $mon?>;
var mode = <?php echo $mode?>;
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
for(var  i = 1; i <= Dlast; i++) {
if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth())
    calendar += '<td style="border:1px solid black">';
else
	calendar += '<td>';
if (new Date(D.getFullYear(),D.getMonth(), i).getDay() == 0 || new Date(D.getFullYear(),D.getMonth(), i).getDay() == mon || new Date(D.getFullYear(),D.getMonth(), i).getDay() == sat) calendar += '<div class = "None">' + i + '</div>';
else
if (new Date().getMonth() > 7 && ((D.getMonth() < 8 && D.getFullYear() == new Date().getFullYear())||(D.getMonth() > 4 && D.getFullYear() == new Date().getFullYear()+1)||(D.getFullYear() < new Date().getFullYear()||D.getFullYear() > new Date().getFullYear()+1))) calendar += '<div class = "None">' + i + '</div>';
else
if (new Date().getMonth() < 5 && ((D.getMonth() < 8 && D.getFullYear() == new Date().getFullYear()-1)||(D.getMonth() > 4 && D.getFullYear() == new Date().getFullYear())||(D.getFullYear() < new Date().getFullYear()-1||D.getFullYear() > new Date().getFullYear()))) calendar += '<div class = "None">' + i + '</div>';
else calendar += '<a href="<?php echo base_url() ?>index.php/general/'+mode+'/'+group+'/'+D.getFullYear()+'/'+(D.getMonth()+1)+'/'+i+'">' + i + '</a>';
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
<?
if (file_exists($file_pointer))
{
?>
Calendar3("calendar3", new Date().getFullYear(), new Date().getMonth());
// переключатель минус месяц
document.querySelector('#calendar3 thead tr:nth-child(1) td:nth-child(1)').onclick = function() {
  Calendar3("calendar3", document.querySelector('#calendar3 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar3 thead td:nth-child(2)').dataset.month)-1);
}
// переключатель плюс месяц
document.querySelector('#calendar3 thead tr:nth-child(1) td:nth-child(3)').onclick = function() {
  Calendar3("calendar3", document.querySelector('#calendar3 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar3 thead td:nth-child(2)').dataset.month)+1);
}
<?
}
?>
</script>
</div>
</body>
</html>
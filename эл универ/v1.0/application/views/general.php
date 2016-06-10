<?php 
$this->my->Headme('Журнал')
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js">
</script>
</head>
<body>
<div class="wrapper">
<div class="content">
<div class="Page">
<?php
if ($group == 'PI_2_01') $engroup = 'PI_2_02';
else $engroup = 'PI_2_01';
echo '<div class="groupname">'.$group.'<a id="chg" href="http://e-university.esy.es/index.php/general/calendar/'.$engroup.'"><img src="/resource/img/reless.jpg" width="20" height="20" alt="сменить группу"></a></div>';

$this->my->AddLogout();

$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'/6ч.txt';
if (file_exists($file_pointer)) $sat = 8; else $sat = 6;
$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'/1ч.txt';
if (file_exists($file_pointer)) $mon = 8; else $mon = 1;

$sat = json_encode($sat);
$mon = json_encode($mon);
$group = json_encode($group);
?>

<table id="calendar3">
  <thead>
    <tr><td>‹<td colspan="5"><td>›
    <tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
  <tbody>
</table>

<script>
function Calendar3(id, year, month) {
var group = <?php echo $group?>;
var sat = <?php echo $sat?>;
var mon = <?php echo $mon?>;
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
if (new Date(D.getFullYear(),D.getMonth(), i).getDay() == 0 || new Date(D.getFullYear(),D.getMonth(), i).getDay() == mon || new Date(D.getFullYear(),D.getMonth(), i).getDay() == sat) calendar += '<td><div class = "None">' + i + '</div>';
else
if (new Date().getMonth() > 7 && ((D.getMonth() < 8 && D.getFullYear() == new Date().getFullYear())||(D.getMonth() > 4 && D.getFullYear() == new Date().getFullYear()+1)||(D.getFullYear() < new Date().getFullYear()||D.getFullYear() > new Date().getFullYear()+1))) calendar += '<td><div class = "None">' + i + '</div>';
else
if (new Date().getMonth() < 5 && ((D.getMonth() < 8 && D.getFullYear() == new Date().getFullYear()-1)||(D.getMonth() > 4 && D.getFullYear() == new Date().getFullYear())||(D.getFullYear() < new Date().getFullYear()-1||D.getFullYear() > new Date().getFullYear()))) calendar += '<td><div class = "None">' + i + '</div>';
else
if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth())
    calendar += '<td><a class="today" href="<?php echo base_url() ?>index.php/general/jurnal/'+group+'/'+D.getFullYear()+'/'+(D.getMonth()+1)+'/'+i+'">' + i + '</a>';
else calendar += '<td><a href="<?php echo base_url() ?>index.php/general/jurnal/'+group+'/'+D.getFullYear()+'/'+(D.getMonth()+1)+'/'+i+'">' + i + '</a>';
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
Calendar3("calendar3", new Date().getFullYear(), new Date().getMonth());
// переключатель минус месяц
document.querySelector('#calendar3 thead tr:nth-child(1) td:nth-child(1)').onclick = function() {
  Calendar3("calendar3", document.querySelector('#calendar3 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar3 thead td:nth-child(2)').dataset.month)-1);
}
// переключатель плюс месяц
document.querySelector('#calendar3 thead tr:nth-child(1) td:nth-child(3)').onclick = function() {
  Calendar3("calendar3", document.querySelector('#calendar3 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar3 thead td:nth-child(2)').dataset.month)+1);
}
</script>

</div>
</div>
</div>
</body>
</html>
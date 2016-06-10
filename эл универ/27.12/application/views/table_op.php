<?php 
$this->my->Headme('Редактор расписания');
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js">
</script>
<script>
$(document).ready(function(){
	$(".open").bind("click", function(){
		$(".bg").show();
		$(".dedlineout4").show();
		$(".open").hide();
	});
	$(".bg").bind("click", function(){
		$(".dedlineout4").hide();
		$(".bg").hide();
		$(".open").show();
	});
});
function enableText(but, Wday)
{
	but.parentElement.innerHTML = '<input type="text" name="'+Wday+'[]" placeholder="Название пары" maxlength="25" value=""><input type="text" name="'+Wday+'[]" placeholder="Название пары" maxlength="25" value="" style="display:none"><button type="button" class="addLesson" onClick="addLes(this, \''+Wday+'\')">Добавить пару</button><input type="checkbox" onchange="parity(this, \''+Wday+'\')"/>Н';
}
function addLes(addBut, Wday)
{
	var el = document.createElement('input');
		el.type = 'text';
		el.name = Wday+'[]';
		el.placeholder = 'Название пары';
		el.maxLength = '25';
		if (addBut.nextElementSibling.checked) el.style.display = 'none';
		addBut.parentElement.insertBefore(el, addBut);
		el = document.createElement('input');
		el.type = 'text';
		el.name = Wday+'[]';
		el.placeholder = 'Название пары';
		el.maxLength = '25';
		if (!addBut.nextElementSibling.checked) el.style.display = 'none';
		addBut.parentElement.insertBefore(el, addBut);
	if (addBut.parentElement.childNodes[18]) addBut.parentElement.removeChild(addBut);
}
function parity(checkbox, Wday)
{
	var add = 1;
	if (checkbox.checked) add = 0;
	for (var i=0;i<checkbox.parentElement.childNodes.length-3;i+=2)
	{
		checkbox.parentElement.childNodes[i+add].style.display = 'none';
		checkbox.parentElement.childNodes[i+1-add].style.display = '';
	}
}
</script>
</head>
<body>
<?
$hideOrShow='';
if ($group != "")
	$hideOrShow=' style="display:none;"';
?>
<div class="bg"<?=$hideOrShow?>></div>
<div class="dedlineout4"<?=$hideOrShow?>>
<?
	$this->load->model('mydb');
	$data = mydb::get_article('teachers', 'surname', 'login', $group);
	if ($data)
		$surname = $data[0]['surname'];
	else
		$surname = my::makeGroupNameClean($group);
	$data = mydb::get_article('teachers', 'surname');
	$Tlist = mydb::table_list();
	sort($Tlist);
	echo '<form method="POST" action="'.base_url().'index.php/general/editTable">
		<div ><input type="text" name="surname" list="surnameTable" value="'.$surname.'"></div>';
	echo '<datalist id="surnameTable">';
	for ($c = 0; $c < count($Tlist)-6;$c++)
	{
		echo '<option value="'.my::makeGroupNameClean($Tlist[$c]).'"></option>';
	}
	foreach ($data as $item)
	{
		echo '<option value="'.$item['surname'].'"></option>';
	}
	echo '</datalist><input type="submit" value="Выбрать"></form>';
?>
</div>
<?
$this->my->Menu();
echo '<div class="Page">';
$this->my->mesShow();
?>
<div id="tableEditTitle"><?=$surname?> <a href="javascript:void(0);" class="open">сменить</a></div>
<?
if ($group != "")
{
	$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'les.txt';
	if (file_exists($file_pointer))
	{
		if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
		$tableLes = unserialize( fread($file_handle, filesize($file_pointer)) );
		fclose($file_handle);
		$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'gr.txt';
		if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
		$tableGr = unserialize( fread($file_handle, filesize($file_pointer)) );
		fclose($file_handle);
	}
	$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'.txt';
	if (file_exists($file_pointer))
	{
		if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
		$tableLes = unserialize( fread($file_handle, filesize($file_pointer)) );
		fclose($file_handle);
	}
	$WdayEN = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
	$WdayRU = ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ'];
	$formIn = '';
	$Tlist = mydb::table_list();
	sort($Tlist);
	$dataList = '"/><datalist id="productName">';
	$student = false;
	for ($c = 0; $c < count($Tlist)-6;$c++)
	{
		if ($Tlist[$c] == $group) $student = true;
		$dataList .= '<option value="'.my::makeGroupNameClean($Tlist[$c]).'"></option>';
	}
	$dataList .= '</datalist>';

	for ($i=0;$i<16;$i+=2)
	{
		$formIn .= '<tr><td style="background:#3A80C6;color:#FFF;width:50px;">'.($i/2+1).' пара';
		for ($j=0;$j<6;$j++)
		{
			$formIn .= '<td>ч<input type="text" name="'.($i/2).'[]" placeholder="Пара" maxlength="25" value="';
			if (isset($tableLes[$j][$i])) $formIn .= $tableLes[$j][$i];
			$formIn .= '">';
			if (!$student)
			{
				$formIn .= '<input type="text" name="product[]" list="productName" placeholder="Группа" value="';
				if (isset($tableGr[$j][$i])) $formIn .= my::makeGroupNameClean($tableGr[$j][$i]);
				$formIn .= $dataList;
			}
			$formIn .= '<br>н<input type="text" name="'.($i/2).'[]" placeholder="Пара" maxlength="25" value="';
			if (isset($tableLes[$j][$i+1])) $formIn .= $tableLes[$j][$i+1];
			$formIn .= '">';
			if (!$student)
			{
				$formIn .= '<input type="text" name="product[]" list="productName" placeholder="Группа" value="';
				if (isset($tableGr[$j][$i+1])) $formIn .= my::makeGroupNameClean($tableGr[$j][$i+1]);
				$formIn .= $dataList;
			}
		}
	}
	echo '<form method="POST" action="'.base_url().'index.php/c_operations/saveTable/'.$group.'">
	<table id="tableEdit"> 
	<thead>
	<th><th>ПН<th>ВТ<th>СР<th>ЧТ<th>ПТ<th>СБ
	<tbody>
	'.$formIn.'
	</table>
	<input id="submitTableEdit" type="submit" name="enter" value="Сохранить"/>
	</form>';
}
?>
</div>	
</body>
</html>
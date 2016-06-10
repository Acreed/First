<?php 
$this->my->Headme('Авторизация');
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js">
</script>
<script>
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
<div class="Page">

<?
$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'les.txt';
if (file_exists($file_pointer))
{
	if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
	$table = unserialize( fread($file_handle, filesize($file_pointer)) );
	fclose($file_handle);
	$file_pointer = $_SERVER["DOCUMENT_ROOT"].'/table/'.$group.'gr.txt';
	if ( !$file_handle = fopen($file_pointer, 'rb') ) exit;
	$groups = unserialize( fread($file_handle, filesize($file_pointer)) );
	fclose($file_handle);
}
$WdayEN = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
$WdayRU = ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ'];
$formIn = '';
for ($i=0;$i<6;$i++)
{
	$formIn .= '<div class="editBlock">';
	if (isset($table[$i]))
	{
		for ($j=0;$j<count($table[$i]);$j++)
		{
			if ($j%2==0) $formIn .= '<input type="text" name="'.$WdayEN[$i].'[]" placeholder="Название пары" maxlength="25" value="'.$table[$i][$j].' '.$groups[$i][$j].'">';
			else $formIn .= '<input type="text" name="'.$WdayEN[$i].'[]" placeholder="Название пары" maxlength="25" value="'.$table[$i][$j].' '.$groups[$i][$j].'" style="display:none">';
		}
		$formIn .= '<button type="button" class="addLesson" onClick="addLes(this, \''.$WdayEN[$i].'\')">Добавить пару</button><input type="checkbox" onchange="parity(this, \''.$WdayEN[$i].'\')" value=""/>Н';
	}
	else $formIn .= '<button type="button" class="addDay" onClick="enableText(this, \''.$WdayEN[$i].'\')">'.$WdayRU[$i].'</button>';
	$formIn .= '</div>';
}
?>
<form method="POST" action="<?=base_url();?>index.php/c_operations/saveTable/<?=$group?>">
<?=$formIn?>
<input type="submit" name="enter" value="Сохранить"/>
</form>
</div>
</body>
</html>
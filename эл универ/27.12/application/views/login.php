<?php 
$this->my->Headme('Авторизация');
?>
<body>
<!--Вот когда освоишь, тогда и раскомментируй-->
<!--<div class="header"> /*Шапка*/ ТУТ МОГЛА БЫ БЫТЬ ВАША РЕКЛАМА,НО КОГДА-ТО ТУТ БУДЕТ ЛОГО,ЕСЛИ Я ОСВОЮ ПИКСЕЛЬАРТИНГ </div>-->
<?$this->my->mesShow();?>
<div class="logform">
	<form method="POST" action="<?=base_url();?>index.php/c_account/login">
		<input class="loginPage" type="text" id="login" name="login" placeholder="Логин" maxlength="15" pattern="[A-Za-z-0-9]{3,15}" title="3-10 латинских символов" required>
		<input class="loginPage" type="password" id="password" name="password" placeholder="Пароль" maxlength="20" pattern="[A-Za-z-0-9]{5,20}" title="5-20 латинских символов" required>
		<div class="menu_button" style="width:100%"><button style="width:94%" type="submit" name="enter" value="Войти" onclick="sendAllTheStuff()"><span>Войти</span></button></div>
		<!--<input type="submit" class="menu_button" value="Войти">-->
	</form>
</div>
</body>
</html>
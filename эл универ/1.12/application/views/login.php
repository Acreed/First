<?php 
$this->my->Headme('Авторизация');
?>
<body>
	<div class="logform">
		<form method="POST" action="<?=base_url();?>index.php/c_account/login">
			<input type="text" name="login" placeholder="Логин" maxlength="15" pattern="[A-Za-z-0-9]{3,15}" title="3-10 латинских символов" required>
			<input type="password" name="password" placeholder="Пароль" maxlength="20" pattern="[A-Za-z-0-9]{5,20}" title="5-20 латинских символов" required>
			<div class="menu_button" style="width:100%"><button style="width:94%" type="submit" name="enter" value="Войти"><span>Войти</span></button></div>
		</form>
	</div>
</body>
</html>
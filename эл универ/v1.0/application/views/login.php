<?php 
$this->my->Headme('Авторизация');
?>
<body>

<div class="wrapper">
<div class="content">
<div class="Page">
<div class="logform">
<form method="POST" action="<?=base_url();?>index.php/c_account/login">
<br><input type="text" name="login" placeholder="Логин" maxlength="10" pattern="[A-Za-z-0-9]{3,10}" title="3-10 латинских символов" required>
<br><input type="password" name="password" placeholder="Пароль" maxlength="20" pattern="[A-Za-z-0-9]{5,20}" title="5-20 латинских символов" required>
<br><br><input type="submit" name="enter" value="Войти">
</form>
</div>
</div>
</div>
</div>
</body>
</html>
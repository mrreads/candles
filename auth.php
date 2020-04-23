<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./css/auth.css">
</head>
<body style="background-image: url( );">

	<form class="login-form" method="POST" action="/php/autorization.php">
	
		<?php echo '<input type="hidden" name="url" value="'.$_SERVER['HTTP_REFERER'].'">'; ?>
      	<input type="text" name="login" required placeholder="Ваш логин... (введи 123)" class="h_login">
      	<input type="password" name="password" required placeholder="Ваш пароль... (введи 123)" class="h_login">

    	<div class="reg">
    		<input type="submit" name="auth-button" required class="voiti" value="ВОЙТИ">
      		<a href="./add.php"> Регистрация </a>
    	</div>

    </form>

</body>
</html>
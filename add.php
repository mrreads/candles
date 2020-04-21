<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/add.css">
</head>
<body>
    
	<div class="backb">
        <a href="./auth.php" class="back_to_button"> НАЗАД </a>
    </div>

    <!--  Форма для заполнения -->
    <form action="./php/registration.php" method="POST">
        <h1>РЕГИСТРАЦИЯ</h1>

        <?php if ($_GET['wrong'] == true) { echo "<h3> Вы ввели занятый логин! </h3>"; }?>
        
        <input type="text" name="name" placeholder="Имя" pattern="[А-Яа-яЁё \-]{2,30}" required>
        <input type="text" name="login" placeholder="Логин" required>
        <input type="password" name="password" class="password" placeholder="Пароль" required>   
        <input type="submit" value="ДОБАВИТЬ" name="reg-button" class="submit">   
    </form>

</body>
</html>
<?php
	SESSION_START();
	require ('./php/connection.php');

	$userId = $_SESSION['id_user'];

	if (empty($userId))
	{
		header("Location: auth.php");
	}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Конктуктор счечей </title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/contrustor.css">
    <script src="./js/constructor.js" defer></script>
</head>
<body>

    <div class="menu"> 
        <a href="index.php" class="">ГЛАВНАЯ</a> 
        <a href="constructor.php" class="">КОНСТРУКТОР</a>
        <a href="kabinet.php" class="">ЛИЧНЫЙ КАБИНЕТ</a>
        <a href="zakazi.php" class="">ВАШИ ЗАКАЗЫ</a>
        
        <?php
            if (isset($userId))
            {
                echo '<a href="php/logout.php"> ВЫЙТИ </a>';
            }
            else
            {
                echo '<a href="auth.php"> ВОЙТИ </a>';
            }
        ?>
    </div>

    <div class="contructor">
        <div class="image">
            <div class="image-color"></div>
            <div class="image-form" style="background-image: url('');"></div>
            <div class="image-zapah" style="background-image: url('');"></div>
        </div>

        <div class="vibor">

            <h2 class="h-formi"> ФОРМА СВЕЧИ - <span class="selected">НЕ ВЫБРАННО</span></h2>
            <div class="formi">
            <?php
                $queryForm = "SELECT * FROM form;";
                $resultForm = mysqli_query($link, $queryForm);

                while ($form = mysqli_fetch_assoc($resultForm))
                {
                    echo '<div class="forma" style="background-image: url('.$form['form_path'].')" data-name="'.$form['form_name'].'" data-id="'.$form['id_form'].'"> </div>';
                }
            ?>
            </div>

            <h2 class="h-colors"> ЦВЕТ СВЕЧИ - <span class="selected">НЕ ВЫБРАННО</span></h2>
            <div class="colors">
                <!-- <input type="color" name="" class="color" data-name="свой"> -->
                <?php
                    $queryColor = "SELECT * FROM color;";
                    $resultColor = mysqli_query($link, $queryColor);

                    while ($color = mysqli_fetch_assoc($resultColor))
                    {
                        echo '<div class="color" style="background-color: '.$color['color_code'].'" data-name="'.$color['color_name'].'" data-id="'.$color['id_color'].'"> </div>';
                    }
                ?>
            </div>

            <h2 class="h-zapahi"> ЗАПАХ СВЕЧИ - <span class="selected">НЕ ВЫБРАННО</span></h2>
            <div class="zapahi">
                <?php
                    $queryZapah = "SELECT * FROM zapah;";
                    $resultZapah = mysqli_query($link, $queryZapah);

                    while ($zapah = mysqli_fetch_assoc($resultZapah))
                    {
                        echo '<div class="zapah" style="background-image: url('.$zapah['zapah_path'].'" data-name="'.$zapah['zapah_name'].'"  data-id="'.$zapah['id_zapah'].'"> </div>';
                    }
                ?>
            </div>

            <h2 class="h-razmer"> РАЗМЕР - <span class="selected">НЕ ВЫБРАННО</span></h2>
            <div class="razmeri">
                <?php
                    $queryRazmer = "SELECT * FROM razmer;";
                    $resultRazmer = mysqli_query($link, $queryRazmer);

                    while ($razmer = mysqli_fetch_assoc($resultRazmer))
                    {
                        echo '<div class="razmer"  data-id="'.$razmer['id_razmer'].'">'.$razmer['razmer_name'].'</div>';
                    }
                ?>
            </div>

            <div class="buttons">
                <a href="index.php">НА ГЛАВНУЮ</a>
                <a id="save">ГОТОВО</a>
            </div>

        </div>
    </div>

    <div class="messageBox"></div>
</body>
</html>
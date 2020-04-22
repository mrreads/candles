<?php
	SESSION_START();
	require ('./php/connection.php');

	$userId = $_SESSION['id_user'];
	$idCandle = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title> Свеча </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/svecha.css">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>

	<div class="menu"> 
		<a href="index.php" class="">ГЛАВНАЯ</a> 
		<a href="constructor.php" class="">КОНСТРУКТОР</a>
		<a href="kabinet.php" class="">ЛИЧНЫЙ КАБИНЕТ</a>

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

	<div class="niz">
		<?php
			$querySvechi = 'SELECT
								*,
                                (color_price + form_price + razmer_price + zapah_price) as candle_price
							FROM
								candle,
								color,
								form,
								razmer,
								zapah
							WHERE
								candle.id_color = color.id_color
							AND 
								candle.id_form = form.id_form 
							AND 
								candle.id_razer = razmer.id_razmer 
							AND 
								candle.id_zapah = zapah.id_zapah
							AND
								candle.id_candle = '.$idCandle.';';
								
			
			$resultSvechi = mysqli_query($link, $querySvechi);

			while ($svecha = mysqli_fetch_assoc($resultSvechi))
			{
				echo '<div class="img">';
					echo '<div class="image-color" style="background-color:'.$svecha['color_code'].'"></div>';
					echo '<div class="picture"><img src="'.$svecha['form_path'].'"></div>';
				echo '</div>';
	
				echo '<form class="infa" method="POST">';

					echo '<h1>'.$svecha['candle_name'].'</h1>';

					echo '<h2 class="h-forma"> ФОРМА </h2>';
					echo '<div class="forma">'.$svecha['form_name'].'</div>';
		
					echo '<h2 class="h-size"> РАЗМЕР </h2>';
					echo '<div class="size">'.$svecha['razmer_name'].'</div>';
		
					echo '<h2 class="h-colors"> ЦВЕТ </h2>';
					echo '<div class="colors" style="background-color: '.$svecha['color_code'].'"></div>';
		
					echo '<h2 class="h-zapahi"> ЗАПАХ </h2>';
					echo '<div class="zapahi"><img src="'.$svecha['zapah_path'].'"></div>';
		
					echo '<h2 class="h-cena"> ЦЕНА </h2>';
					echo '<div class="cena">'.$svecha['candle_price'].' рублей</div>';

					echo '<input type="number" name="count" value="1" min="1" max="'.$svecha['form_available'].'">';

					echo '<div class="buttons">';
						echo '<input type="submit" value="В КОРЗИНУ">';
					echo '</div>';
				echo "</form>";
			}
		?>
		
		</div>

	</div>

</body>
</html>
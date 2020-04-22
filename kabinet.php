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
<html>
<head>
	<title> Личный кабинет </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/kabinet.css">
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

		<h3>СВЕЧИ, СОЗДАННЫЕ ВАМИ </h3>
		<h4> Тут отображаются свечи, созданные лично вами в конструкторе. </h4>

		<div class="flex">

		<?php
			$querySvechi = 'SELECT
								*,
								(color.color_price + form.form_price + razmer.razmer_price + zapah.zapah_price) as candle_price
							FROM
								candle,
								color,
								form,
								razmer,
								zapah,
								user_candle
							WHERE
								candle.id_color = color.id_color
							AND 
								candle.id_form = form.id_form 
							AND 
								candle.id_razer = razmer.id_razmer 
							AND 
								candle.id_zapah = zapah.id_zapah
							AND
								user_candle.id_candle = candle.id_candle
							AND
								user_candle.id_user = '.$userId;
								
			$resultSvechi = mysqli_query($link, $querySvechi);

			while ($svecha = mysqli_fetch_assoc($resultSvechi))
			{
				echo '<div class="infa">
						<div class="img_svecha">
							<div class="img-color" style="background-color: '.$svecha['color_code'].'" ></div>
							<img src="'.$svecha['form_path'].'">
						</div>
						<div class="h_infa">
							<ul>
								<li>ФОРМА: '.$svecha['form_name'].'</li>
								<li>РАЗМЕР: '.$svecha['razmer_name'].'</li>
								<li>ЗАПАХ: '.$svecha['zapah_name'].'</li>
								<div class="colors" style="background-color: '.$svecha['color_code'].'"></div>
								<li>ЦЕНА: '.$svecha['candle_price'].'</li>
								<li>НА СКЛАДЕ: '.$svecha['form_available'].'</li>
								<a href="svecha.php?id='.$svecha['id_candle'].'" class="">
									<div class="dalee" style="background-color: '.$svecha['color_code'].'">
										<img src="img/strelka.png">
									</div>
								</a>
							</ul>
						</div>	
					</div>';
			}
		?>

		</div>
	</div>	

</body>
</html>
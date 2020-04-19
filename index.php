<?php
	SESSION_START();
	require ('./php/connection.php');

	$userId = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html>
<head>
	<title> Главная страница </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="./css/glavnay.css">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>

	<div class="main" style="background-image: url(https://images.wallpaperscraft.ru/image/orehi_korica_svecha_71390_2048x1152.jpg);"> 
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
			
		<div class="buttons">
			<a href="constructor.php" class="create_svechi">СОЗДАТЬ СВОЮ СВЕЧУ</a>
			<a href="kabinet.php" class="moi_svechi">МОИ СВЕЧИ</a>
		</div>
	</div>

	<div class="nabor">
	<?php
		$querySvechi = 'SELECT
							*,
                            (color.color_price + form.form_price + razmer.razmer_price + zapah.zapah_price) as candle_price
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
							candle.id_zapah = zapah.id_zapah';
		$resultSvechi = mysqli_query($link, $querySvechi);

		while ($svecha = mysqli_fetch_assoc($resultSvechi))
		{
			echo '<div class="img_sveha">
					<a href="svecha.php?id='.$svecha['id_candle'].'" class="color" style="background-color: '.$svecha['color_code'].'"></a>
					<div class="zapah" style="background-image: url('.$svecha['zapah_path'].')"></div>
					<div class="razmer">',$svecha['razmer_name'].'</div>
					<div class="kartinka">
						<img src="'.$svecha['form_path'].'"> 
					</div>
				</div>';
		}
	?>
	</div>

</body>
</html>
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
	<title> Заказы </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/kabinet.css">
	<link rel="stylesheet" type="text/css" href="./css/zakazi.css">
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

		<div class="left">
			<h3> КОРЗИНА </h3>
			<h4> Тут товары, готовые к покупке. </h4>

			<div class="flex">

			<?php
				$queryCart = 'SELECT
									*,
									(color.color_price + form.form_price + razmer.razmer_price + zapah.zapah_price) as candle_price
								FROM
									candle,
									color,
									form,
									razmer,
									zapah,
									cart
								WHERE
									candle.id_color = color.id_color
								AND 
									candle.id_form = form.id_form 
								AND 
									candle.id_razer = razmer.id_razmer 
								AND 
									candle.id_zapah = zapah.id_zapah
								AND
									cart.id_user = '.$userId.'
								AND 
									cart.id_candle = candle.id_candle;';
									
				$resultCart = mysqli_query($link, $queryCart);

				while ($svechaCart = mysqli_fetch_assoc($resultCart))
				{
					echo '<div class="infa">
							<div class="img_svecha">
								<div class="img-color" style="background-color: '.$svechaCart['color_code'].'" ></div>
								<img src="'.$svechaCart['form_path'].'">
							</div>
							<div class="h_infa">
								<ul>
									<li>ФОРМА: '.$svechaCart['form_name'].'</li>
									<li>РАЗМЕР: '.$svechaCart['razmer_name'].'</li>
									<li>ЗАПАХ: '.$svechaCart['zapah_name'].'</li>
									<div class="colors" style="background-color: '.$svechaCart['color_code'].'"></div>
									<li>ЦЕНА: '.$svechaCart['candle_price'].'</li>
									<li>ВЫ ЗАКАЗЫВАЕТЕ: '.$svechaCart['cart_count'].'</li>

									<div style="margin-top: 25px;">
										<a class="delete" style="background-color: '.$svechaCart['color_code'].'" href="./php/deleteCart.php?id='.$svechaCart['id_cart'].'"> УДАЛИТЬ ИЗ КОРЗИНЫ </a>

										<a href="svecha.php?id='.$svechaCart['id_candle'].'" class="">
											<div class="dalee" style="background-color: '.$svechaCart['color_code'].'">
												<img src="img/strelka.png">
											</div>
										</a>
									
									</div>

								</ul>
							</div>	
						</div>';
				}
			?>
			</div>
			<?php

			if (mysqli_fetch_row(mysqli_query($link, 'SELECT COUNT(*) FROM `cart`'))[0] > 0)
			{
				echo '<a class="zakazat" href="./php/makeOrder.php">заказать</a>';
			}
			?>

		</div>

		<div class="right">
			<h3> ЗАКАЗЫ </h3>
			<h4> Тут ваши заказы, то, что вы уже заказывали в прошлом. </h4>

			<div class="flex">

			<?php
				$queryOrdersId = 'SELECT * FROM `order` WHERE id_user = '.$userId;
										
				$resultOrdersId = mysqli_query($link, $queryOrdersId);

				while ($orderId = mysqli_fetch_assoc($resultOrdersId))
				{
					echo '<div class="zakaz">';
						echo '<h1> Дата заказа - '.$orderId['order_date'].'</h1>';

						$candlesId = 'SELECT * FROM order_candle  WHERE id_order = '.$orderId['id_order'];
	
						$resultCandlesId = mysqli_query($link, $candlesId);

						while ($candle = mysqli_fetch_assoc($resultCandlesId))
						{
							
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
														user_candle.id_user = '.$userId.'
													AND 
														candle.id_candle = '.$candle['id_candle'];
													
												
													
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
												<a href="svecha.php?id='.$svecha['id_candle'].'" class="">
													<div class="dalee" style="background-color: '.$svecha['color_code'].'">
														<img src="img/strelka.png">
													</div>
												</a>
											</ul>
										</div>	
									</div>';
							}

						}
					
					echo '</div>';

					// echo '<div class="infa">
					// 		<div class="img_svecha">
					// 			<div class="img-color" style="background-color: '.$svecha['color_code'].'" ></div>
					// 			<img src="'.$svecha['form_path'].'">
					// 		</div>
					// 		<div class="h_infa">
					// 			<ul>
					// 				<li>ФОРМА: '.$svecha['form_name'].'</li>
					// 				<li>РАЗМЕР: '.$svecha['razmer_name'].'</li>
					// 				<li>ЗАПАХ: '.$svecha['zapah_name'].'</li>
					// 				<div class="colors" style="background-color: '.$svecha['color_code'].'"></div>
					// 				<li>ЦЕНА: '.$svecha['candle_price'].'</li>
					// 				<li>НА СКЛАДЕ: '.$svecha['form_available'].'</li>
					// 				<a href="svecha.php?id='.$svecha['id_candle'].'" class="">
					// 					<div class="dalee" style="background-color: '.$svecha['color_code'].'">
					// 						<img src="img/strelka.png">
					// 					</div>
					// 				</a>
					// 			</ul>
					// 		</div>	
					// 	</div>';
				}
			?>
			</div>
		</div>

	</div>	

</body>
</html>
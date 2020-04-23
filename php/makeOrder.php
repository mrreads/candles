<?php
    SESSION_START();

    require ('./connection.php');

    $userId = $_SESSION['id_user'];

    $count = mysqli_fetch_row(mysqli_query($link, 'SELECT id_order FROM `order` ORDER BY id_order DESC'  ))[0] + 1;

    while (mysqli_next_result($link));
    mysqli_query($link, "INSERT INTO `order` (`id_order`, `id_user`, `order_date`) VALUES (NULL, '$userId', '2020-04-23 14:27:01');");

    $queryCandles = "SELECT * FROM candle, color, form, razmer, zapah, cart WHERE candle.id_color = color.id_color AND candle.id_form = form.id_form AND candle.id_razer = razmer.id_razmer AND candle.id_zapah = zapah.id_zapah AND cart.id_user = $userId AND cart.id_candle = candle.id_candle";


    if (mysqli_multi_query($link, $queryCandles)) 
    {
        do 
        {
            if ($result = mysqli_store_result($link, MYSQLI_STORE_RESULT_COPY_DATA))
            {
                
                while ($candle = mysqli_fetch_assoc($result)) 
                {
                    $idCandle = $candle['id_candle'];
                    $idForm = $candle['id_form'];
                    $newCount = $candle['form_available'] - $candle['cart_count'];

                    $executeQuery .= "INSERT INTO `order_candle` (`id_order-candle`, `id_order`, `id_candle`) VALUES (NULL, '$count', '$idCandle'); ";

                    $executeQuery .= "UPDATE `form` SET `form_price` = '$newCount' WHERE `form`.`id_form` = '$idForm'; ";
                }
                mysqli_free_result($result);
            }
        } 
        while (mysqli_next_result($link));
    }

    $executeQuery .= "DELETE FROM cart WHERE id_user = $userId;";
    
    if ($finalResult = mysqli_multi_query($link, $executeQuery))
    {
        mysqli_close($link);
        
    }
    header("Location: ../zakazi.php");
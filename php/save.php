<?php
    SESSION_START();

    require ('./connection.php');

    $userId = $_SESSION['id_user'];
    
    $form = $_GET['form'];
    $color = $_GET['color'];
    $zapah = $_GET['zapah'];
    $razmer = $_GET['razmer'];

    $count = mysqli_fetch_row(mysqli_query($link, 'SELECT id_candle FROM `candle` ORDER BY id_candle DESC'  ))[0] + 1;

    $queryCandleAdd = "INSERT INTO `candle` (`id_candle`, `candle_name`, `id_zapah`, `id_form`, `id_color`, `id_razer`) VALUES ($count, 'свечка $count', $zapah, $form, $color, $razmer);";
    mysqli_query($link, $queryCandleAdd);
    $queryUserCandleAdd = "INSERT INTO `user_candle` (`id_custom`, `id_candle`, `id_user`) VALUES (NULL, $count, $userId);";
    mysqli_query($link, $queryUserCandleAdd);
    header("Location: ./../kabinet.php");
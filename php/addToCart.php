<?php
    SESSION_START();

    require ('./connection.php');

    $userId = $_SESSION['id_user'];
    
    $idCandle = $_POST['id_candle'];
    $count = $_POST['count'];

    mysqli_query($link, "INSERT INTO `cart` (`id_cart`, `id_user`, `id_candle`, `cart_count`) VALUES (NULL, '$userId', '$idCandle', '$count');");

    header("Location: ../zakazi.php");
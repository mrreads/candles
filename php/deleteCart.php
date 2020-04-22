<?php
    SESSION_START();

    require ('./connection.php');
    
    $id = $_GET['id'];

    mysqli_query($link, "DELETE FROM cart WHERE id_cart = $id");

    header("Location: ../zakazi.php");
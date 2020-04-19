<?php
    SESSION_START();

    unset($_SESSION['id_user']);
    unset($_SESSION['user_name']);

    header("Location: ./../index.php");
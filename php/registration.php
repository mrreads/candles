<?php

    SESSION_START();

    require_once './connection.php';

    if (isset($_POST['reg-button']))
    {
        $name = $_POST['name'];
        $login = $_POST['login'];
        $password = $_POST['password'];

        $queryCheck = "SELECT
                                COUNT(*)
                        FROM
                            `users`
                        WHERE
                            users.user_login = $login;";
                            
        $resultCheck = mysqli_fetch_array(mysqli_query($link, $queryCheck))[0];
        
        if ($resultCheck == 0)
        {
            $queryRegister = "INSERT INTO `users` (`id_user`, `user_name`, `user_login`, `user_password`) VALUES (NULL, '$name', '$login', '$password');";
            $register = mysqli_query($link, $queryRegister);
            header("Location: ../auth.php");
        }
        else
        {
            header("Location: ../add.php?wrong=true");
        }


    }
?>
<?php

    SESSION_START();

    require_once './connection.php';

    if (isset($_POST['auth-button']))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $url = $_POST['url'];

        $queryCheck = "SELECT 
                            * 
                        FROM 
                            users
                        WHERE 
                            user_login = $login
                        AND
                            user_password = $password;";

        $resultCheck = mysqli_query($link, $queryCheck);

        if ($resultCheck)
        {
            while ($userData = mysqli_fetch_assoc($resultCheck))
            {
                $_SESSION['id_user'] = $userData['id_user'];
                $_SESSION['user_name'] = $userData['user_name'];
            }

            echo '<meta http-equiv="refresh" content="0;'.$url.'">';
        }
        else
        {
            echo "Такого пользователя не найдено";
        }
    }
?>
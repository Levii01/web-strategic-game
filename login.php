<?php

    session_start();
    require_once "connect.php";

    $connect = @new mysqli($host, $db_user, $db_password, $db_name);

    if ($connect->connect_errno!=0)
    {
        echo "Error: ".$connect->connect_errno;
        #" Description: ".$connect->connect_error;
    }
    else
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");

        if($rezult = @$connect->query(
            sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
            mysqli_real_escape_string($connect, $login),
            mysqli_real_escape_string($connect, $password))))
        {
            $how_much_user = $rezult->num_rows;
            if($how_much_user>0)
            {
                $_SESSION['logged_in'] = true;

                $row = $rezult->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['user'] = $row['user'];
                $_SESSION['wood'] = $row['drewno'];
                $_SESSION['stone'] = $row['kamien'];
                $_SESSION['grain'] = $row['zboze'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['premiumday'] = $row['dnipremium'];

                unset($_SESSION['error']);
                $rezult->free_result();
                header('Location: game.php');
            }else {

                $_SESSION['error'] = '<span style="color:red"> Wrong login or password! </span>';
                header('Location: index.php');
            }
        }
        $connect->close();
    }

?>
<?php
    session_start();
    if(isset($_SESSION['logged_in'])&&($_SESSION['logged_in']==true))
    {
        header('Location: game.php');
        exit();
    }

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1"/>
    <title>Strategic command</title>
</head>

<body>
<h1>Strategic command</h1>
<h2>Only the dead have seen the end of war <br> ~Platon</h2>

<form action="login.php" method="post">
    Login:<br>
    <input type="text" name="login"/> <br>

    Password:<br>
    <input type="password" name="password"/> <br><br>
    <input type="submit" value="Log In"/>

</form>

<?php

    if (isset($_SESSION['error'])) echo $_SESSION['error'];

?>

</body>
</html>
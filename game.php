<?php
    session_start();

    if(!isset($_SESSION['logged_in']))
    {
        header('Location: index.php');
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

<?php

    echo "<p>Wellcome ".$_SESSION['user'].'![<a href="logout.php">Log out</a>]</p>';
    echo "<p><b>Wood</b>: ".$_SESSION['wood'];
    echo "|<b> Stone</b>: ".$_SESSION['stone'];
    echo "|<b> Grain</b>: ".$_SESSION['grain']."</p>";

    echo "<p><b>E-mail</b>: ".$_SESSION['email'];
    echo "<br><b>Premium days</b>: ".$_SESSION['premiumday'];

?>

</body>
</html>
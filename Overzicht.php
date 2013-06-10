<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['loginnaam'])) {
    header("location:index.php");
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
        <title>Studentenhuis</title>
    </head>
    <body>
        <div id='kalender'>
            <ul>
                <li class='active'><a href='#'>Dag overzicht</a></li>
                <li><a href='create_bericht.php'>Berichten</a></li>
                <li><a href='create_aanwezig.php'>Wie is er thuis?</a></li>
                <li><a href=''>Etenstijd</a></li>
                <li class='last'><a href='create_maandoverzicht.php'>Maand overzicht</a></li>
            </ul>
            <?php
            echo "Welkom thuis " . $_SESSION['loginnaam'] . "!";
            echo"</br>";
            echo "<a href='logOut.php'>Log uit</a>";
            ?>
        </div>
    </body>
</html>
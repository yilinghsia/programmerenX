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
        <?php
        include('navigatieMenu.php');
        ?>
        <div id="content">
        <?php
        echo"<form method='post' action='verwerk_roosterpunt.php'>";
        echo "<table>";
// set current date
        $date = date("d-m-Y");
// parse about any English textual datetime description into a Unix timestamp
        $ts = strtotime($date);
// find the year (ISO-8601 year number) and the current week
        $year = date('o', $ts);
        $week = date('W', $ts);
// print week for the current date
        for ($i = 1; $i <= 7; $i++) {
            // timestamp from ISO week date format
            $ts = strtotime($year . 'W' . $week . $i);
            $datum = date("l d/m/Y ", $ts);
            echo '<tr><td><input type="text" readonly name="datum" value="'. $datum . '"></td></tr>';
            echo" <tr><td> <input type='text' name='onderwerp' placeholder='Onderwerp'/></td>";
            echo" <tr><td> <input type='text' name='opmerkingen' placeholder='Eventuele opmerkingen'/></td>";
            echo '<td><input type="checkbox"  name="aanwezigheid[]" value=" '. $datum . ' ">Aanwezig</td></tr>';
        }
        echo"<tr><td><input type='submit' value='Verstuur je rooster'/></td></tr>";
        echo "</table></form>";
        ?></div>
    </body>
</html>

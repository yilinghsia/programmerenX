<?php

$host = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = ""; // Mysql password 
$db_name = "studentenhuis"; // Database name 
$tbl_name = "persoon"; // Table name 
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die("cannot connect");
mysql_select_db("$db_name") or die("cannot select DB");

$loginnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];
$sql = "SELECT id FROM $tbl_name WHERE Loginnaam='" . mysql_real_escape_string($loginnaam) . "' AND  Wachtwoord='" . mysql_real_escape_string($wachtwoord) . "'";
$rs = mysql_query($sql);
$count = mysql_num_rows($rs);
if ($count == 1) {
    session_start();
    $_SESSION['loginnaam'] = $loginnaam;
    $_SESSION['wachtwoord'] = $wachtwoord;

    header("location:overzicht.php");
} else {
    echo "Verkeerde combinatie van gebruikersnaam/wachtwoord!";
}
?>

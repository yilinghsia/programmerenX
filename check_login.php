<?php
require_once "Bootstrap.php";

$loginnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];
$dql = "SELECT k FROM Persoon k WHERE k.Loginnaam='$loginnaam' AND k.Wachtwoord= '$wachtwoord'";
$query = $entityManager->createQuery($dql)
        ->getResult();

if ($query != NULL) {
    foreach ($query AS $test) {
        echo $test->getId();
        session_start();
        $_SESSION['loginnaam'] = $loginnaam;
        $_SESSION['wachtwoord'] = $wachtwoord;
        header("location:overzicht.php");
    }
} else {
    echo "Verkeerde combinatie van gebruikersnaam/wachtwoord!";
}
?>

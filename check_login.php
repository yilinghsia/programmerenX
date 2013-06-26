<?php

require_once "Bootstrap.php";

$loginnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];
$dql = "SELECT k FROM Persoon k WHERE k.Loginnaam='$loginnaam' AND k.Wachtwoord= '$wachtwoord'";
$query = $entityManager->createQuery($dql)
        ->getResult();

if ($query != NULL) {
    foreach ($query AS $inlogger) {
        $functierol = $inlogger->getFunctierol();
        if ($functierol == null) {
            session_start();
            $_SESSION['loginnaam'] = $loginnaam;
            $_SESSION['functierol'] = $functierol;
            header("location:overzicht.php");
        }
        else if ($functierol == "admin") {
            session_start();
            $_SESSION['loginnaam'] = $loginnaam;
            $_SESSION['functierol'] = $functierol;
            header("location:Adminpaginas/admin.php");
        }
    }
} else {
    echo "Verkeerde combinatie van gebruikersnaam/wachtwoord!";
}
?>

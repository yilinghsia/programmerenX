<?php
header( "refresh:4;url=gebruikerGegevens.php" );
require_once "Bootstrap.php";
require 'src/Persoon.php';
session_start();
if (!isset($_SESSION['loginnaam'])) {
    header("location:index.php");
}

$naamInSession = $_SESSION['loginnaam'];
$dql = "SELECT g FROM Persoon g WHERE g.Loginnaam='$naamInSession'";
$query = $entityManager->createQuery($dql)
        ->getResult();
foreach ($query AS $gebruiker) {
    $gebruikerId = $gebruiker->getId();
}

$data=$entityManager->getRepository('Persoon')->find($gebruikerId);

$data->setWachtwoord($_POST['wachtwoord']);
$data->setNaam($_POST['voornaam']);
$data->setAchternaam($_POST['achternaam']);
$data->setStudie($_POST['studie']);
$data->setStudiejaar($_POST['studiejaar']);
$data->setBijbaan($_POST['bijbaan']);
$data->setEetgewoonte($_POST['eetgewoonte']);

$entityManager->flush();
echo"De wijzigingen zijn gelukt! Je wordt binnen enkele seconden weer teruggebracht";
?>

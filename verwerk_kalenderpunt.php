<?php
header("refresh:4;url=create_maandoverzicht.php");
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
$bewonerId = $entityManager->getRepository('Persoon')->find($gebruikerId);
$datum = $_POST['datum'];
$taaknaam = $_POST['taakNaam'];
$takensoort = $_POST['takensoort'];
$beschrijving = $_POST['beschrijving'];

//$taakBewoner= $entityManager->getRepository('Persoon')->find($persoonId);
$kalenderpunt = new Kalenderpunt();
$kalenderpunt->setDatum($datum);
$kalenderpunt->setNaam($taaknaam);
$kalenderpunt->setSoort($takensoort);
$kalenderpunt->setBeschrijving($beschrijving);
$kalenderpunt->setPersoon_id($bewonerId);
$entityManager->persist($kalenderpunt);
$entityManager->flush();
echo 'Kalenderpunt is opgeslagen! Je wordt binnen een paar seconden terug gebracht';
?>
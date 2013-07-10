<?php
header("refresh:4;url=create_aanwezig.php");

require_once "Bootstrap.php";
require 'src/PersoonRoosterpunt.php';
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

$aanwezig = $_POST['aanwezigheid'];

foreach ($aanwezig as $datumUpdate) {
    $roosterpunt = new PersoonRoosterpunt();
    $roosterpunt->setOnderwerp($_POST['onderwerp']);
    $roosterpunt->setBeschrijving($_POST['opmerkingen']);
    $roosterpunt->setPersoon_id($gebruikerId);
    $roosterpunt->setDatum($datumUpdate);
    $roosterpunt->setAanwezig('1');

    
    $entityManager->persist($roosterpunt);
    $entityManager->flush();
} echo 'Rooster is verstuurd! Je wordt binnen een paar seconden terug gebracht';
?>

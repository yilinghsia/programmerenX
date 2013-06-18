<?php
header( "refresh:4;url=overzicht_transactie.php" );
require_once "Bootstrap.php";
require 'src/Transactie.php';
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
$ontvangerId=$_POST['ontvanger'];
$ontvangerTransactie=$entityManager->getRepository('Persoon')->find($ontvangerId);
$currentDate = date("Y-m-d");

$transactie = new Transactie();
$transactie->setBedrag($_POST['bedrag']);
$transactie->setDatum($currentDate);
$transactie->setOpmerking($_POST['commentaar']);
$transactie->setVerzender_id($data);
$transactie->setOntvanger_id($ontvangerTransactie);
$entityManager->persist($transactie);
$entityManager->flush();
echo 'Transactie is verstuurd! Je wordt binnen een paar seconden terug gebracht';

?>

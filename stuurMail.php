<?php
require_once "Bootstrap.php";
require 'src/Bericht.php';
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
$ontvangerBericht=$entityManager->getRepository('Persoon')->find($ontvangerId);


$currentDate = date("Y-m-d");

$bericht = new Bericht();
$bericht->setDatum($currentDate);
$bericht->setOnderwerp($_POST['onderwerp']);
$bericht->setBericht($_POST['berichtje']);
$bericht->setVerzender_id($data);
$bericht->setOntvanger_id($ontvangerBericht);
$entityManager->persist($bericht);
$entityManager->flush();
echo 'Berichtje is verstuurd!';


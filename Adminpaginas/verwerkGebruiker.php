<?php

header("refresh:4;url=bewonersInfo.php");
require_once "../Bootstrap.php";
require '../src/Persoon.php';
include('session.php');

$voornaam = $_POST['voornaam'];
$huurhoogte = $_POST['huurhoogte'];
$functierol = $_POST['functierol'];

$dql = "SELECT g from Persoon g where g.Naam='$voornaam'";
$query = $entityManager->createQuery($dql)
        ->getResult();
foreach ($query AS $gebruiker) {
    $gebruikerId = $gebruiker->getId();
}
$data=$entityManager->getRepository('Persoon')->find($gebruikerId);
$data->setFunctierol($functierol);
$data->setHuurhoogte($huurhoogte);

$entityManager->flush();
echo"De wijzigingen zijn gelukt! Je wordt binnen enkele seconden weer teruggebracht";
?>

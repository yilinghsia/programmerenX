<?php
header("refresh:4;url=admin.php");
require_once "../Bootstrap.php";
require '../src/Huis.php';
include('session.php');

$huisNaam = $_POST['huisnaam'];
$huisAdres = $_POST['huisadres'];
$huurdatum = $_POST['huurdatum'];
$naamInSession = $_SESSION['loginnaam'];

$dql = "SELECT g FROM Persoon g WHERE g.Loginnaam='$naamInSession'";
$query = $entityManager->createQuery($dql)
        ->getResult();

foreach ($query AS $gebruiker) {
    $gebruikerId = $gebruiker->getId();
}
$data = $entityManager->getRepository('Persoon')->find($gebruikerId);
$huisId = $data->getHuis_Id()->getId();

$data = $entityManager->getRepository('Huis')->find($huisId);
$data->setNaam($huisNaam);
$data->setAdres($huisAdres);
$data->setHuurdatum($huurdatum);
$entityManager->flush();
echo"De wijzigingen zijn gelukt! Je wordt binnen enkele seconden weer teruggebracht";
?>

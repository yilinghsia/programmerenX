<?php
header( "refresh:4;url=create_maandoverzicht.php" );
require_once "Bootstrap.php";
require 'src/Persoon.php';

$persoonId= $_POST['ontvanger'];
$datum= $_POST['datum'];
$taaknaam=$_POST['taakNaam'];
$takensoort=$_POST['takensoort'];
$beschrijving= $_POST['beschrijving']; 

$taakBewoner= $entityManager->getRepository('Persoon')->find($persoonId);
$kalenderpunt= new Kalenderpunt();
$kalenderpunt->setDatum($datum);
$kalenderpunt->setNaam($taaknaam);
$kalenderpunt->setSoort($takensoort);
$kalenderpunt->setBeschrijving($beschrijving);
$kalenderpunt->setPersoon_id($taakBewoner);
$entityManager->persist($kalenderpunt);
$entityManager->flush();
echo 'Berichtje is verstuurd! Je wordt binnen een paar seconden terug gebracht';
?>
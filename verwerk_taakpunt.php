<?php
header( "refresh:4;url=Overzicht.php" );
require_once "Bootstrap.php";
require 'src/Persoon.php';

$persoonId= $_POST['ontvanger'];
$begindatum= $_POST['begindatum'];
$einddatum= $_POST['einddatum'];
$taaknaam=$_POST['taakNaam'];
$categorie=$_POST['takensoort'];
$beschrijving= $_POST['beschrijving']; 

//$taakBewoner= $entityManager->getRepository('Persoon')->find($persoonId);
$taakpunt= new Taakpunt();
$taakpunt->setBegindatum($begindatum);
$taakpunt->setEinddatum($einddatum);
$taakpunt->setBeschrijving($beschrijving);
$taakpunt->setTaak($taaknaam);
$taakpunt->setVoltooiing('0');
$taakpunt->setCategorie($categorie);
$taakpunt->setPersoon_id($persoonId);

$entityManager->persist($taakpunt);
$entityManager->flush();
echo 'Taakpunt is opgeslagen! Je wordt binnen een paar seconden terug gebracht';
?>
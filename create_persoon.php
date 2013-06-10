<?php
header( "refresh:4;url=index.php" );
require_once "Bootstrap.php";
require 'src/Persoon.php';

//$newUsername = $argv[1];

$persoon = new Persoon();
$persoon->setLoginnaam($_POST['loginnaam']);
$persoon->setWachtwoord($_POST['wachtwoord']);
$persoon->setNaam($_POST['voornaam']);
$persoon->setAchternaam($_POST['achternaam']);
$persoon->setGeboortedatum($_POST['geboortedatum']);
$persoon->setGeslacht($_POST['geslacht']);
$persoon->setStudie($_POST['studie']);
$persoon->setStudiejaar($_POST['studiejaar']);
$persoon->setBijbaan($_POST['bijbaan']);
$persoon->setEetgewoonte($_POST['eetgewoonte']);

$entityManager->persist($persoon);
$entityManager->flush();
echo 'Registeren is gelukt! Je wordt binnen een paar seconden teruggebracht naar de homepage';


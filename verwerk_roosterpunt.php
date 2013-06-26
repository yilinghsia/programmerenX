<?php

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
//$persoonId = $entityManager->getRepository('Persoon')->find($gebruikerId);


//$dql = "SELECT r from PersoonRoosterpunt r WHERE r.Datum='$aanwezig'";
/*if (isset($aanwezig)) {
    foreach ($aanwezig as $aanwezigDag) {
$rooster = $entityManager->createQuery("UPDATE PersoonRoosterpunt r SET r.Aanwezig = '1' WHERE r.Datum='$aanwezigDag'");
 $rows = $rooster->execute();

echo $rows;
    }
} else {
    $rooster = $entityManager->createQuery("UPDATE PersoonRoosterpunt r SET r.Aanwezig = '0' WHERE r.Datum='$aanwezigDag'");
     $rows = $rooster->execute();

echo $rows;
}**/
$datum = $_POST['datum'];
foreach ($datum as $datumUpdate) {
    $roosterpunt = new PersoonRoosterpunt();
    $roosterpunt->setOnderwerp($_POST['onderwerp']);
    $roosterpunt->setBeschrijving($_POST['opmerkingen']);
    $roosterpunt->setPersoon_id('2');
    $roosterpunt->setDatum($datumUpdate);
   // $roosterpunt->setAanwezig($rooster);
    
$aanwezig = $_POST['aanwezigheid'];    
foreach($aanwezig as $aanwezigDag){
    if (isset($aanwezigDag)) {
        $dql2= "UPDATE PersoonRoosterpunt r SET r.Aanwezig = '1' WHERE r.Datum='$datum'";
        $roosterpunt->setAanwezig($dql2);
    }else{
        $roosterpunt->setAanwezig('0');
    }
}
print_r($aanwezig);
   //$entityManager->persist($roosterpunt);
    //$entityManager->flush();
} echo 'Rooster is verstuurd! Je wordt binnen een paar seconden terug gebracht';
?>

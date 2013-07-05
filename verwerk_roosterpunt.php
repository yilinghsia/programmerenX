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
$persoonId = $entityManager->getRepository('Persoon')->find($gebruikerId);

$datum = $_POST['datum'];
$aanwezig = $_POST['aanwezigheid'];

foreach ($datum as $datumUpdate) {
    $roosterpunt = new PersoonRoosterpunt();
    $roosterpunt->setOnderwerp($_POST['onderwerp']);
    $roosterpunt->setBeschrijving($_POST['opmerkingen']);
    $roosterpunt->setPersoon_id($persoonId);
    $roosterpunt->setDatum($datumUpdate);
     /** foreach ($aanwezig as $aanwezigDag) {
      if (isset($aanwezigDag)) {
            $dql2 = "UPDATE PersoonRoosterpunt r SET r.Aanwezig = '1' WHERE r.Datum='$datum'";
            $roosterpunt->setAanwezig($dql2);
        } else {
            $roosterpunt->setAanwezig('0');
        }
   echo $aanwezigDag;
        }**/
if(!isset ($aanwezig)){
        $roosterpunt->setAanwezig("0");
    }
    echo $datumUpdate;
    echo $aanwezig;
    
   // $entityManager->persist($roosterpunt);
   // $entityManager->flush();
} echo 'Rooster is verstuurd! Je wordt binnen een paar seconden terug gebracht';
?>

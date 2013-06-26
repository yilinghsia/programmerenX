<!DOCTYPE html>
<?php
require_once "../Bootstrap.php";
require '../src/Persoon.php';
require '../src/Huis.php';
require '../src/PersoonRoosterpunt.php';

include('session.php');
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../style/style.css"/>
        <title>Studentenhuis</title>
    </head>
    <body>
        <?php
        include('navigatie.php');
        ?>
        <div id="content">
            <table width="100%">
                <tr>
                    <td><h3>Wie zijn er vandaag aanwezig:</h3></td>
                    <td><h4>Onderwerp</h4></td>
                    <td><h4>Opmerkingen</h4></td>
                </tr>
                <?php
                $naamInSession = $_SESSION['loginnaam'];
                $dql = "SELECT g FROM Persoon g WHERE g.Loginnaam='$naamInSession'";
                $query = $entityManager->createQuery($dql)
                        ->getResult();

                foreach ($query AS $gebruiker) {
                    $gebruikerId = $gebruiker->getId();
                }
                $data = $entityManager->getRepository('Persoon')->find($gebruikerId);
                $huisId = $data->getHuis_Id()->getId();

                $dql2 = "SELECT a FROM Persoon a JOIN a.Huis_Id b WHERE b.id='$huisId'";
                $query2 = $entityManager->createQuery($dql2)
                        ->getResult();
                $currentDate = date("d-m-Y");
                // set current date
// parse about any English textual datetime description into a Unix timestamp
                $ts = strtotime($currentDate);
// find the year (ISO-8601 year number) and the current week
                $year = date('o', $ts);
                $week = date('W', $ts);
// print week for the current date
                for ($i = 1; $i <= 7; $i++) {
                    // timestamp from ISO week date format
                    $ts = strtotime($year . 'W' . $week . $i);
                    $datum = date("l d/m/Y ", $ts);
                }
                foreach ($query2 as $bewoner) {
                    $bewonerId = $bewoner->getId();
                    $aanwezigQuery = "SELECT a from PersoonRoosterpunt a WHERE a.Datum='$datum' AND a.Aanwezig='1' AND a.Persoon_id='$bewonerId'";
                    $query = $entityManager->createQuery($aanwezigQuery)
                            ->getResult();
                    foreach ($query AS $aanwezigQuery) {
                        $aanwezig = $aanwezigQuery->getId();
                        $opmerking = $aanwezigQuery->getBeschrijving();
                        $onderwerp = $aanwezigQuery->getOnderwerp();
                        $data = $entityManager->getRepository('PersoonRoosterpunt')->find($aanwezig);
                        $bewonerId = $data->getPersoon_id();
                        $naam = $entityManager->getRepository('Persoon')->find($bewonerId);
                        $naambewoner = $naam->getNaam();
                        echo"<tr><td>" . $naambewoner . "</td>";
                        echo"<td>" . $onderwerp . "</td>";
                        echo"<td>" . $opmerking . "</td></tr>";
                    }
                }

                echo"<tr><td><h3>Wie zijn er vandaag afwezig:</h3></td></tr>";
                foreach ($query2 as $bewoner) {
                    $bewonerId = $bewoner->getId();
                    $aanwezigQuery = "SELECT a from PersoonRoosterpunt a WHERE a.Datum='$datum' AND a.Aanwezig='0' AND a.Persoon_id='$bewonerId'";
                    $query = $entityManager->createQuery($aanwezigQuery)
                            ->getResult();
                    foreach ($query AS $afwezigQuery) {
                        $afwezig = $afwezigQuery->getId();
                        $opmerking = $afwezigQuery->getBeschrijving();
                        $onderwerp = $afwezigQuery->getOnderwerp();
                        $data = $entityManager->getRepository('PersoonRoosterpunt')->find($afwezig);
                        $bewonerId = $data->getPersoon_id();
                        $naam = $entityManager->getRepository('Persoon')->find($bewonerId);
                        $naambewoner = $naam->getNaam();
                        echo"<tr><td>" . $naambewoner . "</td>";
                        echo"<td>" . $onderwerp . "</td>";
                        echo"<td>" . $opmerking . "</td></tr>";
                    }
                }
                ?><br/>
                <tr><td><a href="create_roosterpunt.php">Geef aan op welke dagen jij thuis bent!</a></td></tr>
            </table>
        </div>
    </body>
</html>

<!DOCTYPE html>
<?php
require_once "Bootstrap.php";
require 'src/Persoon.php';
require 'src/Huis.php';
require 'src/PersoonRoosterpunt.php';


session_start();
if (!isset($_SESSION['loginnaam'])) {
    header("location:index.php");
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
        <title>Studentenhuis</title>
    </head>
    <body>
        <?php
        include('navigatieMenu.php');
        ?>
        <div id="content">
            <table width="100%">
                <tr><td><a href="create_roosterpunt.php">Geef aan op welke dagen jij thuis bent!</a></td></tr>

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

                // set current date
                $date = date("l d/m/Y");

                foreach ($query2 as $bewoner) {
                    $bewonerId = $bewoner->getId();
                    $aanwezigQuery = "SELECT a from PersoonRoosterpunt a WHERE a.Datum='$date' AND a.Aanwezig='1' AND a.Persoon_id='$bewonerId'";
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
                ?><br/>
            </table>
        </div>
    </body>
</html>

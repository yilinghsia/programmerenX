<!DOCTYPE html>
<?php
require_once "../Bootstrap.php";
require '../src/Persoon.php';
require '../src/Huis.php';

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
            ?>
            <table width="100%">
                <tr>
                    <td><h3>Voornaam</h3></td>
                    <td><h3>Achternaam</h3></td>
                </tr>
                <?php
                foreach ($query2 as $bewoners) {
                    $bewonerId= $bewoners->getId();
                    echo' <tr>';
                    echo'   <td> ';
                    echo $bewoners->getNaam();
                    echo'</td>';
                    echo'<td>';
                    echo $bewoners->getAchternaam();
                    echo'</td>';
                    echo'<td>';
                    echo'<a href="wijzigGebruikers.php?id='.$bewonerId .'">Wijzig gegevens</a>';
                    echo'</td>';
                    echo'</tr>';
                }
                ?>
            </table>
        </div>
    </body>
</html>

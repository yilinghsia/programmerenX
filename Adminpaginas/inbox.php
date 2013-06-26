<!DOCTYPE html>
<?php
require_once "../Bootstrap.php";
require '../src/Bericht.php';
require '../src/Persoon.php';
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
            $dqlMail = "SELECT b FROM Bericht b WHERE b.Ontvanger_id='$gebruikerId'";
            $queryMail = $entityManager->createQuery($dqlMail)
                    ->getResult();
            ?>
            <table border="0" width="100%">
                <tr>
                    <td><h3>Verzender</h3></td>
                    <td><h3>Onderwerp</h3></td>
                    <td><h3>Datum</h3></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php foreach ($queryMail as $mail) {
                echo $mail->getVerzender_id()->getNaam() . "</br>";
            }
            ?></td>
                    <td>
                        <?php foreach ($queryMail as $mail) {
                            $mailId= $mail->getId();    
                            echo '<a href="leesMail.php?id='. $mailId .'">' . $mail->getOnderwerp() . "</a></br>";
                            }
            ?></a></td>
                    <td><?php
                            foreach ($queryMail as $mail) {
                                echo $mail->getDatum() . "</br>";
                            }
            ?></td>
                </tr>
            </table>
        </div>
    </body>
</html>

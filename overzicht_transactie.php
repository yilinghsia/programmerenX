<!DOCTYPE html>
<?php
require_once "Bootstrap.php";
require 'src/Transactie.php';
require 'src/Persoon.php';
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
            <?php
            $naamInSession = $_SESSION['loginnaam'];
            $dql = "SELECT g FROM Persoon g WHERE g.Loginnaam='$naamInSession'";
            $query = $entityManager->createQuery($dql)
                    ->getResult();
            foreach ($query AS $gebruiker) {
                $gebruikerId = $gebruiker->getId();
            }

            $dqlTransactie = "SELECT t FROM Transactie t WHERE t.Ontvanger_id='$gebruikerId'";
            $queryTransactie = $entityManager->createQuery($dqlTransactie)
                    ->getResult();
            ?>
            <form method='post' action='updateTransactie.php'>
                <table border="0" width="100%">
                    <tr>
                        <td><h3>Verzender</h3></td>
                        <td><h3>Bedrag</h3></td>
                        <td><h3>Datum</h3></td>
                        <td><h3>Eventueel commentaar</h3></td>
                        <td><h3>Afgerond</h3></td>

                    </tr>
                    <tr>
                        <td><?php
                            foreach ($queryTransactie as $transactie) {
                                echo $transactie->getVerzender_id()->getNaam() . "</br>";
                            }
                            ?></td>
                        <td>
                            <?php
                            foreach ($queryTransactie as $transactie) {
                                $transactieId = $transactie->getId();
                                echo " &euro;" . $transactie->getBedrag() . "<br>";
                            }
                            ?></td>
                        <td><?php
                            foreach ($queryTransactie as $mail) {
                                echo $transactie->getDatum() . "</br>";
                            }
                            ?></td>
                        <td><?php
                            foreach ($queryTransactie as $transactie) {
                                echo $transactie->getOpmerking() . "</br>";
                            }
                            ?></td>
                        <td><?php
                            foreach ($queryTransactie as $transactie) {
                                $transactieId = $transactie->getId();
                                echo '<input type="checkbox" name="transactieId[]" value="' . $transactieId . '"/> <br>';
                            }
                            ?></td>
                    </tr>
                    <tr><td><input type="submit" name="submit" value="Verwerk"/></td></tr>
                </table>
            </form>
        </div>
    </body>
</html>
<!DOCTYPE html>
<?php
require_once "Bootstrap.php";
require 'src/Persoon.php';
require 'src/Huis.php';

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
            $data = $entityManager->getRepository('Persoon')->find($gebruikerId);
            $huisId = $data->getHuis_Id()->getId();

            $dql2 = "SELECT a FROM Persoon a JOIN a.Huis_Id b WHERE b.id='$huisId'";
            $query2 = $entityManager->createQuery($dql2)
                    ->getResult();
            ?>
            <form method='post' action='verwerkTransactie.php'>
                <table>
                    <tr>
                        <td>Transactie aan/naar:</td>
                            <td><select name='ontvanger'>
                                <?php
                                foreach ($query2 as $bewoners) {
                                    echo'<option value="' . $bewoners->getId() . '">'
                                    . $bewoners->getNaam();
                                    echo '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Bedrag:</td>
                        <td><input type="number"  name='bedrag' step='0.10' required /></td>
                    </tr>
                    <tr>
                        <td>Eventuele commentaar/details:</td>
                        <td><input type='text' name="commentaar" placeholder='Bv: Graag binnen 3 dagen!' size='50'/><td>
                    </tr>
                    <tr><td>
                            <input type="submit" value="Verstuur transactie"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
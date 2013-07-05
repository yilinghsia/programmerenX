<!DOCTYPE html>
<?php
require_once "Bootstrap.php";
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
            <form method="post" action="verwerk_kalenderpunt.php">
                <table>
                    <tr><td>
                            <select name='ontvanger'>
                                <option value="" disabled selected>Kies een persoon</option>
                                <?php
                                foreach ($query2 as $bewoners) {
                                    echo'<option value="' . $bewoners->getId() . '">'
                                    . $bewoners->getNaam();
                                    echo '</option>';
                                }
                                ?>
                            </select>
                        </td></tr>
                    <tr>
                        <td><input type="date" name="datum" required/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="taakNaam" required placeholder="Titel van kalenderpunt"/></td>
                    </tr>
                    <tr>
                    <select name="takensoort">
                        <option value="" disabled selected>Kies een categorie</option>
                        <option value="taak">Taak</option>
                        <option value="afspraak">Afspraak</option>
                        <option value="overig">Overig</option></select>
                    </tr>
                    <tr>
                        <td><textarea rows="10" cols="50" class="rounded" name="beschrijving" placeholder="Beschrijving van de taak"></textarea></td>
                    </tr>
                    <tr><td><input type="submit" name="submit" value="Sla kalenderpunt op"></td></tr>
                </table>
            </form>
        </div>
    </body>
</html>

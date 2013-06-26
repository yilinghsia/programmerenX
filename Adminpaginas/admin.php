<!DOCTYPE html>
<?php
require_once "../Bootstrap.php";
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
            $data = $entityManager->getRepository('Persoon')->find($gebruikerId);
            $huisId = $data->getHuis_Id()->getId();
            $huisNaam = $data->getHuis_Id()->getNaam();
            $huisAdres = $data->getHuis_Id()->getAdres();
            $huurdatum = $data->getHuis_Id()->getHuurdatum();
            ?>
            <form action='verwerkHuisGegevens.php' method='post'>
                <table width='100%'>
                    <tr>
                        <td><h3>Huisnaam</h3></td>
                        <td><h3>Huisadres</h3></td>
                        <td><h3>Huurdatum</h3></td>
                    </tr>
                    <tr>
                        <td><input type='text' name='huisnaam' value='<?php echo $huisNaam; ?>'></td>
                        <td><input type='text' name='huisadres' value='<?php echo $huisAdres; ?>'></td>
                        <td><input type='date' name='huurdatum' value='<?php echo $huurdatum; ?>'></td>
                    </tr>
                    <tr>
                        <td><input type='submit' value='Wijzigingen opslaan' name='submit'></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

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
            $gebruikerId = $_GET['id'];
            $data = $entityManager->getRepository('Persoon')->find($gebruikerId);
            $id=$data->getId();
            $voornaam = $data->getNaam();
            $achternaam = $data->getAchternaam();
            $huurhoogte = $data->getHuurhoogte();
            $functierol = $data->getFunctierol();
            ?>
            <form method="post" action="verwerkGebruiker.php">
                <table width="100%">
                    <tr>
                        <td>Naam</td>
                        <td>Achternaam</td>     
                        <td>Huurhoogte</td>
                        <td>Functierol</td>
                    </tr>
                    <tr>
                        <td><input type="text" readonly name="voornaam" value="<?php echo $voornaam; ?>"</td>
                        <td><input type="text" readonly  value="<?php echo $achternaam; ?>"</td>

                        <td><input type="text" name="huurhoogte" placeholder="Bijv: 250" value="<?php echo $huurhoogte; ?>"></input></td>
                        <td><input type="text" name="functierol" placeholder="Admin of leeg laten" value="<?php echo $functierol; ?>"></td>
                    </tr>
                    <td><input type="submit" name="submit" value="Opslaan"> </td>
                </table>
            </form>
        </div>
    </body>
</html>

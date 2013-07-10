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
            $kalenderpuntId = $_GET['id'];
            $data = $entityManager->getRepository('Kalenderpunt')->find($kalenderpuntId);
            $datum = $data->getDatum();
            $soort = $data->getSoort();
            $titel = $data->getNaam();
            $beschrijving = $data->getBeschrijving();
            $persoon = $data->getPersoon_id()->getNaam();
            ?>
            <table width="100%">
                <tr>
                    <td><h3>Datum</h3></td>     
                    <td><h3>Soort</h3></td>
                    <td><h3>Titel</h3></td>
                    <td><h3>Beschrijving</h3></td>
                </tr>
                <tr>
                    <td><?php echo $datum ?></td>
                    <td><?php echo $soort ?></td>
                    <td><?php echo $titel ?></td>
                    <td><?php echo $beschrijving ?></td>

                </tr>
            </table>
        </div>
    </body>
</html>

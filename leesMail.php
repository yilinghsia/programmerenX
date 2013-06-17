<!DOCTYPE html>
<?php
require_once "Bootstrap.php";
require 'src/Bericht.php';
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
                $mailId = $_GET['id'];
                $data = $entityManager->getRepository('Bericht')->find($mailId);
                $verzender = $data->getVerzender_id()->getNaam();
                $onderwerp = $data->getOnderwerp();
                $datum = $data->getDatum();
                $bericht = $data->getBericht();
                ?>
                Van: <?php echo $verzender ?><br>
                Onderwerp: <?php echo $onderwerp ?><br>
                Datum:<?php echo $datum ?><br><br>
                <textarea rows="10" cols="80" readonly class='rounded'><?php echo $bericht; ?></textarea>
        </div>
    </body>
</html>

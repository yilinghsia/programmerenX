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
            <a href="create_taakpunt.php">Maak een nieuwe taakpunt</a>       
            <?php
            $datumVandaag = date("d m Y");
            echo "<h3>Vandaag is " . $datumVandaag . "</h3></br></br>";

            $naamInSession = $_SESSION['loginnaam'];
            $dql = "SELECT g FROM Persoon g WHERE g.Loginnaam='$naamInSession'";
            $query = $entityManager->createQuery($dql)
                    ->getResult();

            foreach ($query AS $gebruiker) {
                $gebruikerId = $gebruiker->getId();
            }
            $taakOphalen = "SELECT t FROM Taakpunt t WHERE t.Persoon_id='$gebruikerId'";
            $resultaat = $entityManager->createQuery($taakOphalen)
                    ->getResult();
            if ($resultaat != NULL) {
                ?>
                <form method='post' action='updateTaakpunt.php'>
                    <table width="100%">
                        <tr>
                            <td><h4>Taak naam</h4></td>
                            <td><h4>Taak categorie</h4></td>
                            <td><h4>Beschrijving</h4></td>
                            <td><h4>Begindatum</h4></td>
                            <td><h4>Einddatum</h4></td>
                            <td><h4>Voltooid?</h4></td>

                        </tr>
                        <tr>
                            <td><?php
                                foreach ($resultaat AS $taakpunt) {
                                    $taaknaam = $taakpunt->getTaak();
                                    echo $taaknaam . "</br>";
                                }
                                ?></td>
                            <td><?php
                                foreach ($resultaat AS $taakpunt) {
                                    $categorie = $taakpunt->getCategorie();
                                    echo $categorie . "</br>";
                                }
                                ?></td>
                            <td><?php
                                foreach ($resultaat AS $taakpunt) {
                                    $beschrijving = $taakpunt->getBeschrijving();
                                    echo $beschrijving . "</br>";
                                }
                                ?></td>
                            <td><?php
                                foreach ($resultaat AS $taakpunt) {
                                    $begindatum = $taakpunt->getBegindatum();
                                    echo $begindatum . "</br>";
                                }
                                ?></td>
                            <td><?php
                                foreach ($resultaat AS $taakpunt) {
                                    $einddatum = $taakpunt->getEinddatum();
                                    echo $einddatum . "</br>";
                                }
                                ?></td>
                            <td><?php
                                foreach ($resultaat AS $taakpunt) {
                                    $taakpuntId = $taakpunt->getId();
                                    echo '<input type="checkbox" name="taakpuntId[]" value="' . $taakpuntId . '"/> <br>';
                                }
                                ?></td>
                        </tr>
                        <tr><td><input type="submit" value="Update taakpunt" name="submit"></td></tr>
                    </table>
                </form>
                <?php
            } else {
                echo '</br></br>Geen taken! Geniet van je vrije dag';
            }
            ?>
        </div>
    </body>
</html>

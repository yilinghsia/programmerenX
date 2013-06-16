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
            <h2>Wijzig mijn gegevens</h2><br/>
            <?php
            $naamInSession = $_SESSION['loginnaam'];
            $dql = "SELECT g FROM Persoon g WHERE g.Loginnaam='$naamInSession'";
            $query = $entityManager->createQuery($dql)
                    ->getResult();

            if ($query != NULL) {

                foreach ($query AS $gebruiker) {

                    $wachtwoord = $gebruiker->getWachtwoord();
                    $voornaam = $gebruiker->getNaam();
                    $achternaam = $gebruiker->getAchternaam();
                    $studie = $gebruiker->getStudie();
                    $studiejaar = $gebruiker->getStudiejaar();
                    $bijbaan = $gebruiker->getBijbaan();
                    $eetgewoonte = $gebruiker->getEetgewoonte();
                }
            }
            ?>

            <form method='post' action='wijzigGegevens.php'>
                <table>
                    <tr>
                        <td>Wachtwoord:</td>
                        <td><input type="text" name="wachtwoord" value="<?php echo $wachtwoord; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Voornaam:</td> 
                        <td><input type="text" name="voornaam" value="<?php echo $voornaam; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Achternaam:</td> 
                        <td><input type="text" name="achternaam" value="<?php echo $achternaam; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Studie:</td>
                        <td><input type="text" name="studie" value="<?php echo $studie; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Studiejaar: </td>
                        <td><input type="text" name="studiejaar" value="<?php echo $studiejaar; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Bijbaan:</td> 
                        <td><input type="text" name="bijbaan" value="<?php echo $bijbaan; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Eetgewoonte:</td> 
                        <td><input type="text" name="eetgewoonte" value="<?php echo $eetgewoonte; ?>" /></td>
                    </tr>
                    <tr>
                        <td><input type='submit' name='submit' value='Wijzig mijn gegevens'></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

<?php
header( "refresh:4;url=Overzicht.php" );

require_once "Bootstrap.php";

$taakpuntId = $_POST['taakpuntId'];

if (!empty($taakpuntId)) {
    foreach ($taakpuntId as $check) {
        $deleteTransactie = $entityManager->createQuery("DELETE Taakpunt t where t.id='$check'");
        $rows = $deleteTransactie->execute();
        echo "Je taakpunten zijn bijgewerkt! Je wordt binnen enkele seconden teruggebracht naar overzicht";
    }
}else{
    echo"Je hebt niks geselecteerd. Je wordt binnen enkele seconden teruggebracht naar overzicht";
}
?>

<?php
header( "refresh:4;url=overzicht_transactie.php" );
require_once "Bootstrap.php";
require 'src/Transactie.php';
require 'src/Persoon.php';
session_start();
if (!isset($_SESSION['loginnaam'])) {
    header("location:index.php");
}
$transactieId = $_POST['transactieId'];


if (!empty($transactieId)) {
    foreach ($transactieId as $check) {
        $deleteTransactie = $entityManager->createQuery("DELETE Transactie t where t.id='$check'");
        $rows = $deleteTransactie->execute();
        echo "Je transacties zijn bijgewerkt! Je wordt binnen enkele seconden teruggebracht naar overzicht";
    }
}else{
    echo"Je hebt niks geselecteerd. Je wordt binnen enkele seconden teruggebracht naar overzicht";
}
?>

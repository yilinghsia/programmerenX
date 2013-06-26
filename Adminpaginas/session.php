<?php

session_start();
if (!isset($_SESSION['loginnaam'])) {
    header("location:index.php");
} else if ($_SESSION['functierol'] == NULL) {
    header("location:index.php");
}
?>
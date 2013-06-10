<?php
/**
 * Description of Bootstrap
 *
 * @author Yi Ling
 */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once 'vendor/autoload.php';

$paths = array("src");
$isDevMode = false;
$connection = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'host'     => 'localhost',
    'password' => '',
    'dbname'   => 'studentenhuis',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager= EntityManager::create ($connection, $config);

?>

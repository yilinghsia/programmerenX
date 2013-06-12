<?php
/**
 * Description of Bootstrap
 *
 * @author Yi Ling
 */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Proxy\Autoloader;

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
$dir="C:\Windows\Temp";
$proxyNamespace = "MyProxies";

Autoloader::register($dir, $proxyNamespace);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager= EntityManager::create ($connection, $config);

?>

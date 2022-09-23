<?php
session_start();

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try
{
    $bdd = new PDO('mysql:host='.$_ENV['HOST'].';dbname='.$_ENV['DBNAME'].';charset=utf8', $_ENV['USERNAME'], $_ENV['PASS']);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
?>

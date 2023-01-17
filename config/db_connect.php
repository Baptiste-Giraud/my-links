<?php
require 'vendor/autoload.php';

// Chargement des variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Définition des constantes de connexion à la base de données
define('DB_HOST', $_ENV['HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DBNAME'] ?? 'database_name');
define('DB_USER', $_ENV['USERNAME'] ?? 'username');
define('DB_PASS', $_ENV['PASS'] ?? 'password');

try {
    // Connexion à la base de données
    $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
} catch (PDOException $e) {
    // Gestion de l'exception de connexion
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
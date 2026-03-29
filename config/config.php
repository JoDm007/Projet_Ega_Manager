<!-- Configuration du projet -->
<?php

//Initialisation de la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//constantes
define('APP_NAME', 'Ega_Manager');
define('BASE_URL', 'http://localhost/Ega_manager/');

// Autoloader pour charger automatiquement 
include_once __DIR__ . '/../includes/autoloader.php';

//Connexion à la bdd
include_once __DIR__ . '/database.php';

//Fonctions utils
include_once __DIR__ . '/../includes/functions.php';
?>

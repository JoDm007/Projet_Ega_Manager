<?php
/**
 * Charger automatiquement les classes depuis le dossier /classes/ pour eviter certains problemes d'importation
 */
spl_autoload_register(function ($className) {
    $directory = realpath(__DIR__ . '/../classes/');
    
    //chemin complet de fichier 
    $file = $directory . DIRECTORY_SEPARATOR . $className . '.php';

    // Vérifier si le fichier existe avant de l'inclure pour éviter une erreur grave
    if (file_exists($file)) {
        require_once $file;
    } else {
        die("L'autoloader n'a pas pu trouver la classe : " . $className . " dans " . $file);
    }
});

?>
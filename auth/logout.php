<?php

    include_once __DIR__ . '/../config/config.php';
    include_once __DIR__ . '/../includes/functions.php';
    include_once __DIR__ . '/../classes/Utilisateur.php';

    //Detruire les données de session
    session_unset();
    session_destroy();

    //Redirection vers la page de connexion
    redirect(BASE_URL . 'auth/login.php');

?>

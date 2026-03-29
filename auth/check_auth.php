<?php
include_once __DIR__ . '/../includes/functions.php';
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    // Si non connecté, rediriger vers la page de connexion
    redirect(BASE_URL . 'auth/login.php');
    exit();

}
?>

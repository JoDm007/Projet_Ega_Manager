<?php
// Fonction pour rediriger vers une page spécifique
function redirect($url) {
    header("Location: " . $url);
    exit();
}

// Fonction pour valider un email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Fonction pour formater un montant en FCFA
function formatMontant($montant) {
    return number_format($montant, 0, ',', ' ') . ' FCFA';
}

// Fonction pour échapper les données (Protection XSS)
function escape($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
?>

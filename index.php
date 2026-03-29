<?php

include_once 'includes/header.php';
?>

<div class="bg-gradient-primary-to-secondary text-white py-5 mb-5 shadow-sm" 
    style="background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);">
    <div class="container py-5 text-center">
        <h1 class="display-3 fw-bold mb-3">Maîtrisez votre Argent avec <?= APP_NAME ?></h1>
        <p class="lead mb-4 opacity-75">La solution simple et intuitive pour suivre vos dépenses et respecter vos budgets sans effort.</p>
        
        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <a href="auth/login.php" class="btn btn-light btn-lg px-4 shadow-sm fw-bold">Commencer maintenant</a>
            <a href="auth/register.php" class="btn btn-outline-light btn-lg px-4">Créer un compte</a>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4">
                <div class="mb-3 fs-1 text-primary">📊</div>
                <h3 class="h5 fw-bold">Suivi en temps réel</h3>
                <p class="text-muted">Visualisez vos dépenses instantanément et sachez exactement où va votre argent.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4">
                <div class="mb-3 fs-1 text-success">🎯</div>
                <h3 class="h5 fw-bold">Objectifs de Budget</h3>
                <p class="text-muted">Fixez des limites par catégorie et recevez des alertes avant de les dépasser.</p>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4">
                <div class="mb-3 fs-1 text-warning">🛡️</div>
                <h3 class="h5 fw-bold">Sécurisé & Privé</h3>
                <p class="text-muted">Vos données financières sont chiffrées et accessibles uniquement par vous.</p>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?>
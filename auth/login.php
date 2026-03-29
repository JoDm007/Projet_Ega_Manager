<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse']; 

    $utilisateur = Utilisateur::connecter($bdd, $email, $motdepasse);
    if ($utilisateur){
        $_SESSION['utilisateur_id'] = $utilisateur->getIdUtilisateur();
        redirect(BASE_URL . 'pages/dashboard.php');
        exit();
    } else {
        $erreur = "Email ou mot de passe incorrect.";
    }
}
?>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-5 col-lg-4">
            
            <div class="text-center mb-4">
                <img src="<?= BASE_URL ?>assets/img/logo.png" alt="Logo" width="80" class="mb-2">
                <h2 class="fw-bold text-dark">Bon retour !</h2>
                <p class="text-muted small">Connectez-vous pour gérer vos finances</p>
            </div>

            <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                <div class="card-body p-5">
                    
                    <?php if(isset($erreur)): ?>
                        <div class="alert alert-danger py-2 small border-0 text-center">
                            <?= $erreur ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold">Adresse Email</label>
                            <input type="email" class="form-control form-control-lg bg-light border-0" 
                                   id="email" name="email" placeholder="nom@exemple.com" required 
                                   style="font-size: 0.9rem; border-radius: 10px;">
                        </div>

                        <div class="mb-4">
                            <label for="motdepasse" class="form-label small fw-bold">Mot de passe</label>
                            <input type="password" class="form-control form-control-lg bg-light border-0" 
                                   id="motdepasse" name="motdepasse" placeholder="....." required
                                   style="font-size: 0.9rem; border-radius: 10px;">
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm" 
                                    style="border-radius: 10px; font-weight: 600; letter-spacing: 0.5px;">
                                Se connecter
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0">Pas encore de compte ?</p>
                        <a href="register.php" class="text-primary fw-bold text-decoration-none small">Créer un compte gratuitement</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
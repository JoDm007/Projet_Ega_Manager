<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/functions.php';
//include_once __DIR__ . '/../classes/Utilisateur.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nom = htmlspecialchars($_POST['nom']);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $motdepasse = $_POST['motdepasse'];

    if ($nom && $email && $motdepasse) {
        $id_utilisateur = Utilisateur::inscrire($bdd, $nom, $email, $motdepasse);
        if ($id_utilisateur){
            redirect(BASE_URL . 'auth/login.php?success=1');
            exit();
        } else{
            $erreur = "Erreur lors de l'inscription. L'email est peut-être déjà utilisé.";
        }
    } else {
        $erreur = "Veuillez remplir tous les champs correctement.";
    }
}
?>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 85vh; padding: 2rem 0;">
        <div class="col-md-7 col-lg-5">
            
            <div class="text-center mb-4">
                <img src="<?= BASE_URL ?>assets/img/logo.png" alt="Logo" width="70" class="mb-3">
                <h2 class="fw-bold text-dark">Créer un compte</h2>
                <p class="text-muted small">Rejoignez <?= APP_NAME ?> et commencez à économiser.</p>
            </div>

            <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                <div class="card-body p-4 p-md-5">
                    
                    <?php if (isset($erreur)): ?>
                        <div class="alert alert-danger border-0 small text-center">
                            <?= $erreur ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="nom" class="form-label small fw-bold">Nom complet</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" class="form-control bg-light border-0" id="nom" name="nom" 
                                       placeholder="Ex: jo DM " required style="border-radius: 0 10px 10px 0;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold">Adresse Email</label>
                            <input type="email" class="form-control bg-light border-0" id="email" name="email" 
                                   placeholder="exemple@mail.com" required style="border-radius: 10px; padding: 0.75rem;">
                        </div>

                        <div class="mb-4">
                            <label for="motdepasse" class="form-label small fw-bold">Mot de passe</label>
                            <input type="password" class="form-control bg-light border-0" id="motdepasse" name="motdepasse" 
                                   placeholder="Choisir un mot de passe fort" required style="border-radius: 10px; padding: 0.75rem;">
                            <div class="form-text mt-2" style="font-size: 0.75rem;">
                                Minimum 8 caractères recommandés.
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm" 
                                    style="border-radius: 12px; font-weight: 600; transition: 0.3s;">
                                Créer mon compte
                            </button>
                        </div>
                    </form>

                    <hr class="my-4 text-muted opacity-25">

                    <div class="text-center">
                        <p class="small text-muted mb-0">Déjà membre ?</p>
                        <a href="login.php" class="text-primary fw-bold text-decoration-none">Se connecter</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
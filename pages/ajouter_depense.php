<?php
//Chargement centralisé (Config + Autoloader + DB + Session)
require_once __DIR__ . '/../config/config.php';

//Inclusions d'interface
include_once __DIR__ . '/../includes/functions.php';
include_once __DIR__ . '/../includes/header.php';

// Protection de la page
if (!Utilisateur::estConnecte()) {
    redirect(BASE_URL . 'auth/login.php');
}

$erreur = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $montant = filter_input(INPUT_POST, 'montant', FILTER_VALIDATE_FLOAT);
    $date = $_POST['date'];
    $description = htmlspecialchars($_POST['description']);
    $id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_VALIDATE_INT);
    $id_utilisateur = $_SESSION['utilisateur_id'];

    if ($montant && $id_categorie && !empty($date)) {
        // Grâce à l'autoloader, pas besoin d'inclure Depense.php
        $result = Depense::ajouter(
            $bdd, 
            $montant, 
            $date, 
            $description, 
            $id_categorie, 
            $id_utilisateur
            );
        
        if ($result) {
            redirect('depenses.php');
        } else {
            $erreur = "Une erreur est survenue lors de l'enregistrement.";
        }
    } else {
        $erreur = "Veuillez remplir tous les champs correctement.";
    }
}

// Récupération des catégories
$categories = Categorie::getAll($bdd); 
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">Nouvelle dépense</h3>
                </div>
                <div class="card-body">
                    
                    <?php if ($erreur): ?>
                        <div class="alert alert-danger shadow-sm">
                            <?= $erreur ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="montant" class="form-label fw-bold">Montant (FCFA)</label>
                            <input type="number" step="0.01" class="form-control form-control-lg" id="montant" name="montant" placeholder="0.00" required>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label fw-bold">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?= date('Y-m-d') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_categorie" class="form-label fw-bold">Catégorie</label>
                            <select class="form-select" id="id_categorie" name="id_categorie" required>
                                <option value="" selected disabled>Choisir une catégorie...</option>

                                <?php if (!empty($categories)): ?>
                                    <?php foreach ($categories as $categorie): ?>
                                        <option value="<?= $categorie['id_categorie'] ?>">
                                            <?= htmlspecialchars($categorie['nom']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option disabled>⚠️ Aucune catégorie en BDD</option>
                                <?php endif; ?>


                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Description (Optionnel)</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Ex: Courses mensuelles..."></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">Enregistrer la dépense</button>
                            <a href="depenses.php" class="btn btn-light border">Annuler</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
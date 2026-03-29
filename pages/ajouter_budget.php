<?php
require_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../includes/header.php';

// On récupère les catégories pour le menu déroulant
$categories = Categorie::getAll($bdd);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $montant = filter_input(INPUT_POST, 'montant', FILTER_VALIDATE_FLOAT);
    $id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_VALIDATE_INT);
    
    // On extrait le mois et l'année du champ HTML 
    $date_selectionnee = $_POST['mois_annee']; 
    $mois = date('m', strtotime($date_selectionnee));
    $annee = date('Y', strtotime($date_selectionnee));
    
    $id_utilisateur = $_SESSION['utilisateur_id'];

    if ($montant && $id_categorie) {
        // Appelle de la méthode ajouter de la classe Budget
        $resultat = Budget::ajouter(
            $bdd, 
            $montant, 
            $mois, 
            $annee, 
            $id_utilisateur, 
            $id_categorie);

        if ($resultat) {
            echo "<script>window.location.href='budgets.php';</script>";
            exit();
        }
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="mb-0">📅 Définir un nouveau budget</h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Montant limite (FCFA)</label>
                            <input type="number" step="0.01" name="montant" class="form-control form-control-lg" placeholder="--" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Catégorie</label>
                            <select name="id_categorie" class="form-select" required>
                                <option value="">-- Choisir une catégorie --</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['id_categorie'] ?>">
                                        <?= htmlspecialchars($cat['nom']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Mois concerné</label>
                            <input type="month" name="mois_annee" class="form-control" value="<?= date('Y-m') ?>" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg">Enregistrer le budget</button>
                            <a href="budgets.php" class="btn btn-light border">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
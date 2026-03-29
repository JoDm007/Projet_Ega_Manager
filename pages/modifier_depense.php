<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/functions.php';


if (!Utilisateur::estConnecte()) {
    redirect(BASE_URL . 'auth/login.php');
}

$id_utilisateur = $_SESSION['utilisateur_id'];
$id_depense = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id_depense) {
    redirect('depenses.php'); // Pas d'ID valide, on repart
}

// on passe $id_utilisateur pour vérifier qu'il est bien le proprio
$depense = Depense::getByIdUtilisateur($bdd, $id_depense, $id_utilisateur);

if (!$depense) {
    die("Dépense introuvable.");
}

$categories = Categorie::getAll($bdd);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $montant = filter_input(INPUT_POST, 'montant', FILTER_VALIDATE_FLOAT);
    $date = $_POST['date']; 
    $description = htmlspecialchars($_POST['description']);
    $id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_VALIDATE_INT);

    if ($montant === false || $id_categorie === false) {
        $erreur = "Les données du formulaire sont invalides.";
    } else {
        // on passe aussi l'ID utilisateur à la modification
        $result = Depense::modifier(
            $bdd, 
            $id_depense, 
            $id_utilisateur, 
            $montant, 
            $date, 
            $description, 
            $id_categorie
            );
        
        if ($result) {
            redirect('depenses.php');
        } else {
            $erreur = "Erreur lors de la modification de la dépense.";
        }
    }
}
?>

<div class="container mt-4">
    <h1>Modifier une Dépense</h1>
    <?php if (isset($erreur)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($erreur) ?>
        </div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label for="montant" class="form-label">Montant</label>
            <input type="number" class="form-control" id="montant" name="montant" 
                value="<?= htmlspecialchars($depense['montant']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" 
                value="<?= htmlspecialchars($depense['date']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">
                <?= htmlspecialchars($depense['description']) ?>
            </textarea>
        </div>
        
        <div class="mb-3">
            <label for="id_categorie" class="form-label">Catégorie</label>
            <select class="form-select" id="id_categorie" name="id_categorie" required>
                <?php foreach ($categories as $categorie): ?>
                    <option value="<?= $categorie['id_categorie'] ?>" <?= $categorie['id_categorie'] == $depense['id_categorie'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($categorie['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>

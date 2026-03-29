<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/functions.php';


if (!Utilisateur::estConnecte()) {
    header('Location: ' . BASE_URL . 'auth/login.php');
    exit();
}

$id_utilisateur = $_SESSION['utilisateur_id'];
$depenses = Depense::getByUtilisateur($bdd, $id_utilisateur);
$categories = Categorie::getAll($bdd);

//preparation d'une map des categorie pour affichage dans le tableau des dépenses
$categories_map = [];
foreach ($categories as $categorie) {
    $categories_map[$categorie['id_categorie']] = $categorie['nom'];
}
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Mes dépenses</h1>
        <a href="ajouter_depense.php" class="btn btn-primary mb-3">Ajouter une dépense</a>
    </div>

<table class="table table-striped border">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Montant</th>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($depenses as $depense): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($depense['date']) ?>
                    </td>

                    <td>
                        <?= formatMontant($depense['montant']) ?>
                    </td>

                    <td>
                        <span class="badge bg-info text-dark">
                            <?= htmlspecialchars($categories_map[$depense['id_categorie']] ?? 'Inconnue') ?>
                        </span>
                    </td>

                    <td>
                        <?= htmlspecialchars($depense['description']) ?>
                    </td>

                    <td>
                        <a href="modifier_depense.php?id=<?= $depense['id_depense'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                        <a href="supprimer_depense.php?id=<?= $depense['id_depense'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($depenses)): ?>
                <tr>
                    <td colspan="5" class="text-center">Aucune dépense enregistrée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
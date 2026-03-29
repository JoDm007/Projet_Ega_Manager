<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/functions.php';
//include_once __DIR__ . '/../classes/Utilisateur.php';
//include_once __DIR__ . '/../classes/Budget.php';
//include_once __DIR__ . '/../classes/Categorie.php';

try {
    if (!Utilisateur::estConnecte()) {
        redirect(BASE_URL . 'auth/login.php');
    }

    $id_utilisateur = $_SESSION['utilisateur_id'];
    
    // securisté de l'appels au classe
    $budgets = Budget::getByUtilisateur($id_utilisateur) ?? [];
    $categories = Categorie::getAll($bdd) ?? [];

} catch (Exception $e) {
    $error_display = "Impossible de charger les budgets : " . $e->getMessage();
}
?>

<div class="container mt-4">
    <?php if (isset($error_display)): ?> 
        <div class="alert alert-danger">
            <?= htmlspecialchars($error_display) ?>
        </div> 
        <?php endif; ?>
    <h1>Mes Budgets</h1>
    <a href="<?= BASE_URL ?>pages/ajouter_budget.php" class="btn btn-primary mb-3">Ajouter un Budget</a>
    <table class="table">
        <thead>
            <tr>
                <th>Catégorie</th>
                <th>Montant Limite</th>
                <th>Mois</th>
                <th>Année</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($budgets as $budget): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($budget['nom_categorie']) ?>
                    </td>
                    <td>
                        <?= formatMontant($budget['montant_limite']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($budget['mois']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($budget['annee']) ?>
                    </td>
                    <td>
                        <a href="modifier_budget.php?id=<?= $budget['id_budget'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                        <a href="supprimer_budget.php?id=<?= $budget['id_budget'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>

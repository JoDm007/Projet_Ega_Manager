<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/functions.php';


if (!Utilisateur::estConnecte()) {
    redirect(BASE_URL . 'auth/login.php');
}

$id_utilisateur = $_SESSION['utilisateur_id'];
$revenus = Revenu::getByUtilisateur($bdd, $id_utilisateur);
?>

<div class="container mt-4">
    <h1>Mes Revenus</h1>
    <a href="ajouter_revenu.php" class="btn btn-primary mb-3">Ajouter un Revenu</a>
    <table class="table">
        <thead>
            <tr>
                <th>Montant</th>
                <th>Source</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($revenus as $revenu): ?>
                <tr>
                    <td>
                        <?= formatMontant($revenu['montant']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($revenu['source']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($revenu['date']) ?>
                    </td>
                    <td>
                        <a href="modifier_revenu.php?id=<?= $revenu['id_revenu'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                        <a href="supprimer_revenu.php?id=<?= $revenu['id_revenu'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>

<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/functions.php';

if (!Utilisateur::estConnecte()) {
    redirect(BASE_URL . 'auth/login.php');
}

$categories = Categorie::getAll($bdd);
?>

<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0 fw-bold text-primary">Mes Catégories</h1>
            <a href="<?= BASE_URL ?>pages/ajouter_categorie.php" class="btn btn-primary shadow-sm">
                + Ajouter une Catégorie
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nom</th>
                            <th>Couleur</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $categorie): ?>
                            <tr>
                                <td class="fw-bold"><?= htmlspecialchars($categorie['nom']) ?></td>
                                <td>
                                    <span class="badge rounded-pill shadow-sm" style="background-color: <?= $categorie['couleur'] ?>; color: #fff; padding: 8px 15px;">
                                        <?= htmlspecialchars($categorie['couleur']) ?>
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="actions_categorie.php?id=<?= $categorie['id_categorie'] ?>" 
                                       class="btn btn-sm btn-outline-warning me-2">Modifier</a>

                                    <a href="actions_categorie.php?id=<?= $categorie['id_categorie'] ?>&action=delete" 
                                       class="btn btn-sm btn-outline-danger" 
                                       onclick="return confirm('Es-tu sûr de vouloir supprimer cette catégorie ?')">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($categories)): ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">Aucune catégorie trouvée.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
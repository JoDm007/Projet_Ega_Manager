<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../includes/header.php';
//include_once __DIR__ . '/../classes/Categorie.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $couleur = $_POST['couleur'];

    if (!empty($nom)) {
        Categorie::ajouter($nom, $couleur);
        header('Location: categories.php');
        exit();
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Créer une nouvelle catégorie</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nom de la catégorie</label>
                            <input type="text" name="nom" class="form-control" placeholder="Ex: Alimentation, Transport..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Couleur distinctive</label>
                            <input type="color" name="couleur" class="form-control form-control-color w-100" value="#4361ee">
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Enregistrer la catégorie</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
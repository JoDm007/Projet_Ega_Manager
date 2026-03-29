<?php
include_once __DIR__ . '/../config/config.php';

//GESTION DE LA SUPPRESSION (Si l'action est 'delete')
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($id) {
        $sql = "DELETE FROM categorie WHERE id_categorie = :id";
        $req = $bdd->prepare($sql);
        $req->execute(['id' => $id]);
    }
    header('Location: categories.php');
    exit();
}

//GESTION DE LA MODIFICATION 
include_once __DIR__ . '/../includes/header.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$req = $bdd->prepare("SELECT * FROM categorie WHERE id_categorie = ?");
$req->execute([$id]);
$categorie = $req->fetch();

if (!$categorie) { redirect('categories.php'); }

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $couleur = $_POST['couleur'];
    
    $sql = "UPDATE categorie SET nom = :nom, couleur = :couleur WHERE id_categorie = :id";
    $req = $bdd->prepare($sql);
    if ($req->execute(['nom' => $nom, 'couleur' => $couleur, 'id' => $id])) {
        echo "<script>window.location.href='categories.php';</script>";
        exit();
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning py-3">
                    <h5 class="mb-0 fw-bold">Modifier : <?= htmlspecialchars($categorie['nom']) ?></h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nom de la catégorie</label>
                            <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($categorie['nom']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Couleur</label>
                            <input type="color" name="couleur" class="form-control form-control-color w-100" value="<?= $categorie['couleur'] ?>">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning fw-bold text-white">Sauvegarder les modifications</button>
                            <a href="categories.php" class="btn btn-light border">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
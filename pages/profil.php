<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/functions.php';
//include_once __DIR__ . '/../classes/Utilisateur.php';

if (!Utilisateur::estConnecte()) {
    redirect(BASE_URL . 'auth/login.php');
}

$id_utilisateur = $_SESSION['utilisateur_id'];
$req = $bdd->prepare("SELECT id_utilisateur, nom, email FROM utilisateur 
                    WHERE id_utilisateur = :id");
$req->execute(['id' => $id_utilisateur]);
$utilisateur = $req->fetch(PDO::FETCH_ASSOC);
if (!$utilisateur) {
    redirect('dashboard.php');
}
?>
   
<div class="container mt-4">
    <h1>Mon Profil</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" 
                value="<?= htmlspecialchars($utilisateur['nom']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" 
                value="<?= htmlspecialchars($utilisateur['email']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>

<?php
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../includes/header.php';
//include_once __DIR__ . '/../includes/navbar.php';
//include_once __DIR__ . '/../classes/Utilisateur.php';
//include_once __DIR__ . '/../classes/Depense.php';
//include_once __DIR__ . '/../classes/Budget.php';


if (!Utilisateur::estConnecte()){
    header('Location: ' . BASE_URL . 'auth/login.php');
    exit();
}

$id_utilisateur = $_SESSION['utilisateur_id'];
$depenses = Depense::getByUtilisateur($bdd, $id_utilisateur);
$mois = date('n');
$annee = date('Y');
$budgets = Budget::getByUtilisateur($id_utilisateur, $mois, $annee);
?>

<div class="container mt-4">
    <h1>Tableau de bord - <?= date('F Y') ?></h1>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Dépenses (Mois)</div>
                <div class="card-body">
                    <h5 class="card-title">En attente de calcul...</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center">Répartition des dépenses</h5>
                    <canvas id="depensesParCategorie" width="100" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('depensesParCategorie').getContext('2d');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Exemple 1', 'Exemple 2'],
            datasets: [{
                data: [500, 800],
                backgroundColor: ['#0d6efd', '#ffc107']
            }]
        }
    });
</script>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
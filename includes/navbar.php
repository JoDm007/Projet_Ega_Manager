<nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="<?= BASE_URL ?>pages/dashboard.php"><?= APP_NAME ?></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>pages/depenses.php">Dépenses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>pages/budgets.php">Budgets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>pages/categories.php">Catégories</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <?php if (Utilisateur::estConnecte()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>auth/logout.php">Déconnexion</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>auth/login.php">Connexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


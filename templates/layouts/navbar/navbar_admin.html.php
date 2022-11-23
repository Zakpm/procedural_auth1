<nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">DWWM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link<?= ($_SERVER['REQUEST_URI'] === '/admin/home') ? ' active-admin' : ''; ?>" <?= ($_SERVER['REQUEST_URI'] === '/admin/home') ? 'aria-current="page"' : ''; ?> href="/admin/home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/category/list">Les catégories</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Retour au site</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
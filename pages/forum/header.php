<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="forum"><i class="fa-solid fa-comments"></i> <?= $_SESSION['CONFIG']['CMS_NAME']; ?> :: Forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="forum">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="forum/charte">Règles</a></li>
            </ul>
        </div>
    </div>
</nav>
<header class="py-5 bg-light border-bottom">
    <div class="container">
        <h1 class="fw-semibold mb-2 belcms_forum_bnv">Bienvenue sur le forum de <?= $_SESSION['CONFIG']['CMS_NAME']; ?></h1>
        <p class="lead text-secondary" style="text-align: center;">Discute, apprends et partage dans une communauté bienveillante.</p>
    </div>
</header>
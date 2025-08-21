<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.html"><i class="fa-solid fa-comments"></i> Bel-CMS :: Forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="index.html">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Règles</a></li>
            </ul>
        </div>
    </div>
</nav>
<header class="py-5 bg-light border-bottom mb-3">
    <div class="container">
        <h1 class="fw-semibold mb-2 belcms_forum_bnv">Bienvenue sur le forum de Bel-CMS</h1>
        <p class="lead text-secondary" style="text-align: center;">Discute, apprends et partage dans une communauté bienveillante.</p>
    </div>
</header>
<div id="belcms_forum_reply">
    <form action="forum/sendnew" method="post" class="mt-2">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Titre du sujet</span>
            <input type="text" class="form-control" name="title" required>
        </div>
        <textarea name="content" class="bel_cms_textarea_full"></textarea>
        <div class="input-group mb-3">
            <label class="input-group-text" for="captcha"><?= $_SESSION['CAPTCHA']['CODE']; ?></label>
            <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
        </div>
        <input type="hidden" name="captcha_value" value="">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input type="submit" class="btn btn-secondary btn-sm mt-3" value="Enregistrer">
    </form>
</div>
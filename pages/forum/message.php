<?php
use BelCMS\Core\User;
use BelCMS\Core\groups;
use BelCMS\Requires\Common;
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.html"><i class="fa-solid fa-comments"></i> Bel-CMS :: Forum</a>
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
        <h1 class="fw-semibold mb-2 belcms_forum_bnv">Bienvenue sur le forum de Bel-CMS section :: <strong><?= $title; ?></strong></h1>
        <p class="lead text-secondary" style="text-align: center;">Discute, apprends et partage dans une communauté bienveillante.</p>
    </div>
</header>
    <div class="my-4">
        <?php
        foreach ($message as $key => $value):
            $exist = User::ifUserExist($value->author);
            if ($exist == true) {
                $infosUser  = User::getInfosUserAll($value->author);
                $username   = $infosUser->user->username;
                $color      = User::colorUsername($value->author);
                $group      = $infosUser->groups->user_group;
                $nameGroups = groups::getName($group);
                $nameGroups = defined($nameGroups->name) ? constant($nameGroups->name) : $nameGroups->name;
                $registred  = Common::TransformDate($infosUser->profils->date_registration, 'MEDIUM', 'NONE');
                $avatar     = $infosUser->profils->avatar;
                $datepost   = Common::TransformDate($value->date_post, 'FULL', 'MEDIUM');
            } else {
                $username  = constant('NOT_EXISTS');
                $color  = constant('DEFAULT_COLOR_USERNAME');
                $avatar = 'assets/img/default_avatar.jpg';
                $registred = date('dMY');
                $datepost   = Common::TransformDate($value->date_post, 'FULL', 'MEDIUM');
            }
            ?>
        <article class="card post shadow-sm mb-3">
        <div class="card-body d-flex gap-3">
            <div class="author text-center" style="width: 160px;">
            <div class="avatar"><img src="<?= $avatar; ?>" alt="avatar_user"></div>
            <div class="small mt-2 fw-semibold" style="color: <?= $color; ?>"><?= $username; ?></div>
            <div class="xsmall text-secondary"><?= $nameGroups; ?></div>
            <div class="xsmall text-secondary"><i class="fa-regular fa-calendar"></i> Inscrit(e): <?= $registred; ?></div>
            </div>
            <div class="flex-grow-1" style="width: calc(100% - 160px);">
            <div class="post-meta small text-secondary mb-2">
                <i class="fa-regular fa-hashtag"></i> #<?= $value->id; ?> • <i class="fa-regular fa-clock"></i> <?= $datepost; ?>
            </div>
            <?= $value->content; ?>
            </div>
        </div>
        </article>
        <?php
        endforeach;
        ?>
    </div>
    <!-- Formulaire de réponse -->
    <div class="card shadow-sm" id="replyForm">
        <div class="card-body">
            <form id="formReply" method="post" action="forum/formReply">
                <div class="mb-3">
                    <textarea name="content" id="replyContent" class="form-control bel_cms_textarea_full" rows="6" placeholder="Écris ta réponse…"></textarea>
                    <div class="form-text">* Reste courtois, pas de spam, cite tes sources si besoin.</div>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="captcha"><?= $_SESSION['CAPTCHA']['CODE']; ?></label>
                    <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="subscribe" disabled>
                        <label class="form-check-label" for="subscribe"><i class="fa-regular fa-bell"></i> M’abonner au sujet</label>
                    </div>
                    <input type="hidden" name="captcha_value" value="">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <button class="btn btn-success" type="submit"><i class="fa-regular fa-paper-plane"></i><span>Publier</span></button>
                </div>
            </form>
        </div>
    </div>
    <?php 
    include ('footer.php');
    echo $pagination;

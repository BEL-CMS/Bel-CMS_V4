<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
*/

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

use BelCMS\Core\User;
use BelCMS\Requires\Common;
?> 
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.html"><i class="fa-solid fa-comments"></i> <?= $_SESSION['CONFIG']['CMS_NAME']; ?> :: Forum</a>
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
  <!-- Hero -->
  <header class="py-5 bg-light border-bottom mb-3" style="position: relative;">
    <div class="container mb-3">
      <h1 class="fw-semibold mb-2 belcms_forum_bnv">Bienvenue sur le forum de <?= $_SESSION['CONFIG']['CMS_NAME']; ?></h1>
      <p class="lead text-secondary" style="text-align: center;">Discute, apprends et partage dans une communauté bienveillante.</p>
    </div>
    <a href="Forum/reply/<?= $id; ?>" class="btn btn-success" id="belcms_forum_btn_reply"><span>Nouveau Sujet</span></a>
  </header>
<div class="container-fluid px-0">
  <div class="row g-3">
    <?php
    foreach ($data as $key => $value):
    ?>
    <div class="col-12">
      <article class="forum-card card shadow-sm h-100 w-100">
        <div class="card-body py-3">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <!-- Gauche : premier sujet -->
            <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0">
              <img src="assets/img/default_avatar.jpg"
                   alt="Avatar créateur"
                   class="rounded-circle flex-shrink-0" width="48" height="48">
              <div class="min-w-0">
                <h6 class="text-truncate"><a href="forum/forumMsg/<?= $value->id_message; ?>" title=""><?= $value->title; ?></a></h6>
                <div class="text-muted small">Créé le <?= Common::TransformDate($value->date_post, 'FULL', 'MEDIUM'); ?></div>
              </div>
            </div>
            <!-- Centre : métriques -->
            <div class="metrics small lh-sm">
              <div><span class="text-muted">Réponses</span> <span class="fw-bold"><?= $value->reply; ?></span></div>
              <div><span class="text-muted">Affichages</span> <span class="fw-bold"><?= $value->view_post; ?></span></div>
            </div>
            <!-- Droite : dernière activité -->
            <div class="last-activity d-flex align-items-center gap-2 text-end">
              <div>
                <div class="small fw-semibold text-truncate" style="max-width: 140px;">
                <?php
                if (User::ifUserExist($value->last->author)) {
                  $nameinfos = User::getInfosUserAll($value->last->author);
                  $name = $nameinfos->user->username;
                  $avatar =  $nameinfos->profils->avatar;
                } else {
                  $name = constant('ERROR_NO_USER');
                  $avatar = constant('DEFAULT_AVATAR');
                }
                ?>
                  Dernier par <?= $name; ?>
                </div>
                <div class="text-muted small"><?= $value->last->date_post;?></div>
              </div>
              <img src="<?= $avatar; ?>" alt="Avatar dernier message" class="rounded-circle flex-shrink-0 avatar-2lines">
            </div>
          </div>
        </div>
      </article>
    </div>
    <?php
    endforeach;
    ?>
  </div>
</div>
<?php include ('footer.php');
<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */
use BelCMS\Core\User;

if (user::isLogged()) {
    $username = $_SESSION['USER']->user->username;
    $email    = $_SESSION['USER']->user->mail;
    $readonly = 'readonly';
    $avatar   = $_SESSION['USER']->profils->avatar;
    if ($avatar == 'assets/img/default_avatar.jpg') {
        $avatar = constant('DEFAULT_AVATAR');
    }
} else {
    $username = null;
    $email     = null;
    $readonly = null;
    $avatar = constant('DEFAULT_AVATAR');
}
?>
<div class="card">
    <div class="card-header" id="belcms_header_title">
        <h2><i class="fa-solid fa-angles-right"></i> Livre d'or</h2>
        <a href="guestbook/view" title="view read">Voir les messages</a>
        <a href="guestbook" title="home guestbook">Accueil</a>
    </div>
    <div class="card-body py-5 bg-light">
        <h3 id="belcms_title_section">Bienvenue sur le livre d'or</h3>
    </div>
</div>

<div class="belcms_guestbook_form">
    <div class="form-container">
        <form method="post" action="guestbook/new">
            <h2 class="mb-3">Laisse ton message 💬</h2>
            <div class="input-group mb-3">
                <input type="pseudo" aria-label="name" name="username" class="form-control" placeholder="Pseudo" required <?= $readonly ?> value="<?= $username; ?>">
                <input type="email" aria-label="mail" name="mail" class="form-control" placeholder="E-mail" required <?= $readonly ?> value="<?= $email; ?>">
            </div>
            <div class="input-group mb-3">
                <textarea id="message" name="message" rows="3" class="belcms_guestbook_textarea bel_cms_textarea_simple"></textarea>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="captcha"><?= $_SESSION['CAPTCHA']['CODE']; ?></label>
            </div>
            <div class="input-group mb-3">
                <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
            </div>
            <input type="hidden" name="avatar" value="<?= $avatar; ?>" required <?= $readonly ?>>
            <input type="hidden" name="captcha_value" value="">
            <input type="submit" value="Envoyer ✨" class="belcms_guestbook_submit">
        </form>
    </div>
</div>
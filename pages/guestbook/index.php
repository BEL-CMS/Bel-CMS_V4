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

use BelCMS\Core\Captcha;
use BelCMS\Core\Notification;
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
            <?php
            if (Captcha::getStopMsg() === false) {
                echo '<div class="input-group mb-3">';
                Notification::error('Votre accès aux commentaires est bloqué en raison d\'un bannissement.', 'Ban !');
                echo '</div>';
            } else {
            ?>
            <div id="belcms_global_captcha">
                <div class="mb-1">
                    <strong><?= $_SESSION['CAPTCHA']['question'] ?? 'Chargement...' ?></strong>
                    <label>Résolvez le calcul :</label>
                </div>
                <div class="input-group mb-3">
                    <input type="number" name="captcha" required placeholder="Votre réponse" class="form-control">
                </div>
                <div class="input-group mb-3">
                    <div class="belcms_captcha_container">
                        <label><?= constant('CAPTCHA_MESSAGE_INDEX'); ?></label>
                        <input type="range" id="belcms_captcha_slider" min="0" max="100" value="15">
                        <div id="belcms_captcha_percent">0%</div>
                        <input type="hidden" name="belcms_captcha_value" id="belcms_captcha_value">
                    </div>
                </div>
            </div>
            <input type="hidden" name="avatar" value="<?= $avatar; ?>" required <?= $readonly ?>>
            <input type="hidden" name="captcha_value" value="">
            <input type="submit" value="Envoyer ✨" class="belcms_guestbook_submit">
            <?php } ?>
        </form>
    </div>
</div>
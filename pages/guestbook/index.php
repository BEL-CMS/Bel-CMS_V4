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
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (User::isLogged()) {
    $user   = $_SESSION['USER']->user->hash_key;
    $avatar = $_SESSION['USER']->profils->avatar;
    if (!empty($user)) {
        $read = 'readonly';
    }
} else {
    $user   = '';
    $avatar = constant('DEFAULT_AVATAR');
    $read = '';
}
?>
<div class="belcms_guestbook_container">
    <div class="belcms_guestbook_title">Livre d'or</div>
    <?php
    foreach ($guest as $key => $value):
    ?>
    <div class="belcms_guestbook_entry">
        <div class="belcms_guestbook_avatar">
            <?php
            if (strlen($value->author) == 32) {
                $valueUser = User::getInfosUserAll($value->author);
                $username  = $valueUser->user->username;
                $user_avatar = $valueUser->profils->avatar;
                if (empty($user_avatar)) {
                    $user_avatar = constant('DEFAULT_AVATAR');
                }
            } else {
                $user_avatar = constant('DEFAULT_AVATAR');
            }
            ?>
            <img src="<?= $user_avatar; ?>" alt="Avatar de <?= $username; ?>">
        </div>
        <div class="belcms_guestbook_content">
            <div class="belcms_guestbook_name"><?= $username; ?></div>
            <div class="belcms_guestbook_date"><?= $value->date_insert; ?></div>
            <div class="belcms_guestbook_message"><?= $value->message; ?></div>
        </div>
    </div>
    <?php
    endforeach;
    ?>
</div>
<?php
if (User::isLogged()) {
    $readonly = 'readonly';
} else {
    $readonly = '';
}
?>
<div class="belcms_guestbook_form">
    <div class="form-container">
        <form method="post" action="guestbook/new">
            <h2 class="mb-3">Laisse ton message 💬</h2>
            <input type="text" id="name" name="user" <?= $readonly; ?> class="input-group-text" placeholder="Ex: Stive le Magnifique" required value="<?= $user; ?>">
            <textarea id="message" name="msg" rows="3" class="belcms_guestbook_textarea bel_cms_textarea_simple"></textarea>
            <div class="input-group mb-3">
                <label class="input-group-text" for="captcha"><?= $_SESSION['CAPTCHA']['CODE']; ?></label>
                <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
            </div>
            <input type="hidden" name="captcha_value" value="">
            <input type="submit" value="Envoyer ✨" class="belcms_guestbook_submit">
        </form>
    </div>
</div>
<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/

use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

include 'assets/country.php';

if (empty($user->profils->avatar)) {
    $user->profils->avatar = constant('DEFAULT_AVATAR');
}
if (empty($user->profils->hight_avatar) or !is_file($user->profils->hight_avatar)) {
    $user->profils->hight_avatar = '/uploads/users/bg-profile.png';
}

if (!empty($_SESSION['USER']->profils->birthday)) {
    $birthday = Common::DatetimeReverse($_SESSION['USER']->profils->birthday);
} else {
 $birthday = date('Y-m-d');
}

if (!empty($user->profils->gender)) {
    $user->profils->gender   = strtolower($user->profils->gender);
    $genderM        = $user->profils->gender == 'MALE' ? 'selected' : '';
    $genderF        = $user->profils->gender == 'FEMALE' ? 'selected' : '';
    $genderU        = $user->profils->gender == 'NOSPEC' ? 'selected' : '';
} else {
    $genderM        = '';
    $genderF        = '';
    $genderU        = 'selected';
}

?>
<section id="belcms_pages_user">
    <div class="row">
        <div class="col-12">
            <div id="belcms_user" class="card">
                <div class="card-header">
                    <?= $user->user->username; ?>
                </div>
                <div class="card-body">
                    <div id="belcms_user_img">
                        <img src="<?= $user->profils->hight_avatar; ?>">
                        <img src="<?= $user->profils->avatar; ?>" class="rounded float-start" alt="Avatar User">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <nav id="belcms_pages_user_nav">
                <ul>
                    <li>
                        <a href="user">
                            <i class="fa-solid fa-user"></i> Mon profil
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/profils">
                            <i class="fa-solid fa-user-pen"></i> Éditer mon profil
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li class="active">
                        <a href="User/social">
                            <i class="fa-solid fa-share-nodes"></i> Éditer Social
                            <i class="fa-solid fa-arrows-to-eye" id="belcms_user_nav_active_plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/avatar">
                            <i class="fa-solid fa-image-portrait"></i> Fond & avatar
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/Material">
                            <i class="fa-solid fa-computer"></i> Éditer matériels
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
                        </a>
                    <li>
                        <a href="User/options">
                            <i class="fa-solid fa-gears"></i> Options & sécurité
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="user/logout">
                            <i class="fa-solid fa-lock-open"></i> Déconnexion
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-9">
            <div id="belcms_pages_user_content">
                <div id="belcms_pages_user_content_effect">
                    <h1>Édition des liens social</h1>
                    <form action="/user/submitsocial" method="post">
                        <div class="card-header">Modifier vos réseaux sociaux</div>
                        <div class="card-body">
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="facebook" type="text" placeholder="Entrer votre Facebook" value="<?= $social->facebook; ?>" pattern="^[a-z\d\.]{5,}$" class="form-control">
                                    <label><i class="fa-brands fa-facebook"></i> Facebook</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="x_twitter" type="text" placeholder="Entrer votre (X) Twitter" value="<?= $social->x_twitter; ?>" pattern="^[A-Za-z0-9_]{1,15}$" class="form-control">
                                    <label><i class="fa-brands fa-x-twitter"></i> Twitter</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="discord" type="text" placeholder="Entrer votre Discord" value="<?= $social->discord; ?>" class="form-control">
                                    <label><i class="fa-brands fa-discord"></i> Discord</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="pinterest" type="text" placeholder="Entrer votre Pinterest" value="<?= $social->pinterest; ?>" class="form-control">
                                    <label><i class="fa-brands fa-pinterest"></i> Pinterest</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="linkedIn" type="text" placeholder="Entrer votre LinkedIn" value="<?= $social->linkedIn; ?>" class="form-control">
                                    <label><i class="fa-brands fa-linkedin-in"></i> LinkedIn</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="youtube" type="text" placeholder="Entrer votre YouTube" value="<?= $social->youtube; ?>" class="form-control">
                                    <label><i class="fa-brands fa-youtube"></i> YouTube</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="whatsapp" type="text" placeholder="Entrer votre Whatsapp" value="<?= $social->whatsapp; ?>" class="form-control">
                                    <label><i class="fa-brands fa-whatsapp"></i> Whatsapp</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="instagram" type="text" placeholder="Entrer votre Instagram" value="<?= $social->instagram; ?>" class="form-control">
                                    <label><i class="fa-brands fa-instagram"></i> Instagram</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="messenger" type="text" placeholder="Entrer votre Messenger (Meta)" value="<?= $social->messenger; ?>" class="form-control">
                                    <label><i class="fa-brands fa-facebook-messenger"></i> Messenger (Meta)</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="tiktok" type="text" placeholder="Entrer votre TikTok" value="<?= $social->tiktok; ?>" class="form-control">
                                    <label><i class="fa-brands fa-tiktok"></i> TikTok</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="snapchat" type="text" placeholder="Entrer votre SnapChat" value="<?= $social->snapchat; ?>" class="form-control">
                                    <label><i class="fa-brands fa-snapchat"></i> SnapChat</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="telegram" type="text" placeholder="Entrer votre Telegram" value="<?= $social->telegram; ?>" class="form-control">
                                    <label><i class="fa-brands fa-telegram"></i> Telegram</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="reddit" type="text" placeholder="Entrer votre Reddit" value="<?= $social->reddit; ?>" class="form-control">
                                    <label><i class="fa-brands fa-reddit"></i> Reddit</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="skype" type="text" placeholder="Entrer votre Skype" value="<?= $social->skype; ?>" class="form-control">
                                    <label><i class="fa-brands fa-skype"></i> Skype</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="viber" type="text" placeholder="Entrer votre Viber" value="<?= $social->viber; ?>" class="form-control">
                                    <label><i class="fa-brands fa-viber"></i> Viber</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="teams_ms" type="text" placeholder="Entrer votre Teams ms" value="<?= $social->teams_ms; ?>" class="form-control">
                                    <label><i class="fa-brands fa-windows"></i> Teams ms</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input name="twitch" type="text" placeholder="Entrer votre Twitch" value="<?= $social->twitch; ?>" class="form-control">
                                    <label><i class="fa-brands fa-twitch"></i> Twitch</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
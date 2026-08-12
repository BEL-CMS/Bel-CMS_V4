<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.2.0 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/

use BelCMS\Requires\Common;
use BelCMS\Core\Security\QRCode\QRCode;
use BelCMS\Core\Security\QRCode\ErrorCorrectionLevel;
use BelCMS\Core\Security\TOTP\ProvisioningUri;
use BelCMS\Core\Security\TOTP\TOTP;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

if (
    empty($_SESSION['TOTP_PENDING_SECRET'])
    || !is_string($_SESSION['TOTP_PENDING_SECRET'])
) {
    $_SESSION['TOTP_PENDING_SECRET'] = TOTP::generateSecret();
}

/* utilisateur supprimé et toujours connecté = supprime la $_SESSION */
if (empty($user)) {
    unset($_SESSION['USER']);
    Common::Redirect("index.php");
}

$uri = ProvisioningUri::create(
    secret: $_SESSION['TOTP_PENDING_SECRET'],
    account: $_SESSION['USER']->user->username,
    issuer: $_SESSION['CONFIG']['CMS_NAME']
);

if (empty($user->profils->gender)) {
    $gender = constant('NOSPEC');
} else if ($user->profils->gender == 'male') {
    $gender = constant('MALE');
} else if ($user->profils->gender == 'female') {
    $gender = constant('FEMALE');
} else {
    $gender = constant('NOSPEC');
}

if (!empty($user->profils->birthday)) {
    $birthday = Common::TransformDate($user->profils->birthday, 'FULL', 'NONE');
} else {
    $birthday = date('Y-m-d');
}
if (empty($user->profils->avatar)) {
    $user->profils->avatar = constant('DEFAULT_AVATAR');
}
if (empty($user->profils->hight_avatar) or !is_file($user->profils->hight_avatar)) {
    $user->profils->hight_avatar = '/uploads/users/bg-profile.png';
}
if (empty($user->profils->country)) {
    $country = constant('NONE_DEFINED');
} else {
    $country = $user->profils->country;
}
if (empty($user->profils->websites)) {
    $websites = constant('NONE_DEFINED');
} else {
    $websites = Common::VarSecure($user->profils->websites);
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
                            <i class="fa-solid fa-circle-arrow-right belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/profils">
                            <i class="fa-solid fa-user-pen"></i> Éditer mon profil
                            <i class="fa-solid fa-circle-arrow-right belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/social">
                            <i class="fa-solid fa-share-nodes"></i> Éditer Social
                            <i class="fa-solid fa-circle-arrow-right belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/avatar">
                            <i class="fa-solid fa-image-portrait"></i> Fond & avatar
                            <i class="fa-solid fa-circle-arrow-right belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/Material">
                            <i class="fa-solid fa-computer"></i> Éditer matériels
                            <i class="fa-solid fa-circle-arrow-right belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/options">
                            <i class="fa-solid fa-computer"></i> Options & sécurité
                            <i class="fa-solid fa-circle-arrow-right belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li class="active">
                        <a href="User/double2fa">
                            <i class="fa-solid fa-user-shield"></i> 2FA
                            <i class="fa-solid fa-arrows-to-eye" id="belcms_user_nav_active_plus"></i>
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
                    <?php
                    if ($user->user->two_factor_enabled == 0):
                    ?>
                    <h1>Activer la double authentification</h1>
                    <div id="doublaf2a">
                        <?php 
                        echo QRCode::make($uri)
                            ->level(ErrorCorrectionLevel::L)
                            ->size(250)
                            ->margin(4)
                            ->svg();
                        ?>
                    </div>
                    <form action="/user/verifdouble2fa" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" class="form-control" name="two_factor_serial" id="two_factor_serial" minlength="6" maxlength="6" data-size="6" required="required" placeholder="Saisissez votre code d'authentification.">
                            </div>
                            <div class="input-group">
                                <input type="hidden" value="<?= $_SESSION['TOTP_PENDING_SECRET']; ?>" name="serial">
                                <input type="submit" class="btn btn-success mt-3" value="Valider">
                            </div>
                        </div>
                    </form>
                    <?php
                    else:
                    ?>
                    <h1>Double authentification</h1>
                    <div class="mb-3">
                        <div class="alert alert-danger" role="alert">
                            <p>Vous êtes sur le point de désactiver l'authentification à deux facteurs : <a href="User/Neg2fa" class="alert-link">Désactiver</a></p>
                            <hr>
                            <p class="mb-0">Les codes de secours seront, eux aussi, désactivés.</p>
                        </div>
                    </div>
                    <table class="table table-bordered" id="belcms_pages_user_content_table">
                        <tbody>
                            <tr><td colspan="2">Il vous reste <?= $count; ?> codes de secours.</td></tr>
                        </tbody>
                    </table>
                    <div class="mb-3">
                        <a href="User/renewrecovery" class="btn btn-secondary">Renouveler les codes</a>
                    </divb>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

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

/* utilisateur supprimé et toujours connecté = supprime la $_SESSION */
if (empty($user)) {
    unset($_SESSION['USER']);
    Common::Redirect("index.php");
}

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
                    <li class="active">
                        <a href="user">
                            <i class="fa-solid fa-user"></i> Mon profil
                            <i class="fa-solid fa-arrows-to-eye" id="belcms_user_nav_active_plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/profils">
                            <i class="fa-solid fa-user-pen"></i> Éditer mon profil
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/social">
                            <i class="fa-solid fa-share-nodes"></i> Éditer Social
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
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
                    </li>
                    <li>
                        <a href="User/options">
                            <i class="fa-solid fa-computer"></i> Options & sécurité
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
                    <h1>Profils</h1>
                    <table class="table" id="belcms_pages_user_content_table">
                        <tr>
                            <td>Votre nom utilisateur :</td>
                            <td><?= $user->user->username; ?></td>
                        </tr>
                         <tr>
                            <td>Quel est votre genre ?</td>
                            <td><?= $gender; ?></td>
                        </tr>
                        <tr>
                            <td>Votre e-mail privé <i style="color: red;">* jamais divulgué</i></td>
                            <td><a href="mailto:<?= $user->user->mail; ?>>"><?= $user->user->mail; ?></a></td>
                        </tr>
                        <tr>
                            <td>Vôtre date de naissance :</td>
                            <td><?= $birthday; ?></td>
                        </tr>
                        <tr>
                            <td>Le pays dans lequel vous résidez :</td>
                            <td><?= $country; ?></td>
                        </tr>
                        <tr>
                            <td>Lien vers votre site web :</td>
                            <td><a href="<?= $websites; ?>"><?= $websites; ?></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
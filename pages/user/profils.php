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
                    <li class="active">
                        <a href="User/profils">
                            <i class="fa-solid fa-user-pen"></i> Éditer mon profil
                            <i class="fa-solid fa-arrows-to-eye" id="belcms_user_nav_active_plus"></i>
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
                    <h1>Édition du profil</h1>
                    <form action="/user/sendGeneral" method="post">
                        <div class="input-group mb-2">
                            <div class="form-floating">
                                <input type="text" value="<?= $user->user->username; ?>" name="username" required="required" class="form-control" id="input_user">
                                <label for="input_user">Il s'agit de votre nom utilisateur</label>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="form-floating">
                                <input type="email" value="<?= $user->user->mail; ?>" name="mail" required="required" class="form-control" id="input_mail">
                                <label for="input_mail">Votre e-mail privé <i style="color: red;">* jamais divulgué</i></label>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="form-floating">
                                <input type="date" value="<?= $birthday; ?>" min="1900-01-01" max="<?= date('Y-m-d'); ?>" name="birthday" class="form-control" id="input_birthday">
                                <label for="input_birthday">La date à laquelle vous êtes né</label>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="form-floating">
                                <input type="url" value="<?= $user->profils->websites; ?>" name="websites" class="form-control" id="input_websites">
                                <label for="input_websites">Lien vers votre site web</label>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="form-floating">
                                <select class="form-select" name="country">
                                    <option selected value="<?= htmlspecialchars($user->profils->country); ?>"><?= $user->profils->country; ?></option>
                                <?php
                                foreach ($contryList as $key => $country):
                                    echo '<option value="'.htmlspecialchars($country).'">'.$country.'</option>';
                                endforeach;
                                ?>
                                </select>
                                <label>Où est-ce que vous résidez? <i style="color: red;">Pays</i></label>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <div class="form-floating">
                                <select name="gender" class="form-select" id="input_inputgenre">
                                    <option <?= $genderM ?> value="male"><?= constant('MALE') ?></option>
                                    <option <?= $genderF ?> value="female"><?= constant('FEMALE') ?></option>
                                    <option <?= $genderU ?> value="nospec"><?= constant('NO_SPEC') ?></option>
                                </select>
                                <label for="input_inputgenre">Quel est votre genre masculin ou féminin ?</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">Signature</span>
                            <textarea class="form-control" name="info_text"><?= $user->profils->info_text; ?></textarea>
                        </div>
                        <div class="input-group mt-3 mb-2">
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>